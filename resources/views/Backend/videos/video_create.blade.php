@extends('backend.layouts.master')
@section('title', 'Channel Video Create')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Video - Upload</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Videos</a></li>
                            <li class="breadcrumb-item active">Video Upload</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
        <!-- end page title end breadcrumb -->

        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="new-content-area">
                        <h3>Upload a New Video </h3>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="las la-arrow-left"></i> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.video.upload') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="col-md-6 mb-3">
                                <label for="video_title">Video Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('video_title') is-invalid @enderror" value="{{ old('video_title') }}"  name="video_title" id="video_title">
                                @error('video_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="video_category">Video Category <span class="text-danger">*</span></label>
                                <select name="video_category" id="video_category" class="form-control @error('video_category') is-invalid @enderror">
                                    <option value="">Select the category</option>
                                    @foreach($video_categories as $category)
                                        <option value="{{ $category->id }}" data-category_type="{{ $category->is_series }}" {{ (old('video_category') == $category->id ) ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('video_category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="col-md-3 mb-3">
                                <label for="video_duration">Video Duration <span class="text-danger">(Optional)</span></label>
                                <input type="text" class="form-control @error('video_duration') is-invalid @enderror" value="{{ old('video_duration') }}"  name="video_duration" id="video_duration" placeholder="Ex: 02:30:15 Sec">
                                @error('video_duration')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-5 mb-3">
                                <label for="video_thumbnail">Video Thumbnail <span class="text-danger">(Portrait, jpg, jpeg, png) (max: 512kb)*</span></label>
                                <input type="file" id="video_thumbnail" name="video_thumbnail" class="dropify form-control" />
                                @error('video_thumbnail')
                                <span class="text-danger">
                                {{ $message }}
                            </span>
                                @enderror
                            </div>

                            <div class="col-md-7 mb-3">
                                <label for="video_cover_photo">Video Cover photo <span class="text-danger">(Landscape, jpg, jpeg, png) (max: 1Mb)*</span></label>
                                <input type="file" id="video_cover_photo" name="video_cover_photo" class="dropify form-control"/>
                                @error('video_cover_photo')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="video_description">Video description</label>
                                <textarea id="video_description" class="editor-enable @error('video_description') is-invalid @enderror" name="video_description">{{ old('video_description') }}</textarea>
                                @error('video_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="video_content_type">Video Content type <span class="text-danger">*</span></label>
                                <select name="video_content_type" id="video_content_type" class="form-control @error('video_content_type') is-invalid @enderror">
                                    <option value="">Select Content Type</option>
                                    @foreach($content_types as $content_type)
                                        <option value="{{ $content_type->id }}" {{ (old('video_content_type') == $content_type->id) ? 'selected' : '' }} >{{ $content_type->content_types_name }}</option>
                                    @endforeach
                                </select>
                                @error('video_content_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="video_content">Video Content <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('video_content') is-invalid @enderror" value="{{ old('video_content') }}"  name="video_content" id="video_content">
                                @error('video_content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="video_type">Type <span class="text-danger">*</span></label>
                                <select class="form-control" name="video_type" id="video_type" >
                                    <option value="0">Free</option>
                                    <option value="1">Premium</option>
                                </select>
                                @error('video_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="downloadable">Downloadable <span class="text-danger">*</span></label>
                                <select class="form-control" name="downloadable" id="downloadable" >
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                @error('downloadable')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="publish">Publish <span class="text-danger">*</span></label>
                                <select class="form-control" name="publish" id="publish" >
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                @error('publish')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="col-md-12 form-group">
                                <div class="form-check">
                                    <input class="form-check-input @error('ensure') is-invalid @enderror" name="ensure" type="checkbox" value="1" id="invalidCheck3">
                                    <label class="form-check-label" for="invalidCheck3">
                                        Are you want to create a new video ?
                                    </label>
                                    @error('ensure')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Add New</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

