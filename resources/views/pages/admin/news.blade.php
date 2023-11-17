@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@push('before-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" /> --}}
@endpush
@push('after-css')
@endpush
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">

                        <!-- Statistics Card -->
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">News Data</h4>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0)" class="btn btn-primary" id="btn-create-post" data-toggle="modal" data-target="#modal-create">Add News</a>
                                        {{-- <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-post">TAMBAH</a> --}}
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="dt-responsive table text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Berita</th>
                                                <th>Kategori</th>
                                                <th>Content</th>
                                                <th>Foto</th>
                                                <th>Di Post Oleh</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($news as $data)
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->title }}</td>
                                                    <td>{{ $data->category->name }}</td>
                                                    <td>{{ $data->content }}</td>
                                                    <td>
                                                        <div class="gallery-image popup-image" href="{{ URL::asset('news') }}/{{$data->picture}}">
                                                            <img src="{{ URL::asset('news') }}/{{$data->picture}}" width="100">
                                                        </div>
                                                    </td>
                                                    <td>{{ $data->created_by }}</td>
                                                    <td>
                                                        <a class="btn btn-warning" data-toggle="modal" data-target="#modalEdit{{$data->id}}" data-whatever="@mdo">Update</a>
                                                        <a onclick="deleteConfirmation({{$data->id}})" class="btn btn-danger"><em class="icon ni ni-delete"></em><span>Delete</span></a></a>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    
    {{-- MODAL TAMBAH --}}
    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modal-createLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-createLabel">Add News</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('news.post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Category</label>
                            <select class="form-control"id="category_id" name="category_id">
                                <option value="" disabled selected>Pilih Category</option>
                                @foreach($category as $data)
                                <option value="{{$data->id}}">{{$data->name}}
                                </option>
                                @endforeach
                            </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-content"></div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Contet</label>
                        <input type="text" class="form-control" id="content" name="content">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Picture</label>
                        <input type="file" class="form-control" id="picture" name="picture">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Created By</label>
                        <input type="text" class="form-control" id="created_by" name="created_by">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
          </div>
        </div>
    </div>

    {{-- MODAL EDIT --}}
    @foreach ($news as $data)
    <div class="modal fade" id="modalEdit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-createLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-createLabel">Add News</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('news.edit', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="form-control" id="recipient-name" name="id" value="{{$data->id}}" readonly hidden>
                    <div class="form-group">
                        <label for="name" class="control-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$data->title}}">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Category</label>
                            <select class="form-control"id="category_id" name="category_id">
                                <option value="" disabled selected>Pilih Category</option>
                                @foreach($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}
                                </option>
                                @endforeach
                            </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-content"></div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Content</label>
                        <input type="text" class="form-control" id="content" name="content" value="{{$data->content}}">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Picture</label>
                        <input type="file" class="form-control" id="picture" name="picture">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Created By</label>
                        <input type="text" class="form-control" id="created_by" name="created_by" value="{{$data->created_by}}">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
          </div>
        </div>
    </div>
    @endforeach


@endsection
@push('before-js')
@endpush
@push('after-js')
    <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

        $(document).ready(function () {        
            $('.dt-responsive').DataTable({
                responsive: true
            });
        });

</script>

<script>
    function deleteConfirmation(id) {
        swal.fire({
            title: "Hapus?",
            icon: 'question',
            text: "Apakah ingin dihapus!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya, Hapus Data!",
            cancelButtonText: "Tidak, Batal!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                let _url = "{{ URL::to('admin-news-delete') }}/" + id;
                $.ajax({
                    type: 'GET',
                    url: _url,
                    success: function (resp) {
                        if (resp.success) {
                            swal.fire("Sukses", resp.message, "success").then(function(){
                                location.reload();
                            })
                        } else {
                            swal.fire("Error!", 'Sumething went wrong.', "error");
                        }
                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Sumething went wrong.', "error");
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        })
    }
</script>


@endpush
