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
                            <h4 class="page-title">Episodes ({{ optional($content)->records_count }})</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Episodes</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div>
                        <a href="{{ route('admin.content.sequence.list', lock(optional($content)->contents->id)) }}"
                            class="btn btn-primary"><i class="las la-angle-left"></i> Back</a>
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
                    Episodes List Table ( {{ $content->title }} )
                    <div>
                        <a href="{{ route('admin.content.sequence.video.add', lock($content->id)) }}"
                            class="btn btn-primary"><i class="las la-plus"></i> Add New episode</a>
                        @if ($trashed > 0)
                            <a href="{{ route('admin.record.trash.data', lock($content->id)) }}" class="btn btn-danger"><i
                                    class="las la-trash"></i>
                                Trash</a>
                        @endif
                    </div>
                </h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="table-responsive">
                    @if ($content->records_count > 0)
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Video</th>
                                    <th>Type</th>
                                    <th>Size</th>
                                    <th>Title</th>
                                    <th>Channel</th>
                                    <th>Categories</th>
                                    <th>Genres</th>
                                    <th>Orders</th>
                                    <th>Last E./V.</th>
                                    <th>Free</th>
                                    <th>Publish</th>
                                    <th>Download</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $key => $record)
                                    <tr>
                                        <td>{{ $records->perPage() * ($records->currentPage() - 1) + ++$key }}</td>
                                        <td><a href="{{ $record->getFirstMediaUrl('record_thumbnail') }}"
                                                class="image-popup-vertical-fit"><img class="rounded-sm" width="40px"
                                                    height="40px" src="{{ $record->getFirstMediaUrl('record_thumbnail') }}"
                                                    alt=""></a></td>
                                        @php
                                            $meta = json_decode($record->meta, true);
                                        @endphp
                                        <td> <a class="btn btn-sm btn-outline-primary popup-youtube"
                                                href="{{ $meta['preview'] }}"><i class="las la-eye"></i></a></td>

                                        <td><span>{{ $meta['fileType'] }}</span></td>
                                        <td><span class="badge badge-soft-primary">{{ $meta['fileSize'] }}</span></td>
                                        <td>{{ $record->title }}</td>
                                        <td><span
                                                class="badge badge-soft-danger">{{ optional($record->channels)->name }}</span>
                                        </td>
                                        <td>
                                            @foreach (optional($record)->categories as $category)
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
                                        <td><span class="badge badge-soft-dark">{{ $record->order }}</span></td>
                                        <td><span
                                                class="badge badge-soft-{{ $record->is_last == 1 ? 'primary' : 'danger' }}">{{ $record->is_last == 1 ? 'Yes' : 'No' }}</span>
                                        </td>
                                        <td><span
                                                class="badge badge-soft-{{ $record->is_premium == 1 ? 'danger' : 'primary' }}">{{ $record->is_premium == 1 ? 'No' : 'Yes' }}</span>
                                        </td>
                                        <td><span
                                                class="badge badge-soft-{{ $record->is_publish == 1 ? 'primary' : 'danger' }}">{{ $record->is_publish == 1 ? 'Yes' : 'No' }}</span>
                                        </td>
                                        <td><span
                                                class="badge badge-soft-{{ $record->is_downloadable == 1 ? 'primary' : 'danger' }}">{{ $record->is_downloadable == 1 ? 'Yes' : 'No' }}</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle arrow-none" id="dLabel11" data-toggle="dropdown"
                                                    href="#" role="button" aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <i class="las la-ellipsis-v font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.record', lock($record->id)) }}"><i
                                                            class="las la-eye text-success font-18"></i> View</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.content.sequence.video.edit', lock($record->id)) }}"><i
                                                            class="las la-pen text-info font-18"></i> Edit</a>
                                                    <a class="dropdown-item deletebtn" data-id="{{ lock($record->id) }}"
                                                        href="javascript:void(0)"><i
                                                            class="las la-trash-alt text-danger font-18"></i>
                                                        Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!--end /table-->
                    @else
                        <div class="text-center">
                            <span class="alert alert-light">No Videos found</span>
                        </div>
                    @endif
                    <div class="mt-2">
                        {{ $records->links() }}
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
                text: "Once deleted, you will be able to recover this record!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'DELETE'
            }).then((result) => {
                if (result.value === true) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "{{ route('admin.record.destroy', '') }}/" + id,
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
