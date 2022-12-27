@extends('Frontend.Layouts.master')
@section('title', 'Members')
@section('content')
    {{-- Breadcrumb area start --}}
    <div class="bappd-breadcrumb-area-start">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-bg">
                        <h4 class="text-center p-3">
                            MEMBERS
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Breadcrumb area end --}}

    {{-- Table area start --}}
    <div class="bappd-table-area mt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <div class="card">
                            <div class="card-header bg-white d-flex align-items-center justify-content-between">
                                <h6 class="flex-1">Members ({{ $members->count() }})</h6>
                                <input type="text" name="s" id="s" class="form-control"
                                    placeholder="Type here..." style="width: 300px">
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th style="padding: 4px 10px; font-size: 14px; font-weight: 500">#</th>
                                            <th style="padding: 4px 10px; font-size: 14px; font-weight: 500">Image</th>
                                            <th style="padding: 4px 10px; font-size: 14px; font-weight: 500">Name</th>
                                            <th style="padding: 4px 10px; font-size: 14px; font-weight: 500">Designation
                                            </th>
                                            <th style="padding: 4px 10px; font-size: 14px; font-weight: 500">Constituency
                                            </th>
                                            <th style="padding: 4px 10px; font-size: 14px; font-weight: 500">Party</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($members as $key=>$member)
                                            <tr>
                                                <td style="padding: 4px 10px; font-size: 14px;">
                                                    {{ $members->perPage() * ($members->currentPage() - 1) + ++$key }}</td>
                                                <td style="padding: 4px 10px; font-size: 14px"><img
                                                        src="{{ $member->getFirstMediaUrl('web_member_image') }}"
                                                        alt="{{ $member->name }}" width="60"></td>
                                                <td style="padding: 4px 10px; font-size: 14px">{{ $member->name }}</td>
                                                <td style="padding: 4px 10px; font-size: 14px">{{ $member->designation }}
                                                </td>
                                                <td style="padding: 4px 10px; font-size: 14px">{{ $member->constituency }}
                                                </td>
                                                <td style="padding: 4px 10px; font-size: 14px">{{ $member->party }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2"></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                {{ $members->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Table area end --}}
@endsection
