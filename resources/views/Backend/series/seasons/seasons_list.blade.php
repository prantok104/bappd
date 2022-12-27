@extends('backend.layouts.master')
@section('title', 'Seasons Management')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col d-flex justify-content-between align-items-center">
                       <div>
                              <h4 class="page-title">Seasons List - ( {{ $season->count() }} Results )</h4>
                              <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                              <li class="breadcrumb-item"><a href="javascript:void(0);">Seasons</a></li>
                              <li class="breadcrumb-item active">Seasons List</li>
                              </ol>
                       </div>

                       <div>
                       <a href="{{ route('admin.series.list') }} " class="btn btn-primary"><i class="las la-arrow-left"></i> Back List</a>
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
                    <h3 class="card-title"> {{ $series->title }} </h3>
                    <a class="btn btn-primary" href="{{ route('admin.video.series.seasons.create', lock($series->id)) }}"><i class="las la-plus"></i> New Season</a>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">

                        @if($season->count() > 0)
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thumbnail</th>
                                    <th>Cover</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>order</th>
                                    <th>Status</th>
                                    <th>Episodes</th>
                                    <th>Release date</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $season as $key=>$serie )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><a href="{{ $serie->getFirstMediaUrl('season_thumbnail') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $serie->getFirstMediaUrl('season_thumbnail') }}" alt=""></a></td>
                                        <td><a href="{{ $serie->getFirstMediaUrl('season_cover_photo') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $serie->getFirstMediaUrl('season_cover_photo') }}" alt=""></a></td>
                                        <td>{{ $serie->name}}</td>
                                        <td>
                                          {!! $serie->description !!}
                                        </td>
                                        <td>{{ $serie->order_number }} </td>
                                        <td>
                                            @if(($serie->is_published == 1))
                                                <span class="badge badge-primary">Published</span> </span>
                                            @else
                                                <span class="badge badge-danger">Unpublished </span>
                                            @endif

                                        </td>
                                        <td>
                                            {{ optional($serie)->episodes_count }}
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
                                                <a class="dropdown-item" href=""><i class="las la-eye text-success font-18"></i> View</a>
                                                <a class="dropdown-item" href=""><i class="las la-pen text-info font-18"></i> Edit</a>
                                                <a class="dropdown-item" href="#"><i class="las la-trash-alt text-danger font-18"></i> Delete</a>
                                                <a class="dropdown-item" href="{{ route('admin.episode.list', lock($serie->id)) }}"><i class="las la-folder-plus text-primary font-18"></i> Manage Episode</a>
                                                </div>
                                          </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table><!--end /table-->

                           <div class="mt-2">
                               {{ $season->links() }}
                           </div>
                        @else
                            <span class="badge badge-soft-danger p-3">Have no season found right now ):):</span>
                        @endif

                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div>
@endsection
@push('script')
@endpush
