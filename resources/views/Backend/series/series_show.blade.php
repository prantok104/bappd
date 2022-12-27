@extends('backend.layouts.master')
@section('title', 'Series View')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="channel-cover-image" style="background-image: url('{{ $series->getFirstMediaUrl('series_cover_photo') }}'); background-repeat: no-repeat; background-position: center center; background-size: cover; width:100%; height:260px" >
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mt-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Series Info</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <a style="width: 100%; display: block" href="{{ $series->getFirstMediaUrl('series_thumbnail') }}" class="image-popup-vertical-fit"><img src="{{ $series->getFirstMediaUrl('series_thumbnail') }}" alt="" width="340px" height="auto"></a>

                    <h4 class="my-2 font-weight-bold">{{ $series->title }} </h4>

                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <b class="">Create at</b>
                        <b class="">Update at</b>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <b class="badge badge-primary">{{ \Carbon\Carbon::parse($series->created_at)->format('d M, Y h:i:s:a') }}</b>
                        <b class="badge badge-danger">{{ \Carbon\Carbon::parse($series->updated_at)->format('d M, Y h:i:s:a') }}</b>
                    </div>
                </div><!--end card-body-->
            </div>
            <div class="card mt-2">
                <div class="card-header">
                    <h4 class="card-title">Broadcast Description</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    {!! $series->description !!}
                </div><!--end card-body-->
            </div>
        </div>

        <div class="col-md-9 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        All series table
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="las la-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="card-body">
                <table>
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>Cover</th>
                            <th>Video ID</th>
                            <th>Video Title</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Content Type</th>
                            <th>Content</th>
                            <th>Active</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($series_number as $key=>$video)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td><a href="{{ $video->getFirstMediaUrl('video_thumbnail') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $video->getFirstMediaUrl('video_thumbnail') }}" alt=""></a></td>
                                <td><a href="{{ $video->getFirstMediaUrl('video_cover_photo') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $video->getFirstMediaUrl('video_cover_photo') }}" alt=""></a></td>
                                <td> <span class="badge badge-soft-primary">{{ $video->generic_id }}</span> </td>
                                <td> <span>{{ $video->title }}</span> </td>
                                <td> <span class="badge badge-soft-success">{{ optional($video->categories)->name }}</span> </td>
                                <td> <span>{{ (optional($video->categories)->is_series == 1) ? 'Series' : 'General' }}</span> </td>
                                <td> <span class="badge badge-soft-danger">{{ (optional($video->content_types)->content_types_name) }}</span> </td>
                                <td> <span>{{ $video->content }}</span> </td>
                                <td> <span>{{ ($video->is_active == 1) ? 'Active' : 'Inactive' }}</span> </td>
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
                        {{ $series_number->links() }}
                    </div>
                </table>
            </div>

        </div>
    </div>
@endsection

