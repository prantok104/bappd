@extends('backend.layouts.master')
@section('title', $sequence->title)
@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <div style="position:  relative">
                <div style="position: absolute; left: 5px; bottom: 5px" class="p-2 bg-white">
                    <img src="{{ $sequence->getFirstMediaUrl('session_thumbnail') }}" alt="{{ $sequence->title }}"
                        width="150" height="150" style="object-fit: cover; object-position: top"> <br>
                    <span class="p-1 bg-white">{{ $sequence->unq_id }}</span>
                </div>
                <img src="{{ $sequence->getFirstMediaUrl('session_cover_photo') }}" alt="{{ $sequence->title }}"
                    width="100%" height="280" style="object-fit: cover; object-position: top">
            </div>
            <div class="alert alert-primary d-flex align-items-center justify-content-between">
                <div>
                    <span class="badge badge-primary mr-1">Release Date:
                        {{ $sequence->release_date }}</span>

                    <span class="badge badge-primary mr-1">Order:
                        {{ $sequence->order }}</span>

                    <span class="badge badge-{{ $sequence->is_premium == 1 ? 'primary' : 'danger' }} mr-1">Premium:
                        {{ $sequence->is_premium == 1 ? 'Yes' : 'No' }}</span>

                    <span
                        class="badge badge-{{ $sequence->is_downloadable == 1 ? 'primary' : 'danger' }} mr-1">Downloadable:
                        {{ $sequence->is_downloadable == 1 ? 'Yes' : 'No' }}</span>

                    <span class="badge badge-{{ $sequence->is_publish == 1 ? 'primary' : 'danger' }} mr-1">Published:
                        {{ $sequence->is_publish == 1 ? 'Yes' : 'No' }}</span>

                    <span class="badge badge-{{ $sequence->is_feature == 1 ? 'primary' : 'danger' }} mr-1">Featured:
                        {{ $sequence->is_feature == 1 ? 'Yes' : 'No' }}</span>

                    <span class="badge badge-primary mr-1">Episodes:
                        {{ $sequence->records_count }}</span>

                </div>

                @if ($sequence->trailer != null || $sequence->trailer != '')
                    <a class="btn btn-primary btn-sm popup-youtube" href="{{ $sequence->trailer }}"><i
                            class="las la-play"></i> Trailer</a>
                @endif
            </div>

            <div class="mt-2">
                <h5 class="mb-2">{{ $sequence->title }} </h5>
                {!! $sequence->description !!}
            </div>
            <!--end /tableresponsive-->
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
@endsection
