<?php

namespace App\Http\Controllers;

use App\Models\RoomType;

use Illuminate\Http\Request;

use Validator;


class RoomTypeController extends Controller
{
    //

    public function __construct(){
        $this->middleware(['auth','prevent-back-history']);

    }

    public function index(){
        return view('room_type');
    }

    public function datatable()
    {
        if (request()->ajax()) {
            return datatables()->of(RoomType::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" onClick="return editData(\'' .$data->id. '\',0)" class="edit btn btn-secondary btn-sm">View</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="edit" onClick="return editData(\'' .$data->id. '\',1)" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" onClick="return deleteData(\'' .$data->id. '\')" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // $query = RoomType::select('region', 'contact_no', 'manager');
        // return datatables($query)->make(true);
        // return view('RoomType');
    }


    
    public function getone($id)
    {
        $query = RoomType::where('id',$id)->first();
        return response()->json($query);
    }



    public function store(Request $request)
    {
    
        // form ajax method
        $rules = array(
            'room_type'    =>  'required',
            'no_of_beds'     =>  'required',
            'max_guest'     =>  'required',
            'rate'     =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'room_type'        =>  $request->room_type,
            'no_of_beds'         =>  $request->no_of_beds,
            'max_guest'         =>  $request->max_guest,
            'rate'         =>  $request->rate,
        );

        RoomType::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);

        // return ['success' => true, 'message' => 'Inserted Successfully'];
    }


    public function update(Request $request)
    {
        // do validation

        $rules = array(
            'room_type'    =>  'required',
            'no_of_beds'     =>  'required',
            'max_guest'     =>  'required',
            'rate'     =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'room_type'        =>  $request->room_type,
            'no_of_beds'         =>  $request->no_of_beds,
            'max_guest'         =>  $request->max_guest,
            'rate'         =>  $request->rate,
        );

        RoomType::whereId($request->hidden_id)->update($form_data);


        return response()->json(['success' => 'Data Updated successfully.']);
    }

    public function destroy($id)
    {
        $data = RoomType::find($id);
        $data->delete();
        return response()->json(['success' => 'Data Deleted successfully.']);

    }
}
