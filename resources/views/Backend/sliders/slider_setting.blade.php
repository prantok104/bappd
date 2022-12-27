@extends('backend.layouts.master')
@section('title', 'Sliders Management')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Sliders Management</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Sliders</a></li>
                            <li class="breadcrumb-item active">Sliders Management</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->


    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Slider settings</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.slider.setting.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <label for="slider_type">Slider Type <span class="text-danger">*</span></label>
                                        <select name="slider_type" id="slider_type" class="form-control @error('slider_type') is-invalid @enderror">
                                            <option value="custom" {{ ('custom' == $settings[0]->slider_type) ? 'selected' : '' }}>Custom Slider</option>
                                            <option value="most_views" {{ ('most_views' == $settings[0]->slider_type) ? 'selected' : '' }}>Most Views Slider</option>
                                            <option value="trending" {{ ('trending' == $settings[0]->slider_type) ? 'selected' : '' }}>Trending Slider</option>
                                        </select>
                                        @error('slider_type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="slider_count">Items <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('slider_count') is-invalid @enderror"  name="slider_count" id="slider_count" value="{{ $settings[0]->slider_count }}">
                                        @error('slider_count')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                </div>

                        </div>
                        <button class="btn btn-primary" type="submit">Slider Setup</button>
                    </form>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Slider Setting</h4>
                </div>
                <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0 table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Items</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($settings as $key=>$setting)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $setting->slider_type }}</td>
                                        <td>{{ $setting->slider_count }}</td>
                                        <td class="text-right"><a href="{{ route('admin.slider.setting.active', $setting->id) }}" class="btn btn-sm btn-{{ $setting->status == 1 ? 'primary' : 'danger' }}">{{ $setting->status == 1 ? 'Active' : 'Deactive' }}</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
