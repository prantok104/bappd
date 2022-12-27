@extends('backend.layouts.master')
@section('title', 'Videos List')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="page-title">Videos ({{ $records->count() }})</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Videos</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->

    <form action="{{ route('admin.slider.item.add') }}" method="POST">
        @csrf
    <div class="col-lg-12">
        @error('record')
        <span class="p-2 bg-danger-gradient text-center d-block text-light"> {{ $message }} </span>
        @enderror
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center justify-content-between">
                    <button type="submit" class="btn btn-xs btn-primary">Add Slider Item</button>
                    <a href="{{ route('admin.slider.item.views') }}" class="btn btn-xs btn-success"><i class="las la-eye"></i> View Slider</a>
                </h4>
            </div><!--end card-header-->
            <div class="card-body">
                <div class="table-responsive">
                    @if($records->count() > 0)
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Categories</th>
                                <th>Genres</th>
                                <th>Free</th>
                                <th>Publish</th>
                                <th>Download</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $key=>$record)
                                <tr>
                                    <td><input type="checkbox" name="record[]" value="{{ $record->id }}"></td>
                                    <td><a href="{{ $record->getFirstMediaUrl('content_thumbnail') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $record->getFirstMediaUrl('content_thumbnail') }}" alt=""></a></td>
                                    <td>{{ $record->title }}</td>
                                    <td>
                                        @foreach(optional($record)->categories as $category)
                                            <span class="badge badge-soft-primary">{{ $category->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @forelse(optional($record)->genres as $genre)
                                            <span class="badge badge-soft-success">{{ $genre->name }}</span>
                                        @empty
                                            <span class="badge badge-soft-danger">Empty</span>
                                        @endforelse
                                    </td>
                                    <td><span class="badge badge-soft-{{ $record->is_premium == 1 ? 'danger' : 'primary' }}">{{ $record->is_premium == 1 ? 'No' : 'Yes' }}</span></td>
                                    <td><span class="badge badge-soft-{{ $record->is_publish == 1 ? 'primary' : 'danger' }}">{{ $record->is_publish == 1 ? 'Yes' : 'No' }}</span></td>
                                    <td><span class="badge badge-soft-{{ $record->is_downloadable == 1 ? 'primary' : 'danger' }}">{{ $record->is_downloadable == 1 ? 'Yes' : 'No' }}</span></td>
                                    <td class="text-right">
                                        <div class="dropdown d-inline-block">
                                            <a class="dropdown-toggle arrow-none" id="dLabel11" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                <i class="las la-ellipsis-v font-20 text-muted"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                                                <a class="dropdown-item" href=""><i class="las la-eye text-success font-18"></i> View</a>
                                                <a class="dropdown-item" href=""><i class="las la-pen text-info font-18"></i> Edit</a>
                                                <a class="dropdown-item" href=""><i class="las la-trash-alt text-danger font-18"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table><!--end /table-->
                    @else
                        <div class="text-center">
                            <span class="alert alert-light">No Videos found</span>
                        </div>
                    @endif
                    <div class="mt-2 ">
                          {{ $records->links() }}
                    </div>
                </div><!--end /tableresponsive-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!-- end col -->
    </form>
@endsection

