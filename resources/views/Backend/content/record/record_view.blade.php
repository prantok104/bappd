@extends('backend.layouts.master')
@section('title', $record->title)
@section('content')

    @php
        $recordMeta = json_decode($record->meta, true);
    @endphp

    <div class="card mt-3">
        <div class="card-body">
            <div style="position:  relative">
                <div style="position: absolute; left: 5px; bottom: 5px" class="p-2 bg-white">
                    <img src="{{ $record->getFirstMediaUrl('record_thumbnail') }}" alt="{{ $record->title }}" width="150"
                        height="150" style="object-fit: cover; object-position: top"> <br>
                    <span class="p-1 bg-white">{{ $record->unq_id }}</span>
                </div>
                <img src="{{ $record->getFirstMediaUrl('record_cover_photo') }}" alt="{{ $record->title }}" width="100%"
                    height="280" style="object-fit: cover; object-position: top">
            </div>
            <div class="alert alert-primary d-flex align-items-center justify-content-between">
                <div>
                    <span class="badge badge-primary mr-1">Release Date:
                        {{ $record->release_date }}</span>

                    <span class="badge badge-primary mr-1">Order:
                        {{ $record->order }}</span>

                    <span class="badge badge-{{ $record->is_premium == 1 ? 'primary' : 'danger' }} mr-1">Premium:
                        {{ $record->is_premium == 1 ? 'Yes' : 'No' }}</span>

                    <span class="badge badge-{{ $record->is_downloadable == 1 ? 'primary' : 'danger' }} mr-1">Downloadable:
                        {{ $record->is_downloadable == 1 ? 'Yes' : 'No' }}</span>

                    <span class="badge badge-{{ $record->is_publish == 1 ? 'primary' : 'danger' }} mr-1">Published:
                        {{ $record->is_publish == 1 ? 'Yes' : 'No' }}</span>

                    <span class="badge badge-{{ $record->is_feature == 1 ? 'primary' : 'danger' }} mr-1">Featured:
                        {{ $record->is_feature == 1 ? 'Yes' : 'No' }}</span>

                    @if ($record->is_last != 0)
                        <span class="badge badge-primary mr-1">Last Episode</span>
                    @endif
                </div>

                <div>
                    @if ($record->trailer != null || $record->trailer != '')
                        <a class="btn btn-primary btn-sm popup-youtube" href="{{ $record->trailer }}"><i
                                class="las la-play"></i> Trailer</a>
                    @endif

                    <a href="{{ route('admin.content.sequence.videos', lock($record->sequences->id)) }}"
                        class="btn btn-primary btn-sm"><i class="las la-angle-left"></i> Back</a>
                </div>
            </div>

            <div class="mt-2 d-flex ">
                <div class="video-show-area mr-4 order-2" style="width: 50%">
                    <iframe src="https://iframe.videodelivery.net/{{ $record->video_id }}" width="100%" height="250"
                        frameborder="0"></iframe>

                    <p class="d-flex flex-wrap">
                        <span class="badge badge-soft-primary d-inline-block mr-2">Size:
                            {{ $recordMeta['width'] }}x{{ $recordMeta['height'] }}</span>
                        <span class="badge badge-soft-primary d-inline-block mr-2">Filetype:
                            {{ $recordMeta['fileType'] }}</span>
                        <span class="badge badge-soft-primary d-inline-block mr-2">Duration:
                            {{ $recordMeta['duration'] }}</span>
                        <span class="badge badge-soft-primary d-inline-block mr-2">FileSize:
                            {{ $recordMeta['fileSize'] }}</span>

                        <input type="text" value="{{ $recordMeta['id'] }}"
                            style="width: 100%; background: #E3ECFF; border: none" class="p-2 mt-2" readonly>
                    </p>
                </div>

                <div class="video-meta-data order-1" style="width: 50%; min-height: 300px">
                    <h5 class="mb-2">{{ $record->title }}</h5>
                    {!! $record->description !!}
                </div>
            </div>
            <!--end /tableresponsive-->
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
@endsection
