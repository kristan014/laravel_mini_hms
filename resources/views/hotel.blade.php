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
                    {{-- action="{{ route('hotel.store') }}" method="post" --}}
                    <form class="card card-primary card-outline" id="form_id" name="form_id">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Add Hotel</h3>
                        </div>
                        <div class="card-body">
                            <input type="hidden" id="hidden_id" name="hidden_id" />
                            {{-- <input type="hidden" class="form-control" id="status" name="status" readonly /> --}}

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Manager<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="manager" name="manager" />
                                    @error('manager')
                                        <div class="text-red">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Contact Number<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="contact_no" name="contact_no" />
                                    @error('contact_no')
                                        <div class="text-red">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group col-md-4">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" />
                                    @error('email')
                                        <div class="text-red">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row my-3">
                                <div class="form-group col-md-6">
                                    <label>Region<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="region" name="region" />
                                    @error('region')
                                        <div class="text-red">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>City<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="city" name="city" />
                                    @error('city')
                                        <div class="text-red">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-12 summernote">
                                    <label>Street<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="street" id="street"></textarea>
                                    @error('street')
                                        <div class="text-red">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
                                        <button type="button" class="btn btn-sm btn-success submit" id="btn_add"
                                            onclick="return formReset('show')">
                                            <i class="fas fa-plus font-size-16 mr-1"></i> Add Hotel
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
                                        <th>Address</th>
                                        <th>Contact No</th>
                                        <th>Manager</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($hotels as $hotel)
                                        <tr>
                                            <td>{{ $hotel->region }}</td>
                                            <td>{{ $hotel->contact_no }}</td>
                                            <td>{{ $hotel->manager }}</td>
                                            <td><button class="btn btn-secondary"><i
                                                        class="fas fa-eye"></i></button><button
                                                    class="btn btn-success"><i class="fas fa-edit"></i></button><button
                                                    class="btn btn-danger"><i class="fas fa-trash"></i></button></td>


                                        </tr>
                                    @endforeach --}}
                                </tbody>
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



    <script>
        $(function() {
            formReset("hide");

            // $("#data-table").dataTable();

            // function to save/update record
            $("#form_id")
                .on("submit", function(e) {
                    e.preventDefault();
                    trimInputFields();
                })
                .validate({
                    rules: {
                        region: {
                            required: true,
                        },
                        city: {
                            required: true,
                        },

                        street: {
                            required: true,
                        },
                        manager: {
                            required: true,
                        },
                        contact_no: {
                            required: true,
                        },

                        email: {
                            required: true,
                        },
                    },
                    messages: {
                        region: {
                            required: "Please provide region",
                        },

                        city: {
                            required: "Please provide city",
                        },

                        street: {
                            required: "Please provide street",
                        },

                        manager: {
                            required: "Please provide manager",
                        },
                        contact_no: {
                            required: "Please provide contact no",
                        },

                        email: {
                            required: "Please provide email",
                        },
                    },
                    errorElement: "span",
                    errorPlacement: function(error, element) {
                        error.addClass("invalid-feedback");
                        element.closest(".form-group").append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass("is-invalid");
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass("is-invalid");
                        $(element).addClass("is-valid");
                    },
                    submitHandler: function() {
                        var form_data = new FormData(document.getElementById("form_id"));
                        if ($("#uuid").val() == "") {
                            // console.log(form_data);
                            // for (var value of form_data.values()) {
                            //   console.log(value);
                            // }

                            // add record
                            $.ajax({
                                url: "{{ route('hotel.store') }}",
                                type: "POST",
                                data: form_data,
                                contentType: false,
                                cache: false,
                                processData: false,
                                dataType: "json",
                                success: function(data) {
                                    console.log(data)
                                    // if (data) {

                                    // 	// notification("success", "Success!", data.message);
                                    // } else {
                                    // 	// notification("error", "Error!", data.message);
                                    // }

                                    formReset("hide");
                                    // loadTable();
                                },
                                error: function({
                                    responseJSON
                                }) {
                                    notification("error", "Error!",
                                        "Error in Creating Department");
                                    // console.log(responseJSON);
                                    // console.log(responseJSON.responseText)
                                },
                            });
                        } else {
                            // update record
                            let url = '{{ route('hotel.update', ':id') }}';
                            url = url.replace(':id', $("#hidden_id").val());
                            form_data.append("_token", "{{ csrf_token() }}");
                            $.ajax({
                                url: url,
                                type: "POST",
                                data: form_data,
                                contentType: false,
                                cache: false,
                                processData: false,
                                dataType: "json",
                                success: function(data) {
                                    console.log(data)
                                    // if (data) {

                                    // 	// notification("success", "Success!", data.message);
                                    // } else {
                                    // 	// notification("error", "Error!", data.message);
                                    // }

                                    formReset("hide");
                                    // loadTable();
                                },
                                error: function({
                                    responseJSON
                                }) {
                                    notification("error", "Error!",
                                        "Error in Updating Department");
                                },
                            });
                        }
                    },
                });


        })


        $('#data-table').dataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('hotel.datatable') }}",
            },
            columns: [

                {
                    data: 'region',
                    name: 'region'
                },
                {
                    data: 'contact_no',
                    name: 'contact_no'
                },
                {
                    data: 'manager',
                    name: 'manager'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });



        // function to show details for viewing/updating
        editData = (id, type) => {
            let url = '{{ route('hotel.getone', ':id') }}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data)

                    formReset("show");
                    $("#hidden_id").val(data["id"]);
                    $("#contact_no").val(data["contact_no"]);
                    $("#manager").val(data["manager"]);
                    $("#email").val(data["email"]);
                    $("#email").val(data["email"]);
                    $("#region").val(data["region"]);
                    $("#city").val(data["city"]);
                    $("#street").val(data["street"]);


                    // if data is for viewing only
                    if (type == 0) {
                        $("#form_id input, select, textarea").prop("disabled", true);
                        $("#form_id button").prop("disabled", false);
                        $(".submit").hide();
                    }

                },
                error: function(data) {
                    console.log(data)

                },
            });
        };





        // function to delete data
        deleteData = (id) => {
            Swal.fire({
                title: "Are you sure you want to delete this record?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Yes, delete it!",
            }).then(function(t) {
                // if user clickes yes, delete it.
                if (t.value) {
                    let url = '{{ route('hotel.delete', ':id') }}';
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        type: "POST",
                        data:{
                            _token     : '{{csrf_token()}}' 
                        },
                        dataType: "json",
                        success: function(data) {
                            console.log(data)
                            // if (data.success) {
                            //     notification("success", "Success!", data.message);
                            //     loadTable();
                            // } else {
                            //     notification("error", "Error!", data.message);
                            // }
                        },
                        error: function({
                            responseJSON
                        }) {},
                    });
                }
            });
        };
    </script>
@endsection
