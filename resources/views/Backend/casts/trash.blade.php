@extends('backend.layouts.master')
@section('title', 'Trash - Cast Management')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Cast Management - Trash</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Cast</a></li>
                            <li class="breadcrumb-item active">Cast Management</li>
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
        <!--end col-->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Casts Trash Table</h4>
                    <a href="{{ route('admin.casts.index') }}" class="btn btn-md btn-primary"> <i
                            class="las la-angle-left"></i> Back</a>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">

                        @if ($casts->count() > 0)
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="output">
                                    @foreach ($casts as $key => $cast)
                                        <tr>
                                            <td>{{ $casts->perPage() * ($casts->currentPage() - 1) + ++$key }}</td>
                                            <td><a href="{{ $cast->getFirstMediaUrl('cast_profile') }}"
                                                    class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                        height="40px" src="{{ $cast->getFirstMediaUrl('cast_profile') }}"
                                                        alt=""></a></td>
                                            <td>{{ $cast->name }}</td>
                                            <td class="text-right">
                                                <a href="javascript:void(0)" class="deletebtn"
                                                    data-id="{{ lock($cast->id) }}"><i
                                                        class="las la-trash-alt text-danger font-18" title="Delete"></i></a>

                                                <a href="{{ route('admin.casts.restore', lock($cast->id)) }}"
                                                    title="Restore"><i class="las la-redo-alt text-info font-18"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end /table-->

                            <div class="mt-2">
                                {{ $casts->links() }}
                            </div>
                        @else
                            <span class="badge badge-soft-danger p-3">Have no cast found right now ):):</span>
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
    {{-- Delete btn  --}}
    <script>
        $('body').on('click', '.deletebtn', function() {
            var id = $(this).data("id");
            console.log(id);
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, Permanently Delete!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value === true) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "{{ route('admin.casts.force.delete', '') }}/" + id,
                        method: "DELETE",
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
