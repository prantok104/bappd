@extends('Frontend.Layouts.master')
@section('title', 'Home page')
@section('content')

    {{ Hash::make('12345678') }}

    {{-- Slidera area start --}}
    <section class="bp-slider-area-start">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bp-slider-items-area">
                        {{-- Single slider item area start --}}
                        <div class="bp-single-slider-item"
                            style="background: url({{ asset('frontend/assets/images/sliders/1.png') }}) no-repeat scroll center bottom/ cover">

                        </div>
                        {{-- Single slider item area end --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Slidera area end --}}

    {{-- Scrollbar area start --}}
    <section class="scrollbar-area-start">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="scrollbar-content">
                        <marquee behavior="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                            <a href=""><i class="fal fa-caret-circle-right"></i> Welcome to the web portal of
                                Bangladesh
                                Association of Parliament on Population and Development (BAPPD)</a>
                            <a href=""><i class="fal fa-caret-circle-right"></i> 20th Session (5th Session of 2022)
                                of 11th
                                Parliament has been prorogued on 06 November, 2022 at 10:13 PM</a>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Scrollbar area end --}}

    {{-- Content area start --}}
    <div class="bp-main-content-area-start">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bp-main-contents">
                        {{-- Notice area start --}}
                        <div class="bp-notice-area-start">
                            <div class="bp-card-header">
                                <h4><i class="fal fa-newspaper mr-2"></i> News & Events </h4>
                            </div>
                            <div class="bp-card-body">
                                <ul class="news-lists">
                                    <li><a href=""><i class="fal fa-caret-right"></i> Although Bangladesh
                                            Association of Parliamentariants on Population.</a></li>
                                    <li><a href=""><i class="fal fa-caret-right"></i> BAPPD is a National body to
                                            promote
                                            population and development issues.</a></li>
                                    <li><a href=""><i class="fal fa-caret-right"></i> BAPPD has been formed under
                                            the
                                            Chairmanship of the Hon’ble Speaker, Bangladesh National Parliament.</a>
                                    </li>
                                    <li><a href=""><i class="fal fa-caret-right"></i>Conference on
                                            Population and Development (ICPD) Programme of Action (POA).</a></li>
                                    <li><a href=""><i class="fal fa-caret-right"></i> International on
                                            Population and Development (ICPD) Programme of Action (POA).</a></li>
                                    <li><a href=""><i class="fal fa-caret-right"></i>Population and Development
                                            (ICPD) Programme of Action (POA).</a></li>
                                </ul>
                            </div>
                        </div>
                        {{-- Notice area end --}}

                        {{-- overview area start --}}
                        <div class="bp-overview-area-start">
                            <h2>Bangladesh Association of Parliamentarians on Population and Development (BAPPD)</h2>
                            <p>Although Bangladesh Association of Parliamentariants on Population and Development
                                (BAPPD) formed
                                under the SPCPD project but BAPPD is a National body to promote population and
                                development
                                issues. BAPPD has been formed under the Chairmanship of the Hon’ble Speaker, Bangladesh
                                National
                                Parliament, to create mass awareness on population and development, enact necessary laws
                                and
                                policies for preventing child marriage, allocate adequate budget for improving maternal
                                health
                                and ensure safe delivery, youth development, maintain liaison with national, regional
                                and
                                international committees and forum on population and development (P&D), facilitate in
                                conducting
                                policy dialogues, consultation workshops, round table meetings and interactive meetings
                                at
                                national and local levels on P&D issues related to International Conference on
                                Population and
                                Development (ICPD) Programme of Action (POA).</p>
                        </div>
                        {{-- overview area end --}}
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="bp-main-contents df-mt">
                        {{-- Useful area start --}}
                        <div class="bp-useful-area-start">
                            <div class="bp-event-area-start bg-white df-height">
                                <div class="bp-card-header">
                                    <h4><i class="fal fa-calendar-alt mr-2"></i> Upcoming Meetings </h4>
                                </div>
                                <div class="bp-card-body">
                                    <ul class="news-lists">
                                        <li><a href=""><i class="fal fa-caret-right"></i> Although Bangladesh
                                                Association of Parliamentariants on Population.</a></li>
                                        <li><a href=""><i class="fal fa-caret-right"></i> BAPPD is a National body to
                                                promote
                                                population and development issues.</a></li>
                                        <li><a href=""><i class="fal fa-caret-right"></i> BAPPD has been formed under
                                                the
                                                Chairmanship of the Hon’ble Speaker, Bangladesh National Parliament.</a>
                                        </li>
                                        <li><a href=""><i class="fal fa-caret-right"></i> International Conference on
                                                Population and Development (ICPD) Programme of Action (POA).</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- Useful area end --}}

                        {{-- Useful area start --}}
                        <div class="bp-useful-area-start">
                            <div class="quick-link-area bg-white df-height">
                                <div class="bp-card-header">
                                    <h4><i class="fal fa-link mr-2"></i> Quick links </h4>
                                </div>
                                <div class="bp-card-body">
                                    <ul class="news-lists">
                                        <li><a href=""><i class="fal fa-caret-right"></i> Bangladesh parliament.</a>
                                        </li>
                                        <li><a href=""><i class="fal fa-caret-right"></i> Bangladesh Portal.</a></li>
                                        <li><a href=""><i class="fal fa-caret-right"></i> Prime Minister's
                                                Office.</a></li>
                                        <li><a href=""><i class="fal fa-caret-right"></i> President Office.</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- Useful area end --}}

                        {{-- Useful area start --}}
                        <div class="bp-useful-area-start">
                            <div class="bp-links-area-start bg-white df-height">
                                <div class="bp-card-header">
                                    <h4><i class="fab fa-pagelines mr-2"></i> Others </h4>
                                </div>
                                <div class="bp-card-body">
                                    <div class="bp-others-contents">
                                        <div class="bp-single-other">
                                            <a href=""><i class="fal fa-user-headset"></i> <span>Feedback</span></a>
                                        </div>
                                        <div class="bp-single-other">
                                            <a href=""><i class="fal fa-images"></i> <span>Photo
                                                    gallery</span></a>
                                        </div>
                                        <div class="bp-single-other">
                                            <a href=""><i class="fal fa-folder"></i> <span>BAPPD
                                                    Archive</span></a>
                                        </div>
                                        <div class="bp-single-other">
                                            <a href=""><b>12547874</b> <span>Total
                                                    Visitors</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Useful area end --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Content area end --}}
@endsection
