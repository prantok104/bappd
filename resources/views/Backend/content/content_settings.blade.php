@extends('backend.layouts.master')
@section('title', 'Trending Management')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Trending Management</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Trending</a></li>
                            <li class="breadcrumb-item active">Trending Management</li>
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
                    <h4 class="card-title">Trending settings</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    @if ($content->count() > 0)
                    <form method="POST" action="{{ route('admin.content.create.update.settings') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <label for="trending_type">Trending Type <span class="text-danger">*</span></label>
                                    <select name="trending_type" id="trending_type" class="form-control @error('trending_type') is-invalid @enderror">
                                        <option value="content_trending" {{ ('content_trending' == $content[0]->title) ? 'selected' : '' }}>Content Trending</option>
                                        <option value="video_trending" {{ ('video_trending' == $content[0]->title) ? 'selected' : '' }}>Video Trending</option>
                                    </select>
                                    @error('trending_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="times">Times <span class="text-danger">*</span></label>
                                    <select name="times" id="times" class="form-control @error('times') is-invalid @enderror">
                                        <option value="1" {{ ('1' == optional($content[0])->times) ? 'selected' : '' }}>Last Week</option>
                                        <option value="2" {{ ('2' == $content[0]->times) ? 'selected' : '' }}>Last 15 days</option>
                                        <option value="4" {{ ('4' == $content[0]->times) ? 'selected' : '' }}>Last Month</option>
                                        <option value="13" {{ ('13' == $content[0]->times) ? 'selected' : '' }}>Last 3 Months</option>
                                        <option value="17" {{ ('26' == $content[0]->times) ? 'selected' : '' }}>Last 6 Months</option>
                                    </select>
                                    @error('times')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="col-md-12 mb-3">
                                    <label for="items">Items <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('items') is-invalid @enderror"  name="items" id="items" value="{{ $content[0]->items }}">
                                    @error('items')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <button class="btn btn-primary" type="submit">Trending Setup</button>
                    </form>
                    @endif
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Setting</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Times</th>
                                <th>Items</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($content as $key=>$con)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $con->title }}</td>
                                        <td>
                                            @if($con->times == 1)
                                                <span class="badge badge-soft-primary">Last Week</span>
                                            @elseif($con->times == 2)
                                                <span class="badge badge-soft-primary">Last 15 days</span>
                                            @elseif($con->times == 4)
                                                <span class="badge badge-soft-primary">Last Month</span>
                                            @elseif($con->times == 13)
                                                <span class="badge badge-soft-primary">Last 3 Months</span>
                                            @else
                                                <span class="badge badge-soft-primary">Last 6 Months</span>
                                            @endif

                                        </td>
                                        <td><span class="badge badge-soft-success">{{ $con->items }} Items</span></td>
                                        <td class="text-right"><button class="btn btn-xs btn-primary">Active</button></td>
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
