@extends('backend.layouts.master')
@section('title', 'Contents List')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Contents List ({{ $contents->count() }})</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Contents</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- end page title end breadcrumb -->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center justify-content-between">
                    Contents List Table
                    ( Category: {{ request()->get('category') }})
                    <form action="{{ route('admin.contents.index') }}" method="get"
                        class=" d-flex align-items-center mr-2">
                        <select name="category" id="category" class="form-control">
                            <option value="all">Results for All Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->slug_en }}"
                                    {{ request()->get('category') == $category->slug_en ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>

                        <select name="type" id="type" class="form-control ml-2">
                            <option value="all">Select Content Type </option>
                            <option value="single" {{ request()->get('type') == 'single' ? 'selected' : '' }}>Single
                            </option>
                            <option value="playlists" {{ request()->get('type') == 'playlists' ? 'selected' : '' }}>
                                Playlists</option>
                            <option value="series" {{ request()->get('type') == 'series' ? 'selected' : '' }}>Series
                            </option>
                        </select>
                        <button type="submit" class="btn btn-blue ml-2"><i class="las la-filter"></i></button>
                    </form>

                    <a href="{{ route('admin.contents.create') }}" class="btn btn-primary"><i class="las la-plus"></i> Add
                        New Content</a>
                </h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Icon</th>
                                <th>Cover</th>
                                <th>Title</th>
                                <th>Categories</th>
                                <th>Genres</th>
                                <th>Series</th>
                                <th>Free</th>
                                <th>Download</th>
                                <th>Published</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contents as $key=>$content)
                                <tr>
                                    <td>{{ $contents->perPage() * ($contents->currentPage() - 1) + ++$key }}</td>
                                    <td><a href="{{ $content->getFirstMediaUrl('content_thumbnail') }}"
                                            class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                height="40px" src="{{ $content->getFirstMediaUrl('content_thumbnail') }}"
                                                alt=""></a></td>
                                    <td><a href="{{ $content->getFirstMediaUrl('content_cover_photo') }}"
                                            class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                height="40px"
                                                src="{{ $content->getFirstMediaUrl('content_cover_photo') }}"
                                                alt=""></a></td>
                                    <td>{{ $content->title }}</td>
                                    <td>
                                        @foreach (optional($content)->categories as $category)
                                            <span class="badge badge-soft-primary">{{ $category->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @forelse(optional($content)->genres as $genre)
                                            <span class="badge badge-soft-success">{{ $genre->name }}</span>
                                        @empty
                                            <span class="badge badge-soft-danger">Empty</span>
                                        @endforelse
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.content.is.series.update', lock($content->id)) }}">
                                            <div class="custom-control custom-switch switch-primary">
                                                <input type="checkbox" class="custom-control-input"
                                                    {{ $content->is_series == 1 ? 'checked' : '' }}>
                                                <label class="custom-control-label" for=""></label>
                                            </div>
                                        </a>
                                    </td>
                                    <td><span
                                            class="badge badge-soft-{{ $content->is_premium == 1 ? 'danger' : 'primary' }}">{{ $content->is_premium == 1 ? 'No' : 'Yes' }}</span>
                                    </td>
                                    <td><span
                                            class="badge badge-soft-{{ $content->is_downloadable == 1 ? 'primary' : 'danger' }}">{{ $content->is_downloadable == 1 ? 'Yes' : 'No' }}</span>
                                    </td>
                                    <td><span
                                            class="badge badge-soft-{{ $content->is_published == 1 ? 'primary' : 'danger' }}">{{ $content->is_published == 1 ? 'Yes' : 'No' }}</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown d-inline-block">
                                            <a class="dropdown-toggle arrow-none" id="dLabel11" data-toggle="dropdown"
                                                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                <i class="las la-ellipsis-v font-20 text-muted"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.contents.show', lock($content->id)) }}"><i
                                                        class="las la-eye text-success font-18"></i> View</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.contents.edit', lock($content->id)) }}"><i
                                                        class="las la-pen text-info font-18"></i> Edit</a>
                                                <a class="dropdown-item deletebtn" href="javascript:void(0)"
                                                    data-id="{{ lock($content->id) }}" id="custom-padding-width-alert"><i
                                                        class="las la-trash-alt text-danger font-18"></i> Delete</a>
                                                <a class="dropdown-item"
                                                    href="{{ $content->is_series == 0 ? route('admin.content.single.videos', lock($content->id)) : route('admin.content.sequence.list', lock($content->id)) }}"><i
                                                        class="las la-folder-plus text-primary font-18"></i> Manage
                                                    {{ $content->is_series == 0 ? 'Videos' : 'Series' }}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!--end /table-->

                    <div class="mt-2">
                        {{ $contents->links() }}
                    </div>
                </div>
                <!--end /tableresponsive-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div> <!-- end col -->
@endsection


@push('script')
    <script>
        $('body').on('click', '.deletebtn', function() {
            var id = $(this).data("id");
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will be able to recover this content!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'DELETE'
            }).then((result) => {
                if (result.value === true) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "{{ URL::route('admin.contents.destroy', '') }}/" + id,
                        type: "DELETE",
                        data: {
                            "_token": token,
                            "id": id
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                icon: 'success',
                                showConfirmButton: false,
                            });
                            location.reload();
                        },
                        error: function(response) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something went wrong.',
                                icon: 'error',
                                showConfirmButton: false,
                            });
                        }
                    });

                }
            });
        });
    </script>
@endpush
