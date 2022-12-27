@extends('backend.layouts.master')
@section('title', 'Trash - Contents List')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Contents List ({{ $contents->count() }})</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Contents</a></li>
                            <li class="breadcrumb-item active">List</li>
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

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center justify-content-between">
                    Contents Trash Table

                    <a href="{{ route('admin.contents.create') }}" class="btn btn-primary"><i class="las la-plus"></i> Add
                        New Content</a>
                </h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Icon</th>
                                <th>Cover</th>
                                <th>Title</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contents as $key=>$content)
                                <tr>
                                    <td>{{ $contents->perPage() * ($contents->currentPage() - 1) + ++$key }}</td>
                                    <td><a href="{{ $content->getFirstMediaUrl('content_thumbnail') }}"
                                            class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                height="40px" src="{{ $content->getFirstMediaUrl('content_thumbnail') }}"
                                                alt=""></a></td>
                                    <td><a href="{{ $content->getFirstMediaUrl('content_cover_photo') }}"
                                            class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                height="40px" src="{{ $content->getFirstMediaUrl('content_cover_photo') }}"
                                                alt=""></a></td>
                                    <td>{{ $content->title }}</td>

                                    <td class="text-right">
                                        <a href="javascript:void(0)" class="deletebtn" data-id="{{ lock($content->id) }}"><i
                                                class="las la-trash-alt text-danger font-18" title="Delete"></i></a>

                                        <a href="{{ route('admin.contents.restore', lock($content->id)) }}"
                                            title="Restore"><i class="las la-redo-alt text-info font-18"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!--end /table-->

                    <div class="mt-2">
                        {{ $contents->links() }}
                    </div>
                </div>
                <!--end /tableresponsive-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div> <!-- end col -->
@endsection


@push('script')
    <script>
        $('body').on('click', '.deletebtn', function() {
            var id = $(this).data("id");
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, Make sure permanentlly delete the content, [ Series, Videos ]",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'DELETE'
            }).then((result) => {
                if (result.value === true) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "{{ URL::route('admin.contents.force.delete', '') }}/" + id,
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
