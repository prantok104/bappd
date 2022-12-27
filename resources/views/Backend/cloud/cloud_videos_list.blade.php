@extends('backend.layouts.master')
@section('title', 'Cloud Flare Videos')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Cloud Flare Videos</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Cloud Flare</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Videos</a></li>
                            <li class="breadcrumb-item active">Cloud Flare Videos</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cloud Flare Videos</h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">
                        @if (count($videos) > 0)
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Thumbnail </th>
                                <th>Preview </th>
                                <th>Video ID</th>
                                <th>Size</th>
                                <th>Type</th>
                                <th>Width</th>
                                <th>Height</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($videos as $key=>$video)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td><a href="{{ $video['thumbnail'] }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $video['thumbnail'] }}" alt=""></a></td>
                                    <td><a class="btn btn-sm btn-outline-primary popup-youtube" href="{{ $video['preview'] }}"><i class="las la-eye"></i></a></td>
                                    <td>{{ $video['id'] }}</td>
                                    <td><span class="badge badge-soft-danger">{{ $video['size'] }} MB</span></td>
                                    <td><span class="badge badge-soft-primary">{{ $video['type'] }}</span></td>
                                    <td>{{ $video['width'] }}</td>
                                    <td>{{ $video['height'] }}</td>
                                    <td class="text-right">
                                        <button type="button" class="btn btn-gradient-danger" onclick="deleteConfirmation('{{ $video['id'] }}')" ><i class="las la-trash-alt text-white font-18"></i></button>
                                    </td>
                                </tr>
                                @empty
                                    No data found
                                @endforelse
                            </tbody>
                        </table><!--end /table-->
                        @endif
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div>
@endsection

@push('script')
    <script>
        function deleteConfirmation(id) {
            Swal.fire({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, Cancel!",
                reverseButtons: !0
            }).then(function (e) {
                    if(e.value == true){

                        $.ajax({
                            url: "{{ route('admin.cloud.video.delete') }}",
                            method: "POST",
                            data: {
                                'video_id'  : id,
                                '_token'    : "{{ csrf_token() }}"
                            },
                            success: function (html) {
                                console.log('Cloud Video Delete')
                            }
                        });


                        $.ajax({
                            url: "{{ route('admin.temp.video.delete') }}",
                            method: "POST",
                            data: {
                                'video_id'  : id,
                                '_token'    : "{{ csrf_token() }}"
                            },
                            success: function (html) {
                                location.reload()
                            }
                        });
                    }
                })
            }
    </script>
@endpush
