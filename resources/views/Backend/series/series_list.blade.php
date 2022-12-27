@extends('backend.layouts.master')
@section('title', 'Series Management')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Series List - ( {{ $series->count() }} Results)</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Series</a></li>
                            <li class="breadcrumb-item active">Series List</li>
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
                    <h4 class="card-title">Series Table </h4>
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
                                    <th>Genres</th>
                                    <th>Category</th>
                                    <th>Seasons</th>
                                    <th>Option</th>
                                    <th>Status</th>
                                    <th>Downloadable</th>
                                    <th>Release date</th>
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
                                        <td>
                                          @foreach(optional($serie)->genres as $key => $genre)
                                                <span class="badge badge-soft-primary"> {{ $genre->name}} </span>
                                          @endforeach
                                        </td>
                                        <td>{{ optional($serie->seriesCategories)->name }}</td>
                                        <td>{{ optional($serie)->seasons_count }}</td>
                                        <td>
                                            @if(($serie->is_downloadable == 1))
                                                <span class="badge badge-primary">Free</span> </span>
                                            @else
                                                <span class="badge badge-success">Premium </span>
                                            @endif

                                        </td>
                                        <td>
                                            @if(($serie->is_published == 1))
                                                <span class="badge badge-primary">Published</span> </span>
                                            @else
                                                <span class="badge badge-danger">Unpublished </span>
                                            @endif

                                        </td>
                                        <td>
                                            @if(($serie->is_downloadable == 1))
                                                <span class="badge badge-primary">Yes</span> </span>
                                            @else
                                                <span class="badge badge-danger">No </span>
                                            @endif

                                        </td>
                                        <td>
                                            {{ $serie->release_date }}
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle arrow-none" id="dLabel11" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                <i class="las la-ellipsis-v font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                                                <a class="dropdown-item" href="{{ route('admin.video.series.show', ['id' => lock($serie->id)]) }}"><i class="las la-eye text-success font-18"></i> View</a>
                                                <a class="dropdown-item" href="{{ route('admin.video.series.edit', lock($serie->id)) }}"><i class="las la-pen text-info font-18"></i> Edit</a>
                                                <a class="dropdown-item" href="#"><i class="las la-trash-alt text-danger font-18"></i> Delete</a>
                                                <a class="dropdown-item" href="{{ route('admin.video.series.seasons.list', lock($serie->id)) }}"><i class="las la-folder-plus text-primary font-18"></i> Manage Season</a>
                                                </div>
                                          </div>
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
