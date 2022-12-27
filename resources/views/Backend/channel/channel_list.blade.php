@extends('backend.layouts.master')
@section('title', 'Channels List')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Channels List ({{ $channel_count }})</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Channel</a></li>
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
                <h4 class="card-title d-flex align-items-center justify-content-between">Channels List Table <a
                        href="{{ route('admin.channel.create') }}" class="btn btn-primary"><i class="las la-plus"></i> Add
                        New channel</a></h4>
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
                                <th>Name</th>
                                <th>Bio</th>
                                <th>Featured</th>
                                <th>Published</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($channels_list as $key=>$channel)
                                <tr>
                                    <td>{{ $channels_list->perPage() * ($channels_list->currentPage() - 1) + ++$key }}</td>
                                    <td><a href="{{ $channel->getFirstMediaUrl('channel_thumbnail') }}"
                                            class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                height="40px" src="{{ $channel->getFirstMediaUrl('channel_thumbnail') }}"
                                                alt=""></a></td>
                                    <td><a href="{{ $channel->getFirstMediaUrl('channel_cover_photo') }}"
                                            class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                height="40px" src="{{ $channel->getFirstMediaUrl('channel_cover_photo') }}"
                                                alt=""></a></td>
                                    <td>{{ $channel->name }}</td>
                                    <td>{{ $channel->bio }}</td>
                                    <td> <span
                                            class="badge badge-soft-{{ $channel->is_featured == 1 ? 'primary' : 'danger' }}">{{ $channel->is_featured == 1 ? 'Yes' : 'No' }}</span>
                                    </td>
                                    <td> <span
                                            class="badge badge-soft-{{ $channel->is_published == 1 ? 'primary' : 'danger' }}">{{ $channel->is_published == 1 ? 'Yes' : 'No' }}</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown d-inline-block">
                                            <a class="dropdown-toggle arrow-none" id="dLabel11" data-toggle="dropdown"
                                                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                <i class="las la-ellipsis-v font-20 text-muted"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.channel.show', lock($channel->id)) }}"><i
                                                        class="las la-eye text-success font-18"></i> View</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.channel.edit', lock($channel->id)) }}"><i
                                                        class="las la-pen text-info font-18"></i> Edit</a>
                                                <a class="dropdown-item deletebtn" href="javascript:void(0)"
                                                    data-id="{{ lock($channel->id) }}"><i
                                                        class="las la-trash-alt text-danger font-18"></i> Delete</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <td>
                                    <span class="badge badge-soft-danger p-3">Have no channel found in our system ):</span>
                                </td>
                            @endforelse

                        </tbody>
                    </table>
                    <!--end /table-->

                    <div class="mt-2">
                        {{ $channels_list->links() }}
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
                text: "Once deleted, you will be able to recover this channel!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'DELETE'
            }).then((result) => {
                if (result.value === true) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "{{ URL::route('admin.channel.destroy', '') }}/" + id,
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
