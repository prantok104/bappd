@extends('backend.layouts.master')
@section('title', 'Member Edit')
@push('style')
    <style>
        .dropify-wrapper {
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
                        <h4 class="page-title">Member - Edit</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Bappd</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Members</a></li>
                            <li class="breadcrumb-item active">Member Edit</li>
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
                <h4 class="card-title d-flex align-items-center justify-content-between">Member Edit <a
                        href="{{ route('admin.member.index') }}" class="btn btn-primary">
                        Members
                        List</a></h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <form method="POST" action="{{ route('admin.member.update', lock($member->id)) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="member_profile">Member profile <span class="text-danger">(jpg, jpeg, png) (max:
                                    1Mb)*</span></label>
                            <input type="file" id="member_profile" name="member_profile" class="dropify form-control"
                                data-default-file="{{ $member->getFirstMediaUrl('web_member_image') }}" />
                            @error('member_profile')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="name mt-3">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ $member->name }}" name="name" id="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="designation mt-2">
                                <label for="designation">Designation <span class="text-danger">*</span></label>
                                <select name="designation" id="designation"
                                    class="form-control @error('designation') is-invalid @enderror">
                                    <option value="">---select the designation---</option>
                                    <option value="chairperson"
                                        {{ $member->designation == 'chairperson' ? 'selected' : '' }}>
                                        Chairperson</option>
                                    <option value="member" {{ $member->designation == 'member' ? 'selected' : '' }}>Member
                                    </option>
                                </select>
                                @error('designation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="constituency mt-2">
                                <label for="constituency">Constituency <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('constituency') is-invalid @enderror"
                                    value="{{ $member->constituency }}" name="constituency" id="constituency">
                                @error('constituency')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                        </div>



                        <div class="col-md-4 mb-3">
                            <div class="party mt-3">
                                <label for="party">Party <span class="text-danger">*</span></label>
                                <select name="party" id="party"
                                    class="form-control @error('party') is-invalid @enderror">
                                    <option value="">---select the party---</option>
                                    <option value="Bangladesh Awami League"
                                        {{ $member->party == 'Bangladesh Awami League' ? 'selected' : '' }}>
                                        Bangladesh Awami League</option>
                                    <option value="Bangladesh Jatiya Party"
                                        {{ $member->party == 'Bangladesh Jatiya Party' ? 'selected' : '' }}>Bangladesh
                                        Jatiya
                                        Party
                                    </option>
                                    <option value="Bangladesh Nationalist Party"
                                        {{ $member->party == 'Bangladesh Nationalist Party' ? 'selected' : '' }}>Bangladesh
                                        Nationalist
                                        Party
                                    </option>
                                </select>
                                @error('party')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="order row">
                                <div class="col-md-6 mt-2">
                                    <label for="order">order <span class="text-danger">*</span></label>
                                    <input type="text" name="order" id="order" value="{{ $member->order }}"
                                        class="form-control  @error('order') is-invalid @enderror">
                                    @error('order')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value="1" {{ $member->status == '1' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $member->status == '0' ? 'selected' : '' }}>Inactive
                                        </option>

                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="order mt-2">
                                <label for="">Click the update button for data upgradation</label>
                                <button class="btn btn-primary d-block" type="submit">Update</button>
                            </div>
                        </div>



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
@endpush
