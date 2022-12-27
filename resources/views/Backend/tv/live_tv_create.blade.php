@extends('backend.layouts.master')
@section('title', 'Live TV Management')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Live TV - Add New</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Live TV</a></li>
                            <li class="breadcrumb-item active">Live TV Management</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New TV</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.live.tv.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="tv_name">Tv name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('tv_name') is-invalid @enderror"  name="tv_name" id="tv_name" value="{{ old('tv_name') }}">
                                @error('tv_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="tv_category">Tv Category <span class="text-danger">*</span></label>
                                <select name="tv_category" id="tv_category" class="form-control @error('tv_category') is-invalid @enderror">
                                    <option value="">Select the category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" data-category_type="{{ $category->is_tv }}" {{ (old('tv_category') == $category->id ) ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('tv_category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="live_tv_link">Live Tv link <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('live_tv_link') is-invalid @enderror"  name="live_tv_link" id="live_tv_link" value="{{ old('live_tv_link') }}">
                                @error('live_tv_link')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="col-md-5 mb-3">
                                <label for="tv_thumbnail">Tv thumbnail <span class="text-danger">(Portrait, jpg, jpeg, png) (max: 512kb)*</span></label>
                                <input type="file" id="tv_thumbnail" name="tv_thumbnail" class="dropify form-control" />
                                @error('tv_thumbnail')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-7 mb-3">
                                <label for="tv_cover_photo">Tv cover photo <span class="text-danger">(Landscape, jpg, jpeg, png) (max: 1Mb)*</span></label>
                                <input type="file" id="tv_cover_photo" name="tv_cover_photo" class="dropify form-control" />
                                @error('tv_cover_photo')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="tv_description">Tv description</label>
                                <textarea id="tv_description" class="editor-enable @error('tv_description') is-invalid @enderror" name="tv_description">{{ old('tv_description') }}</textarea>
                                @error('tv_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="tv_type">Type <span class="text-danger">*</span></label>
                                <select name="tv_type" id="tv_type" class="form-control @error('tv_type') is-invalid @enderror">
                                    <option value="0">Free</option>
                                    <option value="1">Premium</option>

                                </select>
                                @error('tv_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="tv_featured">Featured <span class="text-danger">*</span></label>
                                <select name="tv_featured" id="tv_featured" class="form-control @error('tv_featured') is-invalid @enderror">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                @error('tv_featured')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="tv_status">Published <span class="text-danger">*</span></label>
                                <select name="tv_status" id="tv_status" class="form-control @error('tv_status') is-invalid @enderror">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>

                                </select>
                                @error('tv_status')
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
                                    Are you want to create a new tv ?
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
    </div>
@endsection
