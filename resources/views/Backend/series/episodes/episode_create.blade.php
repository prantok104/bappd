@extends('backend.layouts.master')
@section('title', 'Episodes Management')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Episodes Management - Add New</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Episodes</a></li>
                            <li class="breadcrumb-item active">Episodes Management</li>
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
                    <h4 class="card-title d-flex align-center-center justify-content-between">Add New episode <a href="{{ route('admin.episode.list', lock($season_id)) }}" class="btn btn-primary"> <i class="las la-arrow-left"></i> Back</a></h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.episode.store', lock($season_id)) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="episode_name">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('episode_name') is-invalid @enderror"  name="episode_name" id="episode_name" value="{{ old('episode_name') }}">
                                @error('episode_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="order">Order <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('order') is-invalid @enderror" value="{{ $order + 1 }}"  name="order" id="order">
                                @error('order')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="content_type">Content Type <span class="text-danger">*</span></label>
                                <select id="content_type" name="content_type" class="form-control">
                                    <option>Select Content Type</option>
                                    @foreach($content_type as $key => $value)
                                          <option value="{{ $value->id }}" {{ (old('content_type') == $value->id) ? 'selected' : '' }}>{{ $value->content_types_name }}</option>
                                    @endforeach
                                </select>
                                @error('order')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            

                            <div class="col-md-4 mb-3">
                                <label for="content">Content <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('content') is-invalid @enderror"  name="content" id="content" value="{{ old('content') }}">
                                @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            

                            <div class="col-md-4 mb-3">
                                <label for="duration">Duration </label>
                                <input type="text" class="form-control @error('duration') is-invalid @enderror"  name="duration" id="duration" value="{{ old('duration') }}" placeholder="Ex:  02:30:10 Sec">
                                
                            </div>


                            <div class="col-md-5 mb-3">
                                <label for="episode_thumbnail">Episode thumbnail <span class="text-danger">(Portrait, jpg, jpeg, png) (max: 512kb)*</span></label>
                                <input type="file" id="episode_thumbnail" name="episode_thumbnail" class="dropify form-control" />
                                @error('episode_thumbnail')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-7 mb-3">
                                <label for="episode_cover_photo">Episode cover photo <span class="text-danger">(Landscape, jpg, jpeg, png) (max: 1Mb)*</span></label>
                                <input type="file" id="episode_cover_photo" name="episode_cover_photo" class="dropify form-control" />
                                @error('episode_cover_photo')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="episode_description">Episode description</label>
                                <textarea id="episode_description" class="editor-enable @error('episode_description') is-invalid @enderror" name="episode_description">{{ old('episode_description') }}</textarea>
                                @error('episode_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                             <div class="col-md-6 mb-3">
                                <label for="episode_type">Type <span class="text-danger">*</span></label>
                                <select class="form-control" name="episode_type" id="free" >
                                    <option value="0">Free</option>
                                    <option value="1">Premium</option>
                                </select>
                            </div>
                            

                             <div class="col-md-6 mb-3">
                                <label for="downloadable">Downloadable <span class="text-danger">*</span></label>
                                <select class="form-control" name="downloadable" id="free" >
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            
                             <div class="col-md-12 mb-3">
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
    </div>
@endsection
