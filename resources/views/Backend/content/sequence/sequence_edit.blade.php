@extends('backend.layouts.master')
@section('title', 'Edit - ' . $sequence->title)
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Seasons - Edit</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Seasons</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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
                <h4 class="card-title d-flex align-items-center justify-content-between">Edit - Seasons<a
                        href="{{ route('admin.content.sequence.list', lock($sequence->contents->id)) }}"
                        class="btn btn-primary"><i class="las la-angle-left"></i> Back</a></h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <form method="POST" action="{{ route('admin.content.sequence.update', lock($sequence->id)) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" value="{{ $sequence->title }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="trailer">Trailer <span class="text-danger">( Optional )</span></label>
                            <input type="text" name="trailer" id="trailer" placeholder="URL"
                                class="form-control @error('trailer') is-invalid @enderror"
                                value="{{ $sequence->trailer }}">
                            @error('trailer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="col-md-4 mb-3">
                            <label for="session_thumbnail">Session thumbnail <span class="text-danger">(jpg, jpeg, png)
                                    (max: 1Mb)*</span></label>
                            <input type="file" id="session_thumbnail" name="session_thumbnail"
                                class="dropify form-control"
                                data-default-file="{{ $sequence->getFirstMediaUrl('session_thumbnail') }}" />
                            @error('session_thumbnail')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="session_cover_photo">Session cover photo <span class="text-danger">(jpg, jpeg, png)
                                    (max: 2Mb)*</span></label>
                            <input type="file" id="session_cover_photo" name="session_cover_photo"
                                class="dropify form-control"
                                data-default-file="{{ $sequence->getFirstMediaUrl('session_cover_photo') }}" />
                            @error('session_cover_photo')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        <div class="col-md-12 mb-3">
                            <label for="session_description">Session description <span class="text-danger">*</span></label>
                            <textarea id="session_description" class="editor-enable @error('session_description') is-invalid @enderror"
                                name="session_description">{!! $sequence->description !!}</textarea>
                            @error('session_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="col-md-3 mb-3">
                            <label for="mdate">Release Date <span class="text-danger">( Optional )</span></label>
                            <input type="text" name="release_date" id="mdate" value="{{ $sequence->release_date }}"
                                placeholder="YYYY-MM-DD" class="form-control @error('release_date') is-invalid @enderror">
                            @error('release_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="option">Free/ Premium <span class="text-danger">*</span></label>
                            <select name="option" id="option"
                                class="form-control @error('option') is-invalid @enderror">
                                <option value="0" {{ $sequence->is_premium == 0 ? 'selected' : '' }}>Free</option>
                                <option value="1" {{ $sequence->is_premium == 1 ? 'selected' : '' }}>Premium</option>
                            </select>
                            @error('option')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="downloadable">Downloadable <span class="text-danger">*</span></label>
                            <select name="downloadable" id="downloadable"
                                class="form-control @error('downloadable') is-invalid @enderror">
                                <option value="0" {{ $sequence->is_downloadable == 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ $sequence->is_downloadable == 1 ? 'selected' : '' }}>Yes</option>

                            </select>
                            @error('downloadable')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="status">Publish <span class="text-danger">*</span></label>
                            <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option value="1" {{ $sequence->is_publish == 0 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $sequence->is_publish == 1 ? 'selected' : '' }}>No</option>

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
                                Are you want to update the season ?
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
