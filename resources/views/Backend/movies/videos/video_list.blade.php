@extends('backend.layouts.master')
@section('title', 'Videos Management')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="page-title">Videos List - ( {{ $videos->count() }} Results )</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Videos</a></li>
                                <li class="breadcrumb-item active">Videos List</li>
                            </ol>
                        </div>

                        <div>
                            <a href="{{ route('admin.movies.list') }} " class="btn btn-primary"><i class="las la-arrow-left"></i> Back to List</a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h3 class="card-title"> {{ $movie->title }} </h3>
                    <a class="btn btn-primary" href="{{ route('admin.movie.videos.add', lock($movie->id)) }}"><i class="las la-plus"></i> New Video</a>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">

                        @if($videos->count() > 0)
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thumbnail</th>
                                    <th>Cover</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Content Type</th>
                                    <th>Content</th>
                                    <th>Release date</th>
                                    <th>Free</th>
                                    <th>Downloadable</th>
                                    <th>Published</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $videos as $key=>$video )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><a href="{{ $video->getFirstMediaUrl('movie_video_thumbnail') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $video->getFirstMediaUrl('movie_video_thumbnail') }}" alt=""></a></td>
                                        <td><a href="{{ $video->getFirstMediaUrl('movie_video_cover_photo') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $video->getFirstMediaUrl('movie_video_cover_photo') }}" alt=""></a></td>
                                        <td>{{ $video->title }}</td>
                                        <td>{{ optional($video->moviesCategories)->name }}</td>
                                        <td>{{ optional($video->content_types)->content_types_name }}</td>
                                        <td>{{ $video->content }}</td>
                                        <td>
                                            {{ $video->release_date }}
                                        </td>
                                        <td>
                                            @if(($video->is_premium == 0))
                                                <span class="badge badge-primary">Yes</span> </span>
                                            @else
                                                <span class="badge badge-danger">No </span>
                                            @endif

                                        </td>
                                        <td>
                                            @if(($video->is_downloadable == 1))
                                                <span class="badge badge-primary">Yes</span> </span>
                                            @else
                                                <span class="badge badge-danger">No </span>
                                            @endif

                                        </td>
                                        <td>
                                            @if(($video->is_published == 1))
                                                <span class="badge badge-primary">Yes</span> </span>
                                            @else
                                                <span class="badge badge-danger">No </span>
                                            @endif

                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle arrow-none" id="dLabel11" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                    <i class="las la-ellipsis-v font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                                                    <a class="dropdown-item" href=""><i class="las la-eye text-success font-18"></i> View</a>
                                                    <a class="dropdown-item" href=""><i class="las la-pen text-info font-18"></i> Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="las la-trash-alt text-danger font-18"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table><!--end /table-->

                            <div class="mt-2">
                                {{ $videos->links() }}
                            </div>
                        @else
                            <span class="badge badge-soft-danger p-3">Have no video found right now ):):</span>
                        @endif

                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div>
@endsection
@push('script')
@endpush
