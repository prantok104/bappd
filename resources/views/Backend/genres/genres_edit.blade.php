@extends('backend.layouts.master')
@section('title', 'Edit - ' . $genre->name)
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Genres Management - Edit</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Genre</a></li>
                            <li class="breadcrumb-item active">Genres Edit</li>
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
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Edit - Genres</h4>
                    <a href="{{ route('admin.genres.index') }}" class="btn btn-sm btn-primary"><i
                            class="las la-angle-left"></i>
                        Back</a>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.genres.update', lock($genre->id)) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="genre_name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('genre_name') is-invalid @enderror"
                                    name="genre_name" id="genre_name" value="{{ $genre->name }}">
                                @error('genre_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="genre_description">Description</label>
                                <input type="text" class="form-control @error('genre_description') is-invalid @enderror"
                                    name="genre_description" id="genre_description" value="{{ $genre->description }}">

                            </div>


                            <div class="col-md-5 mb-3">
                                <label for="genre_thumbnail">Thumbnail <span class="text-danger">(Portrait, jpg, jpeg,
                                        png) (max: 512kb)*</span></label>
                                <input type="file" id="genre_thumbnail" name="genre_thumbnail"
                                    class="dropify form-control"
                                    data-default-file="{{ $genre->getFirstMediaUrl('genre_thumbnail') }}" />
                                @error('genre_thumbnail')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-7 mb-3">
                                <label for="genre_cover_photo">Cover photo <span class="text-danger">(Landscape, jpg,
                                        jpeg, png) (max: 1Mb)*</span></label>
                                <input type="file" id="genre_cover_photo" name="genre_cover_photo"
                                    class="dropify form-control"
                                    data-default-file="{{ $genre->getFirstMediaUrl('genre_cover_photo') }}" />
                                @error('genre_cover_photo')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch switch-featured">
                                <input type="checkbox" class="custom-control-input" id="featured" value="1"
                                    name="featured" {{ $genre->is_featured == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="featured">Featured</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch switch-publish">
                                <input type="checkbox" class="custom-control-input" id="publish" value="1"
                                    name="publish" {{ $genre->is_published == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="publish">Publish</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input @error('ensure') is-invalid @enderror" name="ensure"
                                    type="checkbox" value="1" id="invalidCheck3" checked>
                                <label class="form-check-label" for="invalidCheck3">
                                    Are you want update the genre ?
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
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
@endsection
