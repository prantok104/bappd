@extends('backend.layouts.master')
@section('title', 'Content Types Management')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Content Types Management - Edit</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Content</a></li>
                            <li class="breadcrumb-item active">Content Types Management</li>
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
                    <h4 class="card-title">Edit Content Type</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.content.type.update', $content_type->id) }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="content_type_name">Content type name <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $content_type->content_types_name }}" class="form-control @error('content_type_name') is-invalid @enderror"  name="content_type_name" id="content_type_name">
                                @error('content_type_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input @error('ensure') is-invalid @enderror" name="ensure" type="checkbox" value="1" id="invalidCheck3">
                                <label class="form-check-label" for="invalidCheck3">
                                    Are you want to update this content type ?
                                </label>
                                @error('ensure')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Content types Table</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Content Type name</th>
                                <th>Created date</th>
                                <th>Updated date</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse( $content_types as $key=>$content )
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $content->content_types_name }}</td>
                                    <td>
                                        <span>{{ \Carbon\Carbon::parse($content->created_at)->format('d M, Y h:i:s:a') }}</span>
                                    </td>
                                    <td>
                                        <span>{{ \Carbon\Carbon::parse($content->updated_at)->format('d M, Y h:i:s:a') }}</span>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.content.type.update', $content->id) }}"><i class="las la-pen text-info font-18"></i></a>
                                        <a href=""><i class="las la-trash-alt text-danger font-18"></i></a>
                                    </td>
                                </tr>
                            @empty
                                Have no content type define
                            @endforelse
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div>
@endsection
