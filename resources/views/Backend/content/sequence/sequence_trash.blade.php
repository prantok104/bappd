@extends('backend.layouts.master')
@section('title', 'Sequence List')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="page-title">Trash Lists ({{ $sequences->count() }})</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Trash</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div>

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

    <div class="">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center justify-content-between">
                    Trash Lists
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            @if ($sequences->count() > 0)
                                <a href="{{ route('admin.content.sequence.list', lock(optional($sequences)->first()->contents->id)) }}"
                                    class="btn btn-primary"><i class="las la-angle-left"></i> Back
                                </a>
                            @endif
                        </div>
                    </div>
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
                                <th>Order</th>
                                <th>Episode</th>
                                <th>Free</th>
                                <th>Download</th>
                                <th>Published</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sequences as $key=>$sequence)
                                <tr>
                                    <td>{{ $sequences->perPage() * ($sequences->currentPage() - 1) + ++$key }}</td>
                                    <td><a href="{{ $sequence->getFirstMediaUrl('session_thumbnail') }}"
                                            class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                height="40px" src="{{ $sequence->getFirstMediaUrl('session_thumbnail') }}"
                                                alt=""></a></td>
                                    <td><a href="{{ $sequence->getFirstMediaUrl('session_cover_photo') }}"
                                            class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                height="40px"
                                                src="{{ $sequence->getFirstMediaUrl('session_cover_photo') }}"
                                                alt=""></a></td>
                                    <td>{{ $sequence->title }}</td>
                                    <td>{{ $sequence->order }}</td>
                                    <td>{{ $sequence->records_count }}</td>
                                    <td><span
                                            class="badge badge-soft-{{ $sequence->is_premium == 1 ? 'danger' : 'primary' }}">{{ $sequence->is_premium == 1 ? 'No' : 'Yes' }}</span>
                                    </td>
                                    <td><span
                                            class="badge badge-soft-{{ $sequence->is_downloadable == 1 ? 'primary' : 'danger' }}">{{ $sequence->is_downloadable == 1 ? 'Yes' : 'No' }}</span>
                                    </td>
                                    <td><span
                                            class="badge badge-soft-{{ $sequence->is_publish == 1 ? 'primary' : 'danger' }}">{{ $sequence->is_publish == 1 ? 'Yes' : 'No' }}</span>
                                    </td>
                                    <td class="text-right">
                                        <a href="javascript:void(0)" class="deletebtn"
                                            data-id="{{ lock($sequence->id) }}"><i
                                                class="las la-trash-alt text-danger font-18" title="Delete"></i></a>

                                        <a href="{{ route('admin.content.sequence.restore', lock($sequence->id)) }}"
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
                        {{ $sequences->links() }}
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
                text: "Permanently Delete",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'DELETE'
            }).then((result) => {
                if (result.value === true) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "{{ route('admin.content.sequence.force.delete', '') }}/" + id,
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
