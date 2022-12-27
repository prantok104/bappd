@extends('backend.layouts.master')
@section('title', 'Role Management')
@section('content')
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Role Management - Add New</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Authenticate</a></li>
                                <li class="breadcrumb-item active">Role Management</li>
                            </ol>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Role</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.authenticate.role.create') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Role Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('role_name') is-invalid @enderror"  name="role_name" id="validationServer01">
                                    @error('role_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mb-5">
                                    <p>Permission grant for:</p>

                                    @php $colors = ['primary', 'success', 'warning', 'danger']; @endphp

                                    @forelse( $permission as $key=>$p )
                                        <div class="custom-control custom-switch switch-{{ $colors[$key % 4] }}">
                                            <input type="checkbox" class="custom-control-input" id="{{ $p->name }}" value="{{ $p->id }}" name="permission[]">
                                            <label class="custom-control-label" for="{{ $p->name }}">{{ $p->name }}</label>
                                        </div>
                                    @empty
                                        <span class="badge badge-danger">Has no permission found right now (:</span>
                                    @endforelse

                                    @error('permission')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input @error('ensure') is-invalid @enderror" name="ensure" type="checkbox" value="1" id="invalidCheck3">
                                    <label class="form-check-label" for="invalidCheck3">
                                        Are you want to create a new role ?
                                    </label>
                                    @error('ensure')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Add New</button>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Role Table</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role name</th>
                                    <th>Permission</th>
                                    <th>Created date</th>
                                    <th>Updated date</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $colors = ['primary', 'success', 'warning', 'danger']; @endphp
                                @forelse( $roles as $key=>$role )
                                    <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach($role->permissions as $key=>$permission)
                                        <span class="badge badge-soft-{{$colors[$key%4]}}">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <span>{{ \Carbon\Carbon::parse($role->created_at)->format('d M, Y h:i:s:a') }}</span>
                                    </td>
                                    <td>
                                        <span>{{ \Carbon\Carbon::parse($role->updated_at)->format('d M, Y h:i:s:a') }}</span>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.authenticate.role.edit', $role->id) }}"><i class="las la-pen text-info font-18"></i></a>
                                        <a href="{{ route('admin.authenticate.role.delete') }}"><i class="las la-trash-alt text-danger font-18"></i></a>
                                    </td>
                                </tr>
                                @empty
                                    Have no role define
                                @endforelse
                                </tbody>
                            </table><!--end /table-->
                        </div><!--end /tableresponsive-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
        </div>
@endsection
