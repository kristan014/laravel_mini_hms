<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Validator;


class RoomController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'prevent-back-history']);
    }

    public function index()
    {
        return view('room');
    }

    public function datatable()
    {
        if (request()->ajax()) {

            // return datatables()->of(Room::latest()->get())
            // $query = Room::with('room_types');
            return datatables()->of(Room::with('room_types'))
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" onClick="return editData(\'' . $data->id . '\',0)" class="edit btn btn-secondary btn-sm">View</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="edit" onClick="return editData(\'' . $data->id . '\',1)" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" onClick="return deleteData(\'' . $data->id . '\')" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }



    public function getone($id)
    {
        $query = Room::where('id', $id)->first();
        return response()->json($query);
    }



    public function store(Request $request)
    {

        // form ajax method
        $rules = array(
            'room_no'    =>  'required',
            'image'     =>  'required',
            'room_type_id'     =>  'required',
            'hotel_id'     =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'room_no'        =>  $request->room_no,
            'image'         =>  $request->file('image')->store('uploads'),
            'is_occupied' => False,
            'room_type_id'         =>  $request->room_type_id,
            'hotel_id'         =>  $request->hotel_id,
        );

        Room::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);

        // return ['success' => true, 'message' => 'Inserted Successfully'];
    }


    public function update(Request $request)
    {
        // do validation

        // form ajax method
        $rules = array(
            'room_no'    =>  'required',
            'image'     =>  'required',
            'room_type_id'     =>  'required',
            'hotel_id'     =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'room_no'        =>  $request->room_no,
            'image'         =>  $request->image,
            'room_type_id'         =>  $request->room_type_id,
            'hotel_id'         =>  $request->hotel_id,
        );

        Room::whereId($request->hidden_id)->update($form_data);


        return response()->json(['success' => 'Data Updated successfully.']);
    }

    public function destroy($id)
    {
        $data = Room::find($id);
        $data->delete();
        return response()->json(['success' => 'Data Deleted successfully.']);
    }

    public function image($filename)
    {
        //check image exist or not
        $exists = true;

        if ($exists) {

            //get content of image
            $content = Room::get('public/uploads/' . $filename);

            //get mime type of image
            $mime = Room::mimeType('public/uploads/' . $filename);
            //prepare response with image content and response code
            $response = Response::make($content, 200);
            //set header 
            $response->header("Content-Type", $mime);
            // return response
            return $response;
        } else {
            abort(404);
        }
    }
}
