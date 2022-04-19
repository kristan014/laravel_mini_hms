@extends('layouts.app')

@section('title')
    Hotels
@endsection





@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Hotels</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Hotels</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- form -->
            <div class="row" id="div_form">
                <div class="col-xl-12">
                    <form class="card card-primary card-outline" id="form_id" name="form_id" enctype="multipart/form-data">
                        <div class="card-header">
                            <h3 class="card-title">Add Hotel</h3>
                        </div>
                        <div class="card-body">
                            <input type="hidden" id="uuid" name="uuid" />
                            <input type="hidden" class="form-control" id="status" name="status" readonly />
                            <div class="form-group row m-t-10">
                                <div class="col-md-6">
                                    <h2 id="generated_pr">New</h2>
                                </div>
                                <div class="col-md-6">
                                    <label>Requested By</label>
                                    <input class="form-control" id="requested_by" name="requested_by" readonly />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 department-container">
                                    <label>Department</label>
                                    <input class="form-control" id="department" name="department" readonly />
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>Purpose<span class="text-danger">*</span></label>
                                    <input class="form-control" id="purpose" name="purpose" />
                                </div>

                            </div>



                            <div class="form-group row my-5">
                                <div class="col-md-12 summernote">
                                    <label>Message<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="message" id="message"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">

                            <div class="row">
                                <div class="col-md-12 text-right set-btn">
                                    <button type="button" class="btn btn-default bg-default"
                                        onClick="formReset('hide')">Cancel</button>


                                    <button type="submit" class="btn btn-primary submit" id="add-button">
                                        Submit
                                        <i class="fas fa-file-export ml-1"></i>
                                    </button>

                                </div>
                            </div>


                        </div>
                        <!-- end card body -->
                    </form>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end form -->

            <div class="row">
                <div class="col-md-12">
                    <!-- Card -->
                    <div class="card card-primary card-outline">
                        <!-- Card Header -->
                        <div class="card-header">
                            <div class="row">
                                <div
                                    class="col-6
                                  d-sm-flex
                                  align-items-center">
                                    <h3 class="card-title">List of Hotels</h3>
                                </div>
                                <div
                                    class="col-6
                                      d-sm-flex
                                      align-items-center
                                      justify-content-end">

                                    <div class="page-title-right">
                                        <button type="button" class="btn btn-sm btn-success add" onclick="addData()">
                                            <i class="fas fa-plus font-size-16 mr-1"></i> Add Department
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <!-- Card Body -->
                        <div class="card-body">
                            <table id="data-table" class="table table-hover table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th>Contact No</th>
                                        <th>Department Head</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>


        </div>
    </section>
    <!-- /.content -->


    



@endsection


