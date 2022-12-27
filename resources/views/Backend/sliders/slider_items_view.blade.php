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
                            <h4 class="page-title">Items ({{ $sliders->count() }})</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Items</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->

    <form action="{{ route('admin.slider.item.delete') }}" method="POST">
        @csrf
        <div class="col-lg-12">
            @error('record')
            <span class="p-2 bg-danger-gradient text-center d-block text-light"> {{ $message }} </span>
            @enderror
            <span class="response">  </span>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn btn-xs btn-danger"><i class="las la-minus"></i> Remove Item</button>
                        <a href="{{ route('admin.slider.list') }}" class="btn btn-xs btn-primary"> <i class="las la-angle-left"></i> Back</a>
                    </h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">
                        @if($sliders->count() > 0)
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th><i data-feather="move"></i></th>
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Categories</th>
                                    <th>Genres</th>
                                    <th>Free</th>
                                    <th>Publish</th>
                                    <th>Download</th>
                                    <th class="text-right">Action</th>
                                    <th>Position</th>
                                </tr>
                                </thead>
                                <tbody class="sortable-list">


                                @foreach($sliders as $key=>$record)
                                    <tr id="arrayorder_{{ $record->id }}">
                                        <td><i data-feather="move"></i></td>
                                        <td><input type="checkbox" name="record[]" value="{{ $record->id }}"></td>
                                        <td><a href="{{ $record->contents->getFirstMediaUrl('content_thumbnail') }}" class="image-popup-vertical-fit"><img class="rounded-sm" width="40px" height="40px" src="{{ $record->contents->getFirstMediaUrl('content_thumbnail') }}" alt=""></a></td>
                                        <td>{{ $record->contents->title }}</td>
                                        <td>
                                            @foreach(optional($record->contents)->categories as $category)
                                                <span class="badge badge-soft-primary">{{ $category->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @forelse(optional($record->contents)->genres as $genre)
                                                <span class="badge badge-soft-success">{{ $genre->name }}</span>
                                            @empty
                                                <span class="badge badge-soft-danger">Empty</span>
                                            @endforelse
                                        </td>
                                        <td><span class="badge badge-soft-{{ $record->contents->is_premium == 1 ? 'danger' : 'primary' }}">{{ $record->contents->is_premium == 1 ? 'No' : 'Yes' }}</span></td>
                                        <td><span class="badge badge-soft-{{ $record->contents->is_published == 1 ? 'primary' : 'danger' }}">{{ $record->contents->is_published == 1 ? 'Yes' : 'No' }}</span></td>
                                        <td><span class="badge badge-soft-{{ $record->contents->is_downloadable == 1 ? 'primary' : 'danger' }}">{{ $record->contents->is_downloadable == 1 ? 'Yes' : 'No' }}</span></td>
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
                                        <td class="text-center">
                                            <span class="badge badge-soft-primary">{{ $record->order }}</span>
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
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </form>
@endsection

@push('script')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(document).ready(function () {
            function slideout(){
                setTimeout(function(){
                    $('.response').slideUp("slow", function () {

                    });
                }, 2000);
            }
            $('.response').hide()
            $(function () {
                $('table tbody.sortable-list').sortable({ opacity: 0.8, cursor: 'move', update: function () {
                    var order = $(this).sortable("serialize");
                    $.ajax({
                       url: "{{ route('admin.slider.item.order.sortable') }}",
                        method: 'POST',
                        data: {
                            order : order,
                            _token : "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            $('.response').css({
                                "display": "block",
                                "padding": "4px",
                                "text-align"    : "center",
                                "background"    : "#03D87F",
                                'color'         : "#fff"
                            });
                            $('.response').html(response);
                            $('.response').slideDown('slow')
                            slideout()
                        }
                    });
                    }
                })
            })
        });
    </script>
@endpush

