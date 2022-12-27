@extends('backend.layouts.master')
@section('title', 'Episodes List')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col d-flex align-items-center justify-content-between">
                        <div class="">
                            <h4 class="page-title">Episodes List ({{ $chapters->count() }})</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Episodes</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div>
                        <a href="{{ route('admin.content.sequence.list', lock($sequences->contents->id)) }}" class="btn btn-primary"><i class="las la-angle-left"></i> Back</a>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center justify-content-between">
                    Episodes List Table ( {{ $sequences->title }} )
                    <div class="d-flex align-items-center">
                        @if($chapters->count() > 0)
                            @if(optional($chapters->first()->contents)->records->count() > 0)
                                <a href="{{ route('admin.content.sequence.chapter.create', lock($sequences->id)) }}" class="btn btn-primary mr-2"><i class="las la-plus"></i> Move Videos</a>
                            @endif
                        @endif
                        <a href="{{ route('admin.content.sequence.chapter.create', lock($sequences->id)) }}" class="btn btn-primary"><i class="las la-plus"></i> Add New Episode</a>
                    </div>
                </h4>
            </div><!--end card-header-->

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Icon</th>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Order</th>
                            <th>Videos</th>
                            <th>Free</th>
                            <th>Download</th>
                            <th>Published</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($chapters as $key=>$chapter)
                            <tr>
                                <td>{{ $chapters->perPage() * ($chapters->currentPage() - 1) + ++$key }}</td>
                                <td><a href="{{ $chapter->getFirstMediaUrl('chapter_thumbnail') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $chapter->getFirstMediaUrl('chapter_thumbnail') }}" alt=""></a></td>
                                <td><a href="{{ $chapter->getFirstMediaUrl('chapter_cover_photo') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $chapter->getFirstMediaUrl('chapter_cover_photo') }}" alt=""></a></td>
                                <td>{{ $chapter->title }}</td>
                                <td>{{ $chapter->order }}</td>
                                <td>{{ $chapter->records_count }}</td>
                                <td><span class="badge badge-soft-{{ $chapter->is_premium == 1 ? 'danger' : 'primary' }}">{{ $chapter->is_premium == 1 ? 'No' : 'Yes' }}</span></td>
                                <td><span class="badge badge-soft-{{ $chapter->is_downloadable == 1 ? 'primary' : 'danger' }}">{{ $chapter->is_downloadable == 1 ? 'Yes' : 'No' }}</span></td>
                                <td><span class="badge badge-soft-{{ $chapter->is_publish == 1 ? 'primary' : 'danger' }}">{{ $chapter->is_publish == 1 ? 'Yes' : 'No' }}</span></td>
                                <td class="text-right">
                                    <div class="dropdown d-inline-block">
                                        <a class="dropdown-toggle arrow-none" id="dLabel11" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                            <i class="las la-ellipsis-v font-20 text-muted"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                                            <a class="dropdown-item" href=""><i class="las la-eye text-success font-18"></i> View</a>
                                            <a class="dropdown-item" href=""><i class="las la-pen text-info font-18"></i> Edit</a>
                                            <a class="dropdown-item" href=""><i class="las la-trash-alt text-danger font-18"></i> Delete</a>
                                            <a class="dropdown-item" href="{{ route('admin.content.sequence.episode.videos', lock($chapter->id)) }}"><i class="las la-folder-plus text-primary font-18"></i> Manage Video</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                            </tr>
                        @endforelse
                        </tbody>
                    </table><!--end /table-->

                    <div class="mt-2">
                        {{ $chapters->links() }}
                    </div>
                </div><!--end /tableresponsive-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!-- end col -->
@endsection
