@extends('layouts.app')

@section('title')
Rooms
@endsection

@section('content')

<x-pageHeader href="{{ route('rooms.index') }}" title="Rooms"/>



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
                      <h3 class="card-title">Add Room</h3>
                  </div>
                  <div class="card-body">
                      <input type="hidden" id="hidden_id" name="hidden_id" />
                      {{-- <input type="hidden" class="form-control" id="status" name="status" readonly /> --}}

                      <div class="row">
                          <div class="form-group col-md-4">
                              <label>Room No.<span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="room_no" name="room_no" />
                              @error('room_no')
                                  <div class="text-red">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>

                          <div class="form-group col-md-4">
                              <label>Image<span class="text-danger">*</span></label>
                              <input type="file" class="form-control" id="image" name="image" />
                              @error('image')
                                  <div class="text-red">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>


                          <div class="form-group col-md-4">
                              <label>Room Type<span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="room_type_id" name="room_type_id" />
                              @error('email')
                                  <div class="text-red">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>

                      </div>

                      <div class="row my-3">
                          <div class="form-group col-md-6">
                              <label>Hotel<span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="hotel_id" name="hotel_id" />
                              @error('hotel_id')
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
                                      <i class="fas fa-plus font-size-16 mr-1"></i> Add Room
                                  </button>
                              </div>

                          </div>
                      </div>
                  </div>
                  <!-- /.card-header -->
                  {{-- <img src="{{ route('rooms.image','eVsNKOn04FzfNRapO0jYlNcPy6hTwAkXDR9kXmqg.jpg') }}" alt="" title=""> --}}

                  {{-- <img src="../public/uploads/eVsNKOn04FzfNRapO0jYlNcPy6hTwAkXDR9kXmqg.jpg" alt=""> --}}
                  {{-- <img src="{{ route('rooms.image', 'eVsNKOn04FzfNRapO0jYlNcPy6hTwAkXDR9kXmqg.jpg') }}" alt='job image' title='job image'> --}}
                  <!-- Card Body -->
                  <div class="card-body">
                      <table id="data-table" class="table table-hover table-bordered w-100">
                          <thead>
                              <tr>
                                <th>Image</th>
                                  <th>Room No</th>
                                  <th>is_occupied</th>
                                  <th>Room Type</th>
                                  <th>Hotel Branch</th>

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
                  room_no: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },

                    room_type_id: {
                        required: true,
                    },
                    hotel_id: {
                        required: true,
                    },
              
                },
                messages: {
                  room_no: {
                        required: "Please provide room no",
                    },

                    image: {
                        required: "Please provide image",
                    },

                    room_type_id: {
                        required: "Please provide room type",
                    },

                    hotel_id: {
                        required: "Please provide hotel",
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
                            url: "{{ route('rooms.store') }}",
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
                                    "Error in Creating Room");
                                // console.log(responseJSON);
                                // console.log(responseJSON.responseText)
                            },
                        });
                    } else {
                        // update record
                        let url = '{{ route('rooms.update', ':id') }}';
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
                                    "Error in Updating Room");
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
                url: "{{ route('rooms.datatable') }}",
            },
            columns: [

                {
                    data: "image",
                    name: null,
                    // render: function (aData, type, row) {
                    //     // return "<img src="{{ asset('storage/uploads/eVsNKOn04FzfNRapO0jYlNcPy6hTwAkXDR9kXmqg.jpg') }}" alt='job image' title='job image'>";
                    // }
                },
                {
                    data: 'room_no',
                    name: 'room_no'
                },
                {
                    data: 'is_occupied',
                    name: 'is_occupied'
                },
                {
                    data: null,
                    name: null,
                    render: function (aData, type, row) {
                        console.log(aData)
                        return aData.room_types.room_type;
                    }
                },
                {
                    data: 'hotel_id',
                    name: 'hotel_id'
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
        let url = '{{ route('rooms.getone', ':id') }}';
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
                let url = '{{ route('rooms.delete', ':id') }}';
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
