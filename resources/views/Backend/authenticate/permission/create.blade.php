@extends('backend.layouts.master')
@section('title', 'Permission Management')
@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Permission Management - Add New</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Authenticate</a></li>
                            <li class="breadcrumb-item active">Permission Management</li>
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
                    <h4 class="card-title">Add New Permission</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="post" action="{{ route('admin.authenticate.permission.create') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationServer01">Permission Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('permission_name') is-invalid @enderror" value="{{ old('permission_name') }}" name="permission_name" id="validationServer01">
                                @error('permission_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input @error('ensure') is-invalid @enderror" {{ old('ensure') ? 'checked' : '' }} name="ensure" type="checkbox" value="1" id="invalidCheck3">
                                <label class="form-check-label" for="invalidCheck3">
                                    Are you want to create a new permission ?
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
                                <th>Permission Name</th>
                                <th>Created date</th>
                                <th>Updated date</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $colors = ['primary', 'success', 'warning', 'danger']; @endphp

                                @forelse($permission as $key=>$p)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><span class="badge badge-soft-{{$colors[$key  % 4]}}">{{ $p->name }}</span></td>
                                        <td>
                                            <span>{{ \Carbon\Carbon::parse($p->created_at)->format('d M, Y h:i:s:a') }}</span>
                                        </td>
                                        <td>
                                            <span>{{ \Carbon\Carbon::parse($p->updated_at)->format('d M, Y h:i:s:a') }}</span>
                                        </td>
                                        <td class="text-right">
                                            <a href="#"><i class="las la-pen text-info font-18"></i></a>
                                            <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td rowspan="2" class="badge badge-soft-danger" class="p-2 m-2">No permission available right now ):</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div>


@endsection
