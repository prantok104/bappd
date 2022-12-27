@extends('backend.layouts.master')
@section('title', 'Edit - ' . $content->title)
@push('style')
    <style>
        .uppy-Dashboard-inner {
            height: 200px !important;
        }
    </style>
@endpush
@section('content')
    <section
        class="preloader position-absolute align-items-center justify-content-center left-0 top-0 right-0 bottom-0 w-100 h-100 bg-white"
        style="display: none; opacity: 0.74; z-index: 99999">
        <div class="text-center">
            <i class="la la-refresh text-secondary la-spin progress-icon-spin"></i>
        </div>
    </section>

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Content - Edit</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Content</a></li>
                            <li class="breadcrumb-item active">Content Edit</li>
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
                <h4 class="card-title d-flex align-items-center justify-content-between">Edit - Content <a
                        href="{{ route('admin.contents.index') }}" class="btn btn-primary"><i class="las la-eye"></i>
                        Contents
                        List</a></h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <form method="POST" action="{{ route('admin.contents.update', lock($content->id)) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                value="{{ $content->title }}" name="title" id="title">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="categories">Content Category <span class="text-danger">*</span></label>
                            <select class=" mb-3 form-control" name="categories[]" id="categories" style="width: 100%">
                                <option value="none">Select the category</option>
                                @foreach ($categories as $key => $category)
                                    <option value="{{ $category->id }}"
                                        {{ $content->categories->first()->id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="genres">Genres <span class="text-danger">( Optional )</span></label>
                            <select class="select2 mb-3 select2-multiple @error('genres') is-invalid @enderror"
                                name="genres[]" id="genres" style="width: 100%" multiple="multiple"
                                data-placeholder=" Choose">
                                @php
                                    $content_genres = [];
                                @endphp
                                @foreach (optional($content)->genres as $genre)
                                    @php
                                        $content_genres[] = $genre->id;
                                    @endphp
                                @endforeach
                                @foreach ($genres as $key => $value)
                                    <option value="{{ $value->id }}"
                                        {{ in_array($value->id, $content_genres) ? 'selected' : '' }}>
                                        {{ $value->name }}</option>
                                @endforeach
                            </select>
                            @error('genres')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="content_thumbnail">Thumbnail <span class="text-danger">(jpg, jpeg, png) (max:
                                    1Mb)*</span></label>
                            <input type="file" id="content_thumbnail" name="content_thumbnail"
                                class="dropify form-control"
                                data-default-file="{{ $content->getFirstMediaUrl('content_thumbnail') }}" />
                            @error('content_thumbnail')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="content_cover_photo">Cover photo <span class="text-danger">(jpg, jpeg, png) (max:
                                    2Mb)*</span></label>
                            <input type="file" id="content_cover_photo" name="content_cover_photo"
                                class="dropify form-control"
                                data-default-file="{{ $content->getFirstMediaUrl('content_cover_photo') }}" />
                            @error('content_cover_photo')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        <div class="col-md-12 mb-3">
                            <label for="content_description">Description <span class="text-danger">*</span></label>
                            <textarea id="content_description" class="editor-enable @error('content_description') is-invalid @enderror"
                                name="content_description">{{ $content->description }}</textarea>
                            @error('content_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                        <div class="col-md-4 mb-3">
                            <label for="trailer">Trailer <span class="text-danger">( Optional )</span></label>
                            <input type="text" name="trailer" id="trailer" placeholder="URL"
                                class="form-control @error('trailer') is-invalid @enderror"
                                value="{{ $content->trailer }}">
                            @error('trailer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="mdate">Release Date <span class="text-danger">( Optional )</span></label>
                            <input type="text" name="release_date" id="mdate" value="{{ $content->release_date }}"
                                placeholder="YYYY-MM-DD" class="form-control @error('release_date') is-invalid @enderror">
                            @error('release_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="col-md-4 mb-3">
                            <label for="series">Content Type <span class="text-danger">*</span></label>
                            <select name="series" id="series"
                                class="form-control @error('series') is-invalid @enderror">
                                <option value="0" {{ $content->is_series == 0 ? 'selected' : '' }}>Video</option>
                                <option value="1" {{ $content->is_series == 1 ? 'selected' : '' }}>Series</option>
                            </select>
                            @error('series')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3 mt-3">
                            <label for="option">Free/ Premium <span class="text-danger">*</span></label>
                            <select name="option" id="option"
                                class="form-control @error('option') is-invalid @enderror">
                                <option value="0" {{ $content->is_premium == 0 ? 'selected' : '' }}>Free</option>
                                <option value="1" {{ $content->is_premium == 1 ? 'selected' : '' }}>Premium</option>
                            </select>
                            @error('option')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3 mt-3">
                            <label for="downloadable">Downloadable <span class="text-danger">*</span></label>
                            <select name="downloadable" id="downloadable"
                                class="form-control @error('downloadable') is-invalid @enderror">
                                <option value="0" {{ $content->is_downloadable == 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ $content->is_downloadable == 1 ? 'selected' : '' }}>Yes</option>

                            </select>
                            @error('downloadable')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3 mt-3">
                            <label for="status">Publish <span class="text-danger">*</span></label>
                            <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option value="1" {{ $content->is_published == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $content->is_published == 0 ? 'selected' : '' }}>No</option>

                            </select>
                            @error('status')
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
                                Are you want to update the content ?
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
    {{-- Form area end --}}
@endsection

@push('script')
@endpush
