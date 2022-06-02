@extends('layouts.app')

@section('title')
Room Types
@endsection

@section('content')

<x-page-header title="Room Types"/>


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      
            <!-- form -->
            <div class="row" id="div_form">
              <div class="col-xl-12">
                  {{-- action="{{ route('room_types.store') }}" method="post" --}}
                  <form class="card card-primary card-outline" id="form_id" name="form_id">
                      @csrf
                      <div class="card-header">
                          <h3 class="card-title">Add Room Type</h3>
                      </div>
                      <div class="card-body">
                          <input type="hidden" id="hidden_id" name="hidden_id" />
                          {{-- <input type="hidden" class="form-control" id="status" name="status" readonly /> --}}

                          <div class="row">
                              <div class="form-group col-md-4">
                                  <label>Room Type<span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" id="room_type" name="room_type" />
                                  @error('room_type')
                                      <div class="text-red">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>

                              <div class="form-group col-md-4">
                                  <label>No. of Beds<span class="text-danger">*</span></label>
                                  <input type="number" class="form-control" id="no_of_beds" name="no_of_beds" />
                                  @error('no_of_beds')
                                      <div class="text-red">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>


                              <div class="form-group col-md-4">
                                  <label>Max Guest<span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" id="max_guest" name="max_guest" />
                                  @error('max_guest')
                                      <div class="text-red">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>

                          </div>

                          <div class="row my-3">
                              <div class="form-group col-md-6">
                                  <label>Rate<span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" id="rate" name="rate" />
                                  @error('rate')
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
                                  <h3 class="card-title">List of Room Types</h3>
                              </div>
                              <div
                                  class="col-6
                                    d-sm-flex
                                    align-items-center
                                    justify-content-end">

                                  <div class="page-title-right">
                                      <button type="button" class="btn btn-sm btn-primary submit" id="btn_add"
                                          onclick="return formReset('show')">
                                          <i class="fas fa-plus font-size-16 mr-1"></i> Add Room Type
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
                                      <th>Room Type</th>
                                      <th>No. of beds</th>
                                      <th>Max Guest</th>
                                      <th>rate</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                              
                              </tbody>
                          </table>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
          </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <script>
    $(function() {
        formReset("hide");
        loadTable();
        // $("#data-table").dataTable();

        // function to save/update record
        $("#form_id")
            .on("submit", function(e) {
                e.preventDefault();
                trimInputFields();
            })
            .validate({
                rules: {
                    room_type: {
                        required: true,
                    },
                    no_of_beds: {
                        required: true,
                    },

                    max_guest: {
                        required: true,
                    },
                    rate: {
                        required: true,
                    },
                  
                },
                messages: {
                  room_type: {
                        required: "Please provide room type",
                    },

                    no_of_beds: {
                        required: "Please provide number of beds",
                    },

                    max_guest: {
                        required: "Please provide max guest",
                    },

                    rate: {
                        required: "Please provide rate",
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
                    if ($("#hidden_id").val() == "") {
                        // console.log(form_data);
                        // for (var value of form_data.values()) {
                        //   console.log(value);
                        // }

                        // add record
                        $.ajax({
                            url: "{{ route('room_types.store') }}",
                            type: "POST",
                            data: form_data,
                            contentType: false,
                            cache: false,
                            processData: false,
                            dataType: "json",
                            success: function(data) {
                                console.log(data)
                                loadTable();
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
                                    "Error in Creating Room Type");
                                // console.log(responseJSON);
                                // console.log(responseJSON.responseText)
                            },
                        });
                    } else {
                        // update record
                        let url = '{{ route('room_types.update', ':id') }}';
                        url = url.replace(':id', $("#hidden_id").val());
                        form_data.append("_token", "{{ csrf_token() }}");
                        form_data.append("_method", "PUT");


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
                                loadTable();

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
                                    "Error in Updating Room Type");
                            },
                        });
                    }
                },
            });


    })

    loadTable = () => {

        $("#data-table").dataTable().fnClearTable();
        $("#data-table").dataTable().fnDraw();
        $("#data-table").dataTable().fnDestroy();
        $('#data-table').dataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('room_types.datatable') }}",
            },
            columns: [

                {
                    data: 'room_type',
                    name: 'room_type'
                },
                {
                    data: 'no_of_beds',
                    name: 'no_of_beds'
                },
                {
                    data: 'max_guest',
                    name: 'max_guest'
                },
                {
                    data: 'rate',
                    name: 'rate'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });

    }

    // function to show details for viewing/updating
    editData = (id, type) => {
        let url = '{{ route('room_types.getone', ':id') }}';
        url = url.replace(':id', id);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log(data)

                formReset("show");
                $("#hidden_id").val(data["id"]);
                $("#room_type").val(data["room_type"]);
                $("#no_of_beds").val(data["no_of_beds"]);
                $("#max_guest").val(data["max_guest"]);
                $("#rate").val(data["rate"]);


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
                let url = '{{ route('room_types.delete', ':id') }}';
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}'
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
