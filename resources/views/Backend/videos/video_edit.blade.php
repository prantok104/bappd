@extends('backend.layouts.master')
@section('title', 'Channel Video Edit')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">{{ $video->title }} - Edit</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">DhakaLive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">video</a></li>
                            <li class="breadcrumb-item active">Video Edit</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->


        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="new-content-area">
                        <h3>Video Update </h3>
                    </div>
                    <a href="{{ route('admin.channel.view', lock($video->channel_id)) }}" class="btn btn-primary"><i class="las la-arrow-left"></i> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.channel.video.update', lock($video->id)) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="video_title">Video Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('video_title') is-invalid @enderror" value="{{ $video->title }}"  name="video_title" id="video_title">
                                @error('video_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="col-md-5 mb-3">
                                <label for="video_thumbnail">Video thumbnail <span class="text-danger">(Portrait, jpg, jpeg, png) (max: 512kb)*</span></label>
                                <input type="file" id="video_thumbnail" name="video_thumbnail" data-default-file="{{ $video->getFirstMediaUrl('video_thumbnail') }}" class="dropify form-control" />
                                @error('video_thumbnail')
                                <span class="text-danger">
                                {{ $message }}
                            </span>
                                @enderror
                            </div>

                            <div class="col-md-7 mb-3">
                                <label for="video_cover_photo">Video cover photo <span class="text-danger">(Landscape, jpg, jpeg, png) (max: 1Mb)*</span></label>
                                <input type="file" id="video_cover_photo" name="video_cover_photo" data-default-file="{{ $video->getFirstMediaUrl('video_cover_photo') }}" class="dropify form-control"/>
                                @error('video_cover_photo')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="video_description">video description</label>
                                <textarea id="video_description" class="editor-enable @error('video_description') is-invalid @enderror" name="video_description">{{ $video->description }}</textarea>
                                @error('video_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="video_content_type">video Content type</label>
                                <select name="video_content_type" id="video_content_type" class="form-control">
                                    <option value="">Select Content Type</option>
                                    @foreach($content_types as $content_type)
                                        <option value="{{ $content_type->id }}" {{ ($video->content_type == $content_type->id) ? 'selected' : '' }} >{{ $content_type->content_types_name }}</option>
                                    @endforeach
                                </select>
                                @error('video_content_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="video_content">video Content</label>
                                <input type="text" class="form-control @error('video_content') is-invalid @enderror" value="{{ $video->content }}"  name="video_content" id="video_content">
                                @error('video_content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="form-check">
                                    <input class="form-check-input @error('ensure') is-invalid @enderror" name="ensure" type="checkbox" value="1" id="invalidCheck3">
                                    <label class="form-check-label" for="invalidCheck3">
                                        Are you want to update the video ?
                                    </label>
                                    @error('ensure')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--end row-->
    <!-- end page title end breadcrumb -->
@endsection
