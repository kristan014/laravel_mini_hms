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


    public function index(Request $request)
    {
        // if ($request->ajax()) {
        // return datatables()->of($customers)
        //     ->addColumn('action', function ($row) {
        //         $html = '<a href="#" class="btn btn-xs btn-secondary btn-edit">Edit</a> ';
        //         $html .= '<button data-rowid="' . $row->id . '" class="btn btn-xs btn-danger btn-delete">Del</button>';
        //         return $html;
        //     })->toJson();
        // }
        $hotels = Hotel::all();
        return view('hotel', compact('hotels'));

        // return view('hotel');
    }

    public function datatable()
    {
        $query = Hotel::select('region', 'contact_no', 'manager');
        return datatables($query)->make(true);
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


    public function update($id)
    {
        // do validation
        Customer::find($id)->update(request()->all());
        return ['success' => true, 'message' => 'Updated Successfully'];
    }

    public function destroy($id)
    {
        Customer::find($id)->delete();
        return ['success' => true, 'message' => 'Deleted Successfully'];
    }
}
