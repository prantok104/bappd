@extends('backend.layouts.master')
@section('title', 'Channel Create')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Channel - Add New</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Channel</a></li>
                            <li class="breadcrumb-item active">Channel Create</li>
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

    {{-- Form area start --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center justify-content-between">Add New Channel <a
                        href="{{ route('admin.channel.index') }}" class="btn btn-primary"><i class="las la-eye"></i>
                        Channels List</a></h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <form method="POST" action="{{ route('admin.channel.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="channel_name">Channel Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('channel_name') is-invalid @enderror"
                                value="{{ old('channel_name') }}" name="channel_name" id="channel_name">
                            @error('channel_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="channel_bio">Channel short biography <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('channel_bio') is-invalid @enderror"
                                value="{{ old('channel_bio') }}" name="channel_bio" id="channel_bio">
                            @error('channel_bio')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="channel_thumbnail">Channel thumbnail <span class="text-danger">(jpg, jpeg, png)
                                    (max: 512kb)*</span></label>
                            <input type="file" id="channel_thumbnail" name="channel_thumbnail"
                                class="dropify form-control" />
                            @error('channel_thumbnail')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="channel_cover_photo">Channel cover photo <span class="text-danger">(jpg, jpeg, png)
                                    (max: 1Mb)*</span></label>
                            <input type="file" id="channel_cover_photo" name="channel_cover_photo"
                                class="dropify form-control" />
                            @error('channel_cover_photo')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        <div class="col-md-12 mb-3">
                            <label for="channel_description">Channel description <span class="text-danger">*</span></label>
                            <textarea id="channel_description" class="editor-enable @error('channel_description') is-invalid @enderror"
                                name="channel_description">{{ old('channel_description') }}</textarea>
                            @error('channel_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="col-md-4 mb-3">
                            <label for="featured">Feature <span class="text-danger">*</span></label>
                            <select name="featured" id="featured"
                                class="form-control @error('featured') is-invalid @enderror">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            @error('featured')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="published">Publish <span class="text-danger">*</span></label>
                            <select name="published" id="published"
                                class="form-control @error('published') is-invalid @enderror">
                                <option value="1">Yes</option>
                                <option value="0">No</option>

                            </select>
                            @error('published')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input @error('ensure') is-invalid @enderror" name="ensure"
                                type="checkbox" value="1" id="invalidCheck3" checked>
                            <label class="form-check-label" for="invalidCheck3">
                                Are you want to create a new channel ?
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
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    {{-- Form area end --}}
@endsection
