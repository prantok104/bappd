@extends('backend.layouts.master')
@section('title', 'Series Management')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Series Management - Add New</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Series</a></li>
                            <li class="breadcrumb-item active">Series Management</li>
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
                    <h4 class="card-title">Add New series</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.video.series.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="series_name">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('series_name') is-invalid @enderror"  name="series_name" id="series_name" value="{{ old('series_name') }}">
                                @error('series_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="series_category">Category <span class="text-danger">*</span></label>
                                <select name="series_category" id="series_category" class="form-control @error('series_category') is-invalid @enderror">
                                    <option value="">Select the category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" data-category_type="{{ $category->is_series }}" {{ (old('series_category') == $category->id ) ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('series_category')
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
                                <label for="series_thumbnail">Series thumbnail <span class="text-danger">(Portrait, jpg, jpeg, png) (max: 512kb)*</span></label>
                                <input type="file" id="series_thumbnail" name="series_thumbnail" class="dropify form-control" />
                                @error('series_thumbnail')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-7 mb-3">
                                <label for="series_cover_photo">Series cover photo <span class="text-danger">(Landscape, jpg, jpeg, png) (max: 1Mb)*</span></label>
                                <input type="file" id="series_cover_photo" name="series_cover_photo" class="dropify form-control" />
                                @error('series_cover_photo')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="series_description">Series description</label>
                                <textarea id="series_description" class="editor-enable @error('series_description') is-invalid @enderror" name="series_description">{{ old('series_description') }}</textarea>
                                @error('series_description')
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
                                <select class="form-control" name="free" id="free" >
                                    <option value="0">Free</option>
                                    <option value="1">Premium</option>
                                </select>
                            </div>

                             <div class="col-md-12 mb-3">
                               <div class="custom-control custom-switch switch-downloadable">
                                    <input type="checkbox" class="custom-control-input" checked="checked" id="downloadable" value="1" name="downloadable">
                                    <label class="custom-control-label" for="downloadable">Downloadable</label>
                               </div>
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
                                    Are you want to create a new series ?
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
