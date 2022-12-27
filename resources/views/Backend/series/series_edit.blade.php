@extends('backend.layouts.master')
@section('title', 'Series Management')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Series Management - Edit</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Series</a></li>
                            <li class="breadcrumb-item active">Series Edit</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->


    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Series Edit</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.video.series.update', lock($series_find->id)) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="series_name">Series name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('series_name') is-invalid @enderror" value="{{ $series_find->title }}"  name="series_name" id="series_name">
                                @error('series_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="series_category">Series Category <span class="text-danger">*</span></label>
                                <select name="series_category" id="series_category" class="form-control @error('series_category') is-invalid @enderror">
                                    <option value="">Select the category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" data-category_type="{{ $category->is_series }}" {{ ($series_find->category_id == $category->id ) ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('series_category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="series_thumbnail">Series thumbnail <span class="text-danger">(Portrait, jpg, jpeg, png) (max: 512kb)*</span></label>
                                <input type="file" id="series_thumbnail" name="series_thumbnail" data-default-file="{{ $series_find->getFirstMediaUrl('series_thumbnail') }}" class="dropify form-control" />
                                @error('series_thumbnail')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="series_cover_photo">Series cover photo <span class="text-danger">(Landscape, jpg, jpeg, png) (max: 1Mb)*</span></label>
                                <input type="file" id="series_cover_photo" name="series_cover_photo" data-default-file="{{ $series_find->getFirstMediaUrl('series_cover_photo') }}" class="dropify form-control" />
                                @error('series_cover_photo')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="series_description">Series description</label>
                                <textarea id="series_description" class="editor-enable @error('series_description') is-invalid @enderror" name="series_description">{{ $series_find->description }}</textarea>
                                @error('series_description')
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
                                    Are you want to update the series ?
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
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Series Table</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">

                        @if($series->count() > 0)
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thumbnail</th>
                                    <th>Cover</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Category</th>
                                    <th>Series</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $series as $key=>$serie )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><a href="{{ $serie->getFirstMediaUrl('series_thumbnail') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $serie->getFirstMediaUrl('series_thumbnail') }}" alt=""></a></td>
                                        <td><a href="{{ $serie->getFirstMediaUrl('series_cover_photo') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $serie->getFirstMediaUrl('series_cover_photo') }}" alt=""></a></td>
                                        <td>{{ $serie->title}}</td>
                                        <td>{{ $serie->slug_en }}</td>
                                        <td>{{ optional($serie->categories)->name }}</td>
                                        <td>
                                            <span>{!! count(optional($serie)->videos) !!}  </span>
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.video.series.show', ['id' => lock($serie->id)]) }}"><i class="las la-eye text-success font-18"></i></a>
                                            <a href="{{ route('admin.video.series.edit', lock($serie->id)) }}"><i class="las la-pen text-info font-18"></i></a>
                                            <a href=""><i class="las la-trash-alt text-danger font-18"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table><!--end /table-->

                            <div class="mt-2">
                                {{ $series->links() }}
                            </div>
                        @else
                            <span class="badge badge-soft-danger p-3">Have no series found right now ):):</span>
                        @endif

                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div>
@endsection
