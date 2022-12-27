@extends('backend.layouts.master')
@section('title', 'Movie Management')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Movie Management - Add New</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Movie</a></li>
                            <li class="breadcrumb-item active">Movie Management</li>
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
                    <h4 class="card-title">Add New movie</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.movies.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="movie_name">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('movie_name') is-invalid @enderror"  name="movie_name" id="movie_name" value="{{ old('movie_name') }}">
                                @error('movie_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="movie_category">Category <span class="text-danger">*</span></label>
                                <select name="movie_category" id="movie_category" class="form-control @error('movie_category') is-invalid @enderror">
                                    <option value="">Select the category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" data-category_type="{{ $category->is_movie }}" {{ (old('movie_category') == $category->id ) ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('movie_category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="genres">Genres <span class="text-danger">*</span></label>
                                <select class="select2 mb-3 select2-multiple @error('genres') is-invalid @enderror" name="genres[]" id="genres"style="width: 100%" multiple="multiple" data-placeholder=" Choose">
                                    @foreach($genres as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                @error('genres')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>



                            <div class="col-md-6 mb-3">
                                <label for="trailer_link">Trailer Link <span class="text-danger">(Optional)</span></label>
                                <input type="text" class="form-control @error('trailer_link') is-invalid @enderror"  name="trailer_link" id="trailer_link" value="{{ old('trailer_link') }}" placeholder="URL">
                                @error('trailer_link')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="col-md-5 mb-3">
                                <label for="movie_thumbnail">Thumbnail <span class="text-danger">(Portrait, jpg, jpeg, png) (max: 512kb)*</span></label>
                                <input type="file" id="movie_thumbnail" name="movie_thumbnail" class="dropify form-control" />
                                @error('movie_thumbnail')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-7 mb-3">
                                <label for="movie_cover_photo">Cover photo <span class="text-danger">(Landscape, jpg, jpeg, png) (max: 1Mb)*</span></label>
                                <input type="file" id="movie_cover_photo" name="movie_cover_photo" class="dropify form-control" />
                                @error('movie_cover_photo')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="movie_description">Description</label>
                                <textarea id="movie_description" class="editor-enable @error('movie_description') is-invalid @enderror" name="movie_description">{{ old('movie_description') }}</textarea>
                                @error('movie_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="mdate">Release date <span class="text-danger">(Optional)</span></label>
                                <input type="text" class="form-control @error('release_date') is-invalid @enderror"  name="release_date" id="mdate" value="{{ old('release_date') }}" placeholder="YYYY-MM-DD" >
                                @error('release_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="free">Free/ Premium <span class="text-danger">*</span></label>
                                <select class="form-control @error('free') is-invalid @enderror" name="free" id="free" >
                                    <option value="0">Free</option>
                                    <option value="1">Premium</option>
                                </select>

                                @error('free')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="custom-control custom-switch switch-downloadable">
                                    <input type="checkbox" class="custom-control-input @error('downloadable') is-invalid @enderror" checked="checked" id="downloadable" value="1" name="downloadable">
                                    <label class="custom-control-label" for="downloadable">Downloadable</label>
                                </div>
                                @error('downloadable')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="custom-control custom-switch switch-publish">
                                    <input type="checkbox" class="custom-control-input @error('publish') is-invalid @enderror" checked="checked" id="publish" value="1" name="publish">
                                    <label class="custom-control-label" for="publish">Publish</label>
                                </div>
                                @error('publish')
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
                                    Are you want to create a new movie ?
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

@push('script')
    <script>
        $(document).ready(function(){
            $("select").on("select2:select", function (evt) {
                var element = evt.params.data.element;
                var $element = $(element);

                $element.detach();
                $(this).append($element);
                $(this).trigger("change");
            });
        });
    </script>
@endpush
