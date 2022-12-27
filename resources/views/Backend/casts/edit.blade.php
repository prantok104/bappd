@extends('backend.layouts.master')
@section('title', 'cast Management')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Cast Management - Update</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Cast</a></li>
                            <li class="breadcrumb-item active">Cast Management</li>
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
                    <h4 class="card-title">Cast update</h4>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.casts.update', lock($cast->id)) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="cast_name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('cast_name') is-invalid @enderror"
                                    name="cast_name" id="cast_name" value="{{ $cast->name }}">
                                @error('cast_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="cast_profile">Profile Picture<span class="text-danger">(Portrait, jpg,
                                        jpeg, png) (max: 512kb)</span></label>
                                <input type="file" id="cast_profile" name="cast_profile" class="dropify form-control"
                                    data-default-file="{{ $cast->getFirstMediaUrl('cast_profile') }}" />
                                @error('cast_profile')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                        </div>


                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input @error('ensure') is-invalid @enderror" name="ensure"
                                    type="checkbox" value="1" id="invalidCheck3" checked>
                                <label class="form-check-label" for="invalidCheck3">
                                    Are you want to update the cast ?
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
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Casts Table</h4>
                    <input type="text" name="cast_s" id="cast_id" placeholder="Type here..." class="form-control"
                        style="width: 350px">
                    <a href="{{ route('admin.casts.index') }}" class="btn btn-sm btn-primary"><i
                            class="las la-angle-left"></i> Back</a>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">

                        @if ($casts->count() > 0)
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="output">
                                    @foreach ($casts as $key => $cast)
                                        <tr>
                                            <td>{{ $casts->perPage() * ($casts->currentPage() - 1) + ++$key }}</td>
                                            <td><a href="{{ $cast->getFirstMediaUrl('cast_profile') }}"
                                                    class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                        height="40px" src="{{ $cast->getFirstMediaUrl('cast_profile') }}"
                                                        alt=""></a></td>
                                            <td>{{ $cast->name }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.casts.edit', lock($cast->id)) }}"><i
                                                        class="las la-pen text-info font-18"></i></a>
                                                <a href="javascript:void(0)" data-id="{{ lock($cast->id) }}"
                                                    class="deletebtn"><i
                                                        class="las la-trash-alt text-danger font-18"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end /table-->

                            <div class="mt-2">
                                {{ $casts->links() }}
                            </div>
                        @else
                            <span class="badge badge-soft-danger p-3">Have no cast found right now ):):</span>
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
        $(document).ready(function() {
            $('#cast_id').keyup(function() {
                if ($(this).val().length > 1) {
                    $.ajax({
                        url: "{{ route('admin.casts.search') }}",
                        method: 'POST',
                        data: {
                            'cast_id': $(this).val(),
                            '_token': "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            $('#output').html('');
                            $('#output').html(data);
                        }
                    });
                }
            });
        });
    </script>

    {{-- Delete btn  --}}
    <script>
        $('body').on('click', '.deletebtn', function() {
            var id = $(this).data("id");
            console.log(id);
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will be able to recover this cast!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value === true) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "{{ route('admin.casts.destroy', '') }}/" + id,
                        method: "DELETE",
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
