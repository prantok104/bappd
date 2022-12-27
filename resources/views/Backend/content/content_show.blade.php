@extends('backend.layouts.master')
@section('title', $content->title)
@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <div style="position:  relative">
                <div style="position: absolute; left: 5px; bottom: 5px" class="p-2 bg-white">
                    <img src="{{ $content->getFirstMediaUrl('content_thumbnail') }}" alt="{{ $content->title }}" width="150"
                        height="150" style="object-fit: cover; object-position: top"> <br>
                    <span class="p-1 bg-white">{{ $content->unq_id }}</span>
                </div>
                <img src="{{ $content->getFirstMediaUrl('content_cover_photo') }}" alt="{{ $content->title }}"
                    width="100%" height="280" style="object-fit: cover; object-position: top">
            </div>
            <div class="alert alert-primary d-flex align-items-center justify-content-between">
                <div>
                    <span class="badge badge-{{ $content->is_series == 1 ? 'primary' : 'danger' }} mr-1">Series:
                        {{ $content->is_series == 1 ? 'Yes' : 'No' }}</span>

                    <span class="badge badge-{{ $content->is_premium == 1 ? 'primary' : 'danger' }} mr-1">Premium:
                        {{ $content->is_premium == 1 ? 'Yes' : 'No' }}</span>

                    <span class="badge badge-{{ $content->is_downloadable == 1 ? 'primary' : 'danger' }} mr-1">Downloadable:
                        {{ $content->is_downloadable == 1 ? 'Yes' : 'No' }}</span>

                    <span class="badge badge-{{ $content->is_published == 1 ? 'primary' : 'danger' }} mr-1">Published:
                        {{ $content->is_published == 1 ? 'Yes' : 'No' }}</span>

                    <span class="badge badge-{{ $content->is_featured == 1 ? 'primary' : 'danger' }} mr-1">Featured:
                        {{ $content->is_featured == 1 ? 'Yes' : 'No' }}</span>

                    <span class="badge badge-primary mr-1">Views:
                        {{ $content->contentviews_count }}</span>

                </div>

                @if ($content->trailer != null || $content->trailer != '')
                    <a class="btn btn-primary btn-sm popup-youtube" href="{{ $content->trailer }}"><i
                            class="las la-play"></i> Trailer</a>
                @endif
            </div>

            <div class="mt-2">
                <h3>{{ $content->title }}</h3>
                <div class="mt-2">
                    <p class="mb-1"><strong>Categories: </strong>
                        @foreach ($content->categories as $category)
                            <span class="mr-2 text-primary">{{ $category->name }}</span>
                        @endforeach
                    </p>

                    <p><strong>Genres: </strong>
                        @foreach ($content->genres as $genre)
                            <span class="mr-2 text-primary">{{ $genre->name }}</span>
                        @endforeach
                    </p>
                </div>
                {!! $content->description !!}

            </div>
            <!--end /tableresponsive-->
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
@endsection
