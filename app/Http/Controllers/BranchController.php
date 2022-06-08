<?php

namespace App\Http\Controllers;

use App\Models\Branch;

use Illuminate\Http\Request;
use Validator;

class BranchController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth', 'prevent-back-history']);
    }


    public function index()
    {

        return view('Branch');
    }

    public function datatable()
    {
        if (request()->ajax()) {
            return datatables()->of(Branch::latest()->get())
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
    }


    public function getall()
    {
        $course = Branch::all();
        return $course;

    }
    
    public function getone($id)
    {
        $query = Branch::where('id',$id)->first();
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
        //     Branch::create($request->all());
        //     return redirect()->back()->with('status','Branch created successfully');
        // }else{
        //     return redirect()->back()->with('status', 'Error in creating Branch');

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

        Branch::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);

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

        Branch::whereId($request->hidden_id)->update($form_data);


        return response()->json(['success' => 'Data Updated successfully.']);
    }

    public function destroy($id)
    {
        $data = Branch::find($id);
        $data->delete();
        return response()->json(['success' => 'Data Deleted successfully.']);

    }
}
