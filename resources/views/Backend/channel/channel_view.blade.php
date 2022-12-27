@extends('backend.layouts.master')
@section('title', $channel->name)
@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="channel-cover-image"
                style="background-image: url('{{ $channel->getFirstMediaUrl('channel_cover_photo') }}'); background-repeat: no-repeat; background-position: center center; background-size: cover; width:100%; height:260px">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Channel Info</h4>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <div class="media">
                        <a href="{{ $channel->getFirstMediaUrl('channel_thumbnail') }}"
                            class="image-popup-vertical-fit"><img
                                src="{{ $channel->getFirstMediaUrl('channel_thumbnail') }}" alt=""
                                class="rounded-circle" width="100px" height="100px"></a>
                        <div class="media-body align-self-center ml-3 text-truncate">
                            <h3 class="my-0 font-weight-bold">{{ $channel->name }}</h3>
                            <p class="badge badge-primary mb-2 font-13">{{ $channel->unique_id }}</p>
                        </div>
                        <!--end media-body-->
                    </div>
                </div>
                <!--end card-body-->
            </div>

        </div>
        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-end">
                    <a href="{{ route('admin.channel.index') }}" class="btn btn-primary"><i class="las la-arrow-left"></i>
                        Back</a>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $channel->name }} Assets</h4>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab"
                                aria-selected="true">Basic Information</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane p-3 active" id="home" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Biography </h4>
                                </div>
                                <!--end card-header-->
                                <div class="card-body">
                                    <div class="media">
                                        {{ $channel->bio }}
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Description</h4>
                                </div>
                                <!--end card-header-->
                                <div class="card-body">
                                    <div class="">
                                        {!! $channel->description !!}
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                        </div>
                        <div class="tab-pane p-3" id="profile" role="tabpanel">
                        </div>
                        <div class="tab-pane p-3" id="settings" role="tabpanel">
                        </div>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->



        </div>
    </div>
@endsection
