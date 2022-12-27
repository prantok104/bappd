@extends('backend.layouts.master')
@section('title', 'Live TV\'s List')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Live TV - {{ $tvs->count() }}</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Live TV's</a></li>
                            <li class="breadcrumb-item active">Live TV's List</li>
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
                    <h4 class="card-title">TV Table</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">

                        @if($tvs->count() > 0)
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thumbnail</th>
                                    <th>Cover</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Live link</th>
                                    <th>Type</th>
                                    <th>Featured</th>
                                    <th>Published</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $tvs as $key=>$tv )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><a href="{{ $tv->getFirstMediaUrl('tv_thumbnail') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $tv->getFirstMediaUrl('tv_thumbnail') }}" alt=""></a></td>
                                        <td><a href="{{ $tv->getFirstMediaUrl('tv_cover_photo') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $tv->getFirstMediaUrl('tv_cover_photo') }}" alt=""></a></td>
                                        <td>{{ $tv->name}}</td>
                                        <td>{{ optional($tv->tvcategories)->name }}</td>
                                        <td>
                                            <span>{{ $tv->live_link }}  </span>
                                        </td>
                                        <td>
                                            @if($tv->is_free == 0)
                                                <span class="badge badge-soft-primary">Free</span>
                                            @else
                                                <span class="badge badge-soft-success">Premium</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if($tv->is_featured == 1)
                                                <span class="badge badge-soft-primary">Yes</span>
                                            @else
                                                <span class="badge badge-soft-success">No</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if($tv->is_published == 1)
                                                <span class="badge badge-soft-primary">Yes</span>
                                            @else
                                                <span class="badge badge-soft-success">No</span>
                                            @endif
                                        </td>

                                        <td class="text-right">
                                            <a href=""><i class="las la-eye text-success font-18"></i></a>
                                            <a href=""><i class="las la-pen text-info font-18"></i></a>
                                            <a href=""><i class="las la-trash-alt text-danger font-18"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table><!--end /table-->

                            <div class="mt-2">
                                {{ $tvs->links() }}
                            </div>
                        @else
                            <span class="badge badge-soft-danger p-3">Have no Tv found right now ):):</span>
                        @endif

                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div>
@endsection
