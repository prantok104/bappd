@extends('backend.layouts.master')
@section('title', 'Users')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">All User - List</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
                            <li class="breadcrumb-item active">All Users</li>
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
                <div class="card-header">
                    <h4 class="card-title">Users Table</h4>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">

                        @if ($users->count() > 0)
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->mobile }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                @if ($item->role == 2)
                                                    <span class="badge badge-success">Ott User</span>
                                                @else
                                                    <span class="badge badge-danger">Please Check User Role</span>
                                                @endif
                                            </td>
                                            <td>
                                                @php $colors = ['primary', 'success', 'warning', 'danger']; @endphp
                                                <div class="custom-control custom-switch switch-success">
                                                    <input type="checkbox" class="custom-control-input is_active" id="is_active_id{{ $item->id }}" {{ $item->is_active == 1 ? 'checked' : '' }}  data-id="{{ $item->id }}" name="is_active">
                                                    <label class="custom-control-label" for="is_active_id{{ $item->id }}"></label>
                                                </div>
                                                {{-- <input type="checkbox" data-height="25" name="is_active" class="is_active"
                                                    id="is_active" data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                    data-onstyle="success" data-offstyle="danger"
                                                    data-id="{{ $item->id }}"
                                                    {{ $item->is_active == 1 ? 'checked' : '' }}> --}}
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="{{ route('admin.users.update', $item->id) }}" class="btn btn-sm btn-primary"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin.user.profile', $item->id) }}"
                                                        class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                                    <a href="javascript:void(0);" data-id="{{ $item->id }}"
                                                        class="btn btn-sm btn-danger deletebtn"><i
                                                            class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end /table-->

                            <div class="mt-2">
                                {{ $users->links() }}
                            </div>
                        @else
                            <span class="badge badge-soft-danger p-3">Have no genre found right now ):):</span>
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

        $(document).on('change', '.is_active', function() {
            var id = $(this).data('id');
            var is_active = $(this).prop('checked') == true ? 1 : 0;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ URL::route('admin.user.status', '') }}" + '/' + id,
                data: {
                    'is_active': is_active
                },
                success: function(data) {
                    console.log(data.success)
                }
            });
        })

        $('body').on('click', '.deletebtn', function() {

            var id = $(this).data("id");
            Swal.fire({
                title: 'Are you sure?',
                // text: "If You Remove A Employee, This System Also Remove User ID. You Will Not Be Able To Recover It!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value === true) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        type: "DELETE",
                        url: "{{ URL::route('admin.user.delete', '') }}/" + id,
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function(data) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                icon: 'success',
                                showConfirmButton: false,
                            });
                            location.reload();
                        },
                        error: function(data) {
                            Swal.fire({
                                title: 'Alert!',
                                text: 'Something Wrong',
                                icon: 'alert',
                                showConfirmButton: false,
                            });
                            // console.log('Error:', data);
                        }
                    })
                }
            });
        });
    </script>
@endpush
