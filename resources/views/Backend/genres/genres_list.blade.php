@extends('backend.layouts.master')
@section('title', 'All Genres')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">All genres - List</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">genres</a></li>
                            <li class="breadcrumb-item active">All genres</li>
                        </ol>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- end page title end breadcrumb -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Genres Table</h4>
                    <a href="{{ route('admin.genres.create') }}" class="btn btn-sm btn-primary"><i class="las la-plus"></i>
                        Add New Genres</a>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">

                        @if ($genres->count() > 0)
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Icon</th>
                                        <th>Cover</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Featued</th>
                                        <th>Published</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($genres as $key => $genre)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><a href="{{ $genre->getFirstMediaUrl('genre_thumbnail') }}"
                                                    class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                        height="40px"
                                                        src="{{ $genre->getFirstMediaUrl('genre_thumbnail') }}"
                                                        alt=""></a></td>
                                            <td><a href="{{ $genre->getFirstMediaUrl('genre_cover_photo') }}"
                                                    class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                        height="40px"
                                                        src="{{ $genre->getFirstMediaUrl('genre_cover_photo') }}"
                                                        alt=""></a></td>
                                            <td>{{ $genre->name }}</td>

                                            <td>{{ $genre->description }}</td>
                                            <td>{{ $genre->is_featured == 1 ? 'Yes' : 'No' }}</td>
                                            <td>{{ $genre->is_published == 1 ? 'Yes' : 'No' }}</td>

                                            <td class="text-right">
                                                <a href="{{ route('admin.genres.edit', lock($genre->id)) }}"><i
                                                        class="las la-pen text-info font-18"></i></a>
                                                <a href="javascript:void(0)" class="deletebtn"
                                                    data-id="{{ lock($genre->id) }}"><i
                                                        class="las la-trash-alt text-danger font-18"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end /table-->

                            <div class="mt-2">
                                {{ $genres->links() }}
                            </div>
                        @else
                            <span class="badge badge-soft-danger p-3 d-block text-center">Have no genre found right now
                                ):):</span>
                        @endif

                    </div>
                    <!--end /tableresponsive-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
    </div>
@endsection


@push('script')
    <script>
        $('body').on('click', '.deletebtn', function() {
            var id = $(this).data("id");
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will be able to recover this genre!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'DELETE'
            }).then((result) => {
                if (result.value === true) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "{{ URL::route('admin.genres.destroy', '') }}/" + id,
                        type: "DELETE",
                        data: {
                            "_token": token,
                            "id": id
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                icon: 'success',
                                showConfirmButton: false,
                            });
                            location.reload();
                        },
                        error: function(response) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something went wrong.',
                                icon: 'error',
                                showConfirmButton: false,
                            });
                        }
                    });

                }
            });
        });
    </script>
@endpush
