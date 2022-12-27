@extends('backend.layouts.master')
@section('title', 'Category Management - Update')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Category Management - Edit</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                            <li class="breadcrumb-item active">Category Management</li>
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


    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Category Update</h4>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <form method="post" action="{{ route('admin.categories.update', lock($category->id)) }}"
                        enctype="multipart/form-data">
                        {{-- @dd(route('admin.categories.update', $category->id)) --}}

                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="category_name">Category name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                                    value="{{ $category->name }}" name="category_name" id="category_name">
                                @error('category_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="category_description">Description <span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('category_description') is-invalid @enderror"
                                    value="{{ $category->category_description }}" name="category_description"
                                    id="category_description">
                                @error('category_description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="category_thumbnail">Category thumbnail <span class="text-danger">(Portrait, jpg,
                                        jpeg, png) (max: 512kb)*</span></label>
                                <input type="file" id="category_thumbnail" name="category_thumbnail"
                                    class="dropify form-control"
                                    data-default-file="{{ $category->getFirstMediaUrl('category_thumbnail') }}" />
                                @error('category_thumbnail')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="category_cover_photo">Category cover photo <span class="text-danger">(Landscape,
                                        jpg, jpeg, png) (max: 1Mb)*</span></label>
                                <input type="file" id="category_cover_photo" name="category_cover_photo"
                                    class="dropify form-control"
                                    data-default-file="{{ $category->getFirstMediaUrl('category_cover_photo') }}" />
                                @error('category_cover_photo')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="col-md-12 mb-3">
                                <select name="category_enable" id="category_enable" class="form-control">
                                    <option value="0">Select category type</option>
                                    <option value="0" {{ ($category->is_series == 0) ? 'selected' : '' }}>General</option>
                                    <option value="1" {{ ($category->is_series == 1) ? 'selected' : '' }}>Series</option>
                                    <option value="2" {{ ($category->is_series == 2) ? 'selected' : '' }}>Live TV</option>
                                </select>
                            </div> --}}

                        </div>


                        <div class="form-group">
                            <div class="form-check">
                                <input checked class="form-check-input @error('ensure') is-invalid @enderror" name="ensure"
                                    type="checkbox" value="1" id="invalidCheck3">
                                <label class="form-check-label" for="invalidCheck3">
                                    Are you want to update the category ?
                                </label>
                                @error('ensure')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Categories Table</h4>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">

                        @if ($categories->count() > 0)
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Icon</th>
                                        <th>Cover</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Slug</th>
                                        {{-- <th>Created date</th>
                                    <th>Updated date</th> --}}
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><a href="{{ $category->getFirstMediaUrl('category_thumbnail') }}"
                                                    class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                        height="40px"
                                                        src="{{ $category->getFirstMediaUrl('category_thumbnail') }}"
                                                        alt=""></a></td>
                                            <td><a href="{{ $category->getFirstMediaUrl('category_cover_photo') }}"
                                                    class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                        height="40px"
                                                        src="{{ $category->getFirstMediaUrl('category_cover_photo') }}"
                                                        alt=""></a></td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                @if ($category->is_series == 1)
                                                    Series
                                                @elseif($category->is_series == 2)
                                                    TV
                                                @else
                                                    General
                                                @endif
                                            </td>
                                            <td>{{ $category->slug_en }}</td>
                                            {{-- <td>
                                            <span>{{ \Carbon\Carbon::parse($category->created_at)->format('d M, Y h:i:s:a') }}</span>
                                        </td> --}}
                                            {{-- <td>
                                            <span>{{ \Carbon\Carbon::parse($category->updated_at)->format('d M, Y h:i:s:a') }}</span>
                                        </td> --}}
                                            <td class="text-right">
                                                <a href="{{ route('admin.categories.edit', lock($category->id)) }}"><i
                                                        class="las la-pen text-info font-18"></i></a>
                                                <a href="javascript:void(0);" data-id="{{ lock($category->id) }}"
                                                    class="deletebtn"><i
                                                        class="las la-trash-alt text-danger font-18"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end /table-->
                        @else
                            <span class="badge badge-soft-danger p-3">Have no category found right now ):):</span>
                        @endif

                    </div>
                    <!--end /tableresponsive-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
    </div>
@endsection
@push('script')
    <script>
        $('body').on('click', '.deletebtn', function() {
            var id = $(this).data("id");
            console.log(id);
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this category!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value === true) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "{{ URL::route('admin.categories.destroy', '') }}/" + id,
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
