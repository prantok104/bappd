@extends('backend.layouts.master')
@section('title', 'Episode Create')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Episode - Add New</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Episode</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->

    {{--Form area start--}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center justify-content-between">Add New Episode ({{ $sequence->title }}) <a href="{{ route('admin.content.sequence.chapter.list', lock($sequence->id)) }}" class="btn btn-primary"><i class="las la-eye"></i> Seasons List</a></h4>
            </div><!--end card-header-->
            <div class="card-body">
                <form method="POST" action="{{ route('admin.content.sequence.chapter.store', lock($sequence->id)) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"  name="title" id="title">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="order">Order <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('order') is-invalid @enderror" value="{{ $order + 1 }}"  name="order" id="order">
                            @error('order')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="trailer">Trailer <span class="text-danger">( Optional )</span></label>
                            <input type="text" name="trailer" id="trailer" placeholder="URL" class="form-control @error('trailer') is-invalid @enderror">
                            @error('trailer')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="col-md-4 mb-3">
                            <label for="chapter_thumbnail">chapter thumbnail <span class="text-danger">(jpg, jpeg, png) (max: 1Mb)*</span></label>
                            <input type="file" id="chapter_thumbnail" name="chapter_thumbnail" class="dropify form-control" />
                            @error('chapter_thumbnail')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="chapter_cover_photo">chapter cover photo <span class="text-danger">(jpg, jpeg, png) (max: 2Mb)*</span></label>
                            <input type="file" id="chapter_cover_photo" name="chapter_cover_photo" class="dropify form-control" />
                            @error('chapter_cover_photo')
                            <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        <div class="col-md-12 mb-3">
                            <label for="chapter_description">chapter description <span class="text-danger">*</span></label>
                            <textarea id="chapter_description" class="editor-enable @error('chapter_description') is-invalid @enderror" name="chapter_description">{{ old('chapter_description') }}</textarea>
                            @error('chapter_description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="col-md-3 mb-3">
                            <label for="mdate">Release Date <span class="text-danger">( Optional )</span></label>
                            <input type="text" name="release_date" id="mdate" value="{{ old('release_date') }}" placeholder="YYYY-MM-DD" class="form-control @error('release_date') is-invalid @enderror">
                            @error('release_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="option">Free/ Premium <span class="text-danger">*</span></label>
                            <select name="option" id="option" class="form-control @error('option') is-invalid @enderror">
                                <option value="0">Free</option>
                                <option value="1">Premium</option>
                            </select>
                            @error('option')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="downloadable">Downloadable <span class="text-danger">*</span></label>
                            <select name="downloadable" id="downloadable" class="form-control @error('downloadable') is-invalid @enderror">
                                <option value="0">No</option>
                                <option value="1">Yes</option>

                            </select>
                            @error('downloadable')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="status">Publish <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="1">Yes</option>
                                <option value="0">No</option>

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
                            <input class="form-check-input @error('ensure') is-invalid @enderror" name="ensure" type="checkbox" value="1" id="invalidCheck3">
                            <label class="form-check-label" for="invalidCheck3">
                                Are you want to create a new episode ?
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
    {{--Form area end--}}
@endsection
