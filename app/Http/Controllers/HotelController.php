<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

use Illuminate\Http\Request;

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
        //     $customers = Customer::all();
        //     return datatables()->of($customers)
        //         ->addColumn('action', function ($row) {
        //             $html = '<a href="#" class="btn btn-xs btn-secondary btn-edit">Edit</a> ';
        //             $html .= '<button data-rowid="' . $row->id . '" class="btn btn-xs btn-danger btn-delete">Del</button>';
        //             return $html;
        //         })->toJson();
        // }

        return view('hotel');
    }

    public function store(Request $request)
    {
        // do validation
        Customer::create($request->all());
        return ['success' => true, 'message' => 'Inserted Successfully'];
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
