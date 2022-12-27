
@extends('backend.layouts.master')
@section('title', 'Channel Video View')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="channel-cover-image" style="background-image: url('{{ $video->getFirstMediaUrl('video_cover_photo') }}'); background-repeat: no-repeat; background-position: center center; background-size: cover; width:100%; height:260px" >
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mt-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Video Info</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <a style="width: 100%; display: block" href="{{ $video->getFirstMediaUrl('video_thumbnail') }}" class="image-popup-vertical-fit"><img src="{{ $video->getFirstMediaUrl('video_thumbnail') }}" alt="" width="340px" height="auto"></a>

                    <h4 class="my-2 font-weight-bold">{{ $video->title }} </h4>
                    <p class="badge badge-success mb-2 font-13">ID: {{ $video->generic_id }}</p>

                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <b class="">Create at</b>
                        <b class="">Update at</b>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <b class="badge badge-primary">{{ \Carbon\Carbon::parse($video->created_at)->format('d M, Y h:i:s:a') }}</b>
                        <b class="badge badge-danger">{{ \Carbon\Carbon::parse($video->updated_at)->format('d M, Y h:i:s:a') }}</b>
                    </div>
                </div><!--end card-body-->
            </div>
            <div class="card mt-2">
                <div class="card-header">
                    <h4 class="card-title">Broadcast Description</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    {!! $video->description !!}
                </div><!--end card-body-->
            </div>
        </div>

        <div class="col-md-9 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        @if(optional($video->content_types)->content_types_name)
                            <span class="badge badge-primary">{{ optional($video->content_types)->content_types_name }} :</span>
                            <span class="p-2">
                                @if($video->content_type == 1)
                                    https://iframe.videodelivery.net/{{ $video->content }}?autoplay=1&rel=0&showinfo=0&autohide=1
                                @elseif($video->content_type == 2)
                                    https://www.youtube.com/embed/{{ $video->content }}
                                @else
                                    {{ $video->content }}
                                @endif
                            </span>
                        @endif

                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="las la-arrow-left"></i> Back</a>
                </div>
            </div>

            <div class="card">
                @if($video->content_type == 1)
                    <iframe src="https://iframe.videodelivery.net/{{ $video->content }}?autoplay=1&rel=0&showinfo=0&autohide=1" frameborder="0" width="100%" height="450px"></iframe>
                @elseif($video->content_type == 2)
                    <iframe src="https://www.youtube.com/embed/{{ $video->content }}?autoplay=1" frameborder="0" width="100%" height="450px"></iframe>
                @elseif($video->content_type > 2)
                    <iframe src="{{ $video->content }}?autoplay=1" frameborder="0" width="100%" height="450px"></iframe>
                @else
                    <span class="badge badge-danger">No broadcast content found right now ): ):</span>
                @endif

            </div>
        </div>
    </div>
@endsection

