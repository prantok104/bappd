@extends('backend.layouts.master')
@section('title', 'Videos List')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Videos List ({{ $videos_list->count() }})</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Videos</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center justify-content-between">Videos List Table <a href="{{ route('admin.video.index') }}" class="btn btn-primary"><i class="las la-plus"></i> Add New video</a></h4>
            </div><!--end card-header-->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>Cover</th>
                            <th>Video ID</th>
                            <th>Video Title</th>
                            <th>Category</th>
                            <th>Content Type</th>
                            <th>Content</th>
                            <th>Premium</th>
                            <th>Downloadable</th>
                            <th>Published</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($videos_list as $key=>$video)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td><a href="{{ $video->getFirstMediaUrl('video_thumbnail') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $video->getFirstMediaUrl('video_thumbnail') }}" alt=""></a></td>
                                <td><a href="{{ $video->getFirstMediaUrl('video_cover_photo') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $video->getFirstMediaUrl('video_cover_photo') }}" alt=""></a></td>
                                <td> <span class="badge badge-soft-primary">{{ $video->generic_id }}</span> </td>
                                <td> <span>{{ $video->title }}</span> </td>
                                <td> <span class="badge badge-soft-success">{{ optional($video->categories)->name }}</span> </td>
                                <td> <span class="badge badge-soft-danger">{{ (optional($video->content_types)->content_types_name) }}</span> </td>
                                <td> <span>{{ $video->content }}</span> </td>
                                <td>
                                    @if(($video->is_premium == 1))
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
                                    <a href="{{ route('admin.video.show', ['id' => lock($video->id)]) }}"><i class="las la-eye text-success font-18"></i></a>
                                    <a href=""><i class="las la-pen text-info font-18"></i></a>
                                    <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                                </td>
                            </tr>
                        @empty
                            <td>
                                <span class="badge badge-soft-danger p-3">Have no video found in our system ):</span>
                            </td>
                        @endforelse

                        </tbody>

                    </table><!--end /table-->
                    <div class="mt-2">
                        {{ $videos_list->links() }}
                    </div>
                </div><!--end /tableresponsive-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!-- end col -->
@endsection
