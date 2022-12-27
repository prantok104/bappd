@extends('backend.layouts.master')
@section('title', 'Content Create')
@push('style')
    <style>
        .uppy-Dashboard-inner {
            height: 200px !important;
        }
    </style>
@endpush
@section('content')
    <section
        class="preloader position-absolute align-items-center justify-content-center left-0 top-0 right-0 bottom-0 w-100 h-100 bg-white"
        style="display: none; opacity: 0.74; z-index: 99999">
        <div class="text-center">
            <i class="la la-refresh text-secondary la-spin progress-icon-spin"></i>
        </div>
    </section>

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Content - Add New</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dhakalive OTT</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Content</a></li>
                            <li class="breadcrumb-item active">Content Create</li>
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

    {{-- Form area start --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex align-items-center justify-content-between">Add New Content <a
                        href="{{ route('admin.contents.index') }}" class="btn btn-primary"><i class="las la-eye"></i>
                        Contents
                        List</a></h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <form method="POST" action="{{ route('admin.contents.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}" name="title" id="title">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="categories">Content Category <span class="text-danger">*</span></label>
                            <select class=" mb-3 form-control" name="categories[]" id="categories" style="width: 100%">
                                <option value="none">Select the category</option>
                                @foreach ($categories as $key => $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="genres">Genres <span class="text-danger">( Optional )</span></label>
                            <select class="select2 mb-3 select2-multiple @error('genres') is-invalid @enderror"
                                name="genres[]" id="genres" style="width: 100%" multiple="multiple"
                                data-placeholder=" Choose">
                                @foreach ($genres as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                            @error('genres')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="content_thumbnail">Thumbnail <span class="text-danger">(jpg, jpeg, png) (max:
                                    1Mb)*</span></label>
                            <input type="file" id="content_thumbnail" name="content_thumbnail"
                                class="dropify form-control" />
                            @error('content_thumbnail')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="content_cover_photo">Cover photo <span class="text-danger">(jpg, jpeg, png) (max:
                                    2Mb)*</span></label>
                            <input type="file" id="content_cover_photo" name="content_cover_photo"
                                class="dropify form-control" />
                            @error('content_cover_photo')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        <div class="col-md-12 mb-3">
                            <label for="content_description">Description <span class="text-danger">*</span></label>
                            <textarea id="content_description" class="editor-enable @error('content_description') is-invalid @enderror"
                                name="content_description">{{ old('content_description') }}</textarea>
                            @error('content_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                        <div class="col-md-4 mb-3">
                            <label for="trailer">Trailer <span class="text-danger">( Optional )</span></label>
                            <input type="text" name="trailer" id="trailer" placeholder="URL"
                                class="form-control @error('trailer') is-invalid @enderror">
                            @error('trailer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="mdate">Release Date <span class="text-danger">( Optional )</span></label>
                            <input type="text" name="release_date" id="mdate" value="{{ old('release_date') }}"
                                placeholder="YYYY-MM-DD" class="form-control @error('release_date') is-invalid @enderror">
                            @error('release_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="col-md-4 mb-3">
                            <label for="series">Content Type <span class="text-danger">*</span></label>
                            <select name="series" id="series"
                                class="form-control @error('series') is-invalid @enderror">
                                <option value="0" {{ old('series') == '0' ? 'selected' : '' }}>Video</option>
                                <option value="1" {{ old('series') == '1' ? 'selected' : '' }}>Series</option>
                            </select>
                            @error('series')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Only for single video upload start --}}
                        <div class="col-md-12 bg-soft-primary p-3 video_basic_info" id="video_type_content">
                            <h5 class="mt-2 mb-2 ">Video Information</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 row">
                                    <div class="col-md-12 mb-3">
                                        <label for="video_categories">Video Categories <span
                                                class="text-danger">*</span></label>
                                        <select
                                            class="select2 mb-3 select2-multiple @error('video_categories') is-invalid @enderror"
                                            name="video_categories[]" id="video_categories" style="width: 100%"
                                            multiple="multiple" data-placeholder=" Choose">
                                            @foreach ($categories as $key => $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('video_categories')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="channel">Channel <span class="text-danger">( Optional
                                                )</span></label>
                                        <select class="form-control @error('channel') is-invalid @enderror" name="channel"
                                            id="channel">
                                            <option value="">Select the channel</option>
                                            @foreach ($channels as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('channel')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="content_type">Source Type <span class="text-danger">*</span></label>
                                        <select name="content_type" id="content_type" class="form-control">
                                            @foreach ($content_types as $content_type)
                                                <option value="{{ $content_type->id }}">
                                                    {{ $content_type->content_types_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('content_type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="casts">Casts <span class="text-danger">(Optional)</span></label>
                                        <select class="select2 mb-3 select2-multiple @error('casts') is-invalid @enderror"
                                            name="casts[]" id="casts" style="width: 100%" multiple="multiple"
                                            data-placeholder=" Choose the casts">
                                            @foreach ($casts as $key => $cast)
                                                <option value="{{ $cast->id }}">{{ $cast->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="video">Video <span class="text-danger">(Video/* ) (Min: 2Mb Max:
                                            200Mb)*</span></label>
                                    <div id="drag-drop-area"></div>
                                    @error('files')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 video_information bg-soft-primary p-3" style="display: none">

                            <div class="row">
                                <div class="col-md-2 mb-3">
                                    <label for="video_id">Video ID</label>
                                    <input type="text" class="form-control" name="video_id" id="video_id">
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="video_name">Video Name</label>
                                    <input type="text" class="form-control" name="video_name" id="video_name">
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="video_type">Video Type</label>
                                    <input type="text" class="form-control" name="video_type" id="video_type">
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="duration">Video Duration</label>
                                    <input type="text" class="form-control" name="duration" id="duration">
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="video_size">Video Size</label>
                                    <input type="text" class="form-control" name="video_size" id="video_size">
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="video_width_height">Video Width/Height</label>
                                    <input type="text" class="form-control" name="video_width_height"
                                        id="video_width_height">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="image_src">Video Thumbnail</label>
                                    <input type="text" class="form-control" name="image_src" id="image_src">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="video_src">Video Preview</label>
                                    <input type="text" class="form-control" name="video_src" id="video_src">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="downloadable_url">Downloadable Link</label>
                                    <input type="text" class="form-control" name="downloadable_url"
                                        id="downloadable_url">
                                </div>
                            </div>

                        </div>
                        {{-- Only for single video upload end --}}


                        <div class="col-md-4 mb-3 mt-3">
                            <label for="option">Free/ Premium <span class="text-danger">*</span></label>
                            <select name="option" id="option"
                                class="form-control @error('option') is-invalid @enderror">
                                <option value="0">Free</option>
                                <option value="1">Premium</option>
                            </select>
                            @error('option')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3 mt-3">
                            <label for="downloadable">Downloadable <span class="text-danger">*</span></label>
                            <select name="downloadable" id="downloadable"
                                class="form-control @error('downloadable') is-invalid @enderror">
                                <option value="0">No</option>
                                <option value="1">Yes</option>

                            </select>
                            @error('downloadable')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3 mt-3">
                            <label for="status">Publish <span class="text-danger">*</span></label>
                            <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option value="1">Yes</option>
                                <option value="0">No</option>

                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input @error('ensure') is-invalid @enderror" name="ensure"
                                type="checkbox" value="1" id="invalidCheck3" checked>
                            <label class="form-check-label" for="invalidCheck3">
                                Are you want to create a new content ?
                            </label>
                            @error('ensure')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Add New</button>
                </form>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    {{-- Form area end --}}
@endsection



@push('script')
    {{-- Elements change with content type --}}
    <script>
        $('#series').on('change', function() {
            var value = $(this).find(":selected").val();
            if (value == 1) {
                $('.video_basic_info').css("display", "none");
                $('.video_information').css("display", "none");
            } else {
                $('.video_basic_info').css("display", "block");
            }
        });

        var value = $('#series').find(":selected").val();
        if (value == 1) {
            $('.video_basic_info').css("display", "none");
            $('.video_information').css("display", "none");
        } else {
            $('.video_basic_info').css("display", "block");
        }
    </script>

    {{-- Video upload on cloud flare by using api --}}

    <script>
        var uppy = new Uppy.Core({
                debug: false,
                autoProceed: false,
                restrictions: {
                    maxFileSize: 200000000, // max file size for upload
                    minFileSize: 2000000, // min file size for upload
                    maxNumberOfFiles: 1,
                    minNumberOfFiles: 1,
                    allowedFileTypes: ['video/*']
                }
            })
            .use(Uppy.Dashboard, {
                inline: true,
                target: '#drag-drop-area',
                note: 'Video only, File upload limit - Max: 200MB or Min: 2MB',
            }, )
            .use(Uppy.Tus, {
                endpoint: 'https://api.cloudflare.com/client/v4/accounts/ce9d02f488c93974c086f4abd516262b/stream',
                headers: {
                    'Authorization': 'Bearer Lto9380mc3_GuBRz6gIyjQoF8eAwF8SztWSqJib8' // This is cloudflare api token. keep it secure.
                },
                chunkSize: 5 * 1024 * 1024,
                retryDelays: [0, 1000, 3000, 5000],
                limit: 1,
                removeFingerprintOnSuccess: true, // important for cache issue
            })

        uppy.on('complete', (result) => {
            const url = new URL(result.successful[0]['uploadURL'])
            const paths = url.pathname.split('/')
            const final_path =
                'https://api.cloudflare.com/client/v4/accounts/ce9d02f488c93974c086f4abd516262b/stream/' + paths[6];
            const downloadable_path =
                'https://api.cloudflare.com/client/v4/accounts/ce9d02f488c93974c086f4abd516262b/stream/' + paths[
                    6] + '/downloads';

            $('.preloader').css("display", "flex");


            setTimeout(function() {
                // Get Video Details
                fetch(final_path, {
                    method: 'get',
                    headers: {
                        'Authorization': 'Bearer Lto9380mc3_GuBRz6gIyjQoF8eAwF8SztWSqJib8'
                    }
                }).then(response => response.json()).then(function(data) {
                    $('.video_information').css('display', 'flex');
                    $('#video_id').val(data.result.uid);
                    $('#video_name').val(data.result.meta.name);
                    $('#video_type').val(data.result.meta.type);
                    $('#duration').val(secondsToHms(data.result.duration));
                    $('#video_size').val(((data.result.size) / (1024 * 1024)).toFixed(1) + ' MB');
                    $('#video_width_height').val(data.result.input.width + 'X' + data.result.input
                        .height);
                    $('#image_src').val(data.result.thumbnail);
                    $('#video_src').val(data.result.preview);
                    $('#downloadable_url').attr('placeholder', 'Link Generating....')

                    // Video id Tracking for future delete
                    let video_id = data.result.uid
                    if (video_id != '') {
                        $.ajax({
                            url: "{{ route('admin.content.record.temp.store') }}",
                            method: "POST",
                            data: {
                                'video_id': video_id,
                                'tracker': "{{ csrf_token() }}",
                                '_token': "{{ csrf_token() }}"
                            },
                            success: function(data) {

                            }
                        });
                    }

                });
            }, 15000)

            const getDownloadLink = setInterval(() => {
                // Get Downloadable URL
                let downloadable_url = '';
                fetch(downloadable_path, {
                    method: 'post',
                    headers: {
                        'Authorization': 'Bearer Lto9380mc3_GuBRz6gIyjQoF8eAwF8SztWSqJib8'
                    }
                }).then(response => response.json()).then(function(data) {
                    if (data.result.default.url != '' || data.result.default.url != null) {
                        clearInterval(getDownloadLink);
                        $('#downloadable_url').val(data.result.default.url);
                        $('.preloader').css("display", "none");
                        $('.add-new-btn').css("display", "block");
                    }
                });

            }, 9000)



            // Second to Hours minutes and seconds
            function secondsToHms(d) {
                d = Number(d);
                var h = Math.floor(d / 3600);
                var m = Math.floor(d % 3600 / 60);
                var s = Math.floor(d % 3600 % 60);

                var hDisplay = h > 0 ? h + (h == 1 ? "h " : "h ") : "";
                var mDisplay = m > 0 ? m + (m == 1 ? "m " : "m ") : "";
                var sDisplay = s > 0 ? s + (s == 1 ? "s" : "s") : "";
                return hDisplay + mDisplay + sDisplay;
            }



        })

        uppy.on('upload-success', (file, response) => {
            console.log('Upload Success')
        })

        uppy.on('error', (error) => {
            console.error(error.stack)
        })
    </script>
@endpush
