@extends('backend.layouts.master')
@section('title', 'Members List')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Members List ({{ $members->count() }})</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Bappd</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Members</a></li>
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
                    Members List Table
                    <a href="{{ route('admin.member.create') }}" class="btn btn-primary"><i class="las la-plus"></i> Add
                        New Member</a>
                </h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="table-responsive">
                    @if ($members->count() > 0)
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Constituency</th>
                                    <th>Party</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($members as $key=>$member)
                                    <tr>
                                        <td>{{ $members->perPage() * ($members->currentPage() - 1) + ++$key }}</td>
                                        <td><a href="{{ $member->getFirstMediaUrl('web_member_image') }}"
                                                class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                    height="40px" src="{{ $member->getFirstMediaUrl('web_member_image') }}"
                                                    alt=""></a></td>

                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->designation }}</td>
                                        <td>{{ $member->constituency }}</td>
                                        <td>{{ $member->party }}</td>
                                        <td>{{ $member->order }}</td>
                                        <td><span
                                                class="badge badge-soft-{{ $member->status == 1 ? 'primary' : 'danger' }}">{{ $member->status == 1 ? 'Yes' : 'No' }}</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle arrow-none" id="dLabel11" data-toggle="dropdown"
                                                    href="#" role="button" aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <i class="las la-ellipsis-v font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.member.show', lock($member->id)) }}"><i
                                                            class="las la-eye text-success font-18"></i> View</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.member.edit', lock($member->id)) }}"><i
                                                            class="las la-pen text-info font-18"></i> Edit</a>
                                                    <a class="dropdown-item deletebtn" href="javascript:void(0)"
                                                        data-id="{{ lock($member->id) }}"
                                                        id="custom-padding-width-alert"><i
                                                            class="las la-trash-alt text-danger font-18"></i> Delete</a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    @else
                        <p class="m-3 alert alert-danger text-center">No member data found right now!</p>
                    @endif
                    <!--end /table-->

                    <div class="mt-2">
                        {{ $members->links() }}
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
                text: "Once deleted, you will be able to recover this member!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'DELETE'
            }).then((result) => {
                if (result.value === true) {
                    var token = $("meta[name='csrf-token']").attr("member");
                    $.ajax({
                        url: "" + id,
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
