@extends('backend.layouts.master')
@section('title', 'Movie Category Management')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Movie Category Management - Add New</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                            <li class="breadcrumb-item active">Movie Category Management</li>
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
                    <h4 class="card-title">Add New category</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.movie.category.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="category_name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror"  name="category_name" id="category_name">
                                @error('category_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="category_description">Description</label>
                                <input type="text" class="form-control @error('category_description') is-invalid @enderror"  name="category_description" id="category_description">
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="category_thumbnail">Category thumbnail <span class="text-danger">(Portrait, jpg, jpeg, png) (max: 512kb)*</span></label>
                                <input type="file" id="category_thumbnail" name="category_thumbnail" class="dropify form-control" />
                                @error('category_thumbnail')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="category_cover_photo">Category cover photo <span class="text-danger">(Landscape, jpg, jpeg, png) (max: 1Mb)*</span></label>
                                <input type="file" id="category_cover_photo" name="category_cover_photo" class="dropify form-control" />
                                @error('category_cover_photo')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>



                            <div class="form-group">
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
                                    Are you want to create a new category ?
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
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Categories Table</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">

                        @if($categories->count() > 0)
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Cover</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $categories as $key=>$category )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><a href="{{ $category->getFirstMediaUrl('movie_category_thumbnail') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $category->getFirstMediaUrl('movie_category_thumbnail') }}" alt=""></a></td>
                                        <td><a href="{{ $category->getFirstMediaUrl('movie_category_cover_photo') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $category->getFirstMediaUrl('movie_category_cover_photo') }}" alt=""></a></td>
                                        <td>{{ $category->name}}</td>
                                        <td>{{ $category->description}}</td>
                                        <td>
                                            {{ ($category->is_published == 1) ? "published" : "Unpublished" }}
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.series.category.edit', lock($category->id)) }}"><i class="las la-pen text-info font-18"></i></a>
                                            <a href=""><i class="las la-trash-alt text-danger font-18"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table><!--end /table-->
                        @else
                            <span class="badge badge-soft-danger p-3">Have no category found right now ):):</span>
                        @endif

                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div>
@endsection
