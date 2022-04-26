<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

use Illuminate\Http\Request;
use Validator;

class HotelController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth', 'prevent-back-history']);
    }


    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Hotel::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // $hotels = Hotel::all();
        // return view('hotel', compact('hotels'));

        return view('hotel');
    }

    public function datatable()
    {
        if (request()->ajax()) {
            return datatables()->of(Hotel::latest()->get())
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
        // $query = Hotel::select('region', 'contact_no', 'manager');
        // return datatables($query)->make(true);
        // return view('hotel');
    }


    
    public function getone($id)
    {
        $query = Hotel::where('id',$id)->first();
        return response()->json($query);
    }



    public function store(Request $request)
    {
        // do validation
        // form action method
        // if ($this->validate($request, [
        //     'region' => 'required',
        //     'city' => 'required',
        //     'street' => 'required',
        //     'manager' => 'required',
        //     'contact_no' => ['required', 'max:20'],
        //     'email' => ['required', 'email'],

        // ])) {
        //     Hotel::create($request->all());
        //     return redirect()->back()->with('status','Hotel created successfully');
        // }else{
        //     return redirect()->back()->with('status', 'Error in creating hotel');

        // }

        // form ajax method
        $rules = array(
            'region'    =>  'required',
            'city'     =>  'required',
            'street'     =>  'required',
            'manager'     =>  'required',
            'contact_no'     =>  'required',
            'email'     =>  'required',


        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'region'        =>  $request->region,
            'city'         =>  $request->city,
            'street'         =>  $request->street,
            'manager'         =>  $request->manager,
            'contact_no'         =>  $request->contact_no,
            'email'         =>  $request->email,

        );

        Hotel::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);

        // return ['success' => true, 'message' => 'Inserted Successfully'];
    }


    public function update(Request $request)
    {
        // do validation

        $rules = array(
            'region'    =>  'required',
            'city'     =>  'required',
            'street'     =>  'required',
            'manager'     =>  'required',
            'contact_no'     =>  'required',
            'email'     =>  'required',


        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'region'        =>  $request->region,
            'city'         =>  $request->city,
            'street'         =>  $request->street,
            'manager'         =>  $request->manager,
            'contact_no'         =>  $request->contact_no,
            'email'         =>  $request->email,

        );

        Hotel::whereId($request->hidden_id)->update($form_data);


        return response()->json(['success' => 'Data Updated successfully.']);
    }

    public function destroy($id)
    {
        $data = Hotel::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data Deleted successfully.']);

    }
}
