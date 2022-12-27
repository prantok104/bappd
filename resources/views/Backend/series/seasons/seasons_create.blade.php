@extends('backend.layouts.master')
@section('title', 'season Management')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col d-flex align-items-center justify-content-between">
                        <div>
                              <h4 class="page-title">Season Management - Add New</h4>
                              <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                              <li class="breadcrumb-item"><a href="javascript:void(0);">Season</a></li>
                              <li class="breadcrumb-item active">Season Management</li>
                              </ol>
                        </div>
                         <a href="{{ route('admin.video.series.seasons.list', lock($series->id)) }} " class="btn btn-primary"><i class="las la-arrow-left"></i> Back</a>
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
                    <h4 class="card-title">Add New Season</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.video.series.seasons.store', lock($series->id)) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="season_name">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('season_name') is-invalid @enderror"  name="season_name" id="season_name" value="{{ old('season_name') }}">
                                @error('season_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="order_number">Order <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('order_number') is-invalid @enderror"  name="order_number" id="order_number" value="{{ $season_number + 1 }}" placeholder="Ex: 1">
                                @error('order_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="trailer">Trailer <span class="text-danger">(Optional)</span></label>
                                <input type="text" class="form-control @error('trailer') is-invalid @enderror"  name="trailer" id="trailer" value="{{ old('trailer') }}" placeholder="URL">
                                @error('trailer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="mdate">Release date <span class="text-danger">(Optional)</span></label>
                                <input type="text" class="form-control @error('release_date') is-invalid @enderror"  name="release_date" id="mdate" value="{{ old('release_date') }}" placeholder="YYYY-MM-DD">
                                @error('release_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="col-md-5 mb-3">
                                <label for="season_thumbnail">Season thumbnail <span class="text-danger">(Portrait, jpg, jpeg, png) (max: 512kb)*</span></label>
                                <input type="file" id="season_thumbnail" name="season_thumbnail" class="dropify form-control" />
                                @error('season_thumbnail')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-7 mb-3">
                                <label for="season_cover_photo">Season cover photo <span class="text-danger">(Landscape, jpg, jpeg, png) (max: 1Mb)*</span></label>
                                <input type="file" id="season_cover_photo" name="season_cover_photo" class="dropify form-control" />
                                @error('season_cover_photo')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="season_description">Season description</label>
                                <textarea id="season_description" class="editor-enable @error('season_description') is-invalid @enderror" name="season_description">{{ old('season_description') }}</textarea>
                                @error('season_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                             <div class="col-md-126 mb-3">
                               <div class="custom-control custom-switch switch-publish">
                                    <input type="checkbox" class="custom-control-input" checked="checked" id="publish" value="1" name="publish">
                                    <label class="custom-control-label" for="publish">Publish</label>
                               </div>
                            </div>


                        </div>


                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input @error('ensure') is-invalid @enderror" name="ensure" type="checkbox" value="1" id="invalidCheck3">
                                <label class="form-check-label" for="invalidCheck3">
                                    Are you want to create a new season ?
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
