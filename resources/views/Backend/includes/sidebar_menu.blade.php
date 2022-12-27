<!-- Left Sidenav -->
<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{ route('admin.dashboard.page') }}" class="logo">
            <span class="text-white">
                Bappd Dashboard
            </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            <li class="menu-label mt-0">Main</li>
            <li>
                <a href="{{ route('admin.dashboard.page') }}"> <i data-feather="home"
                        class="align-self-center menu-icon"></i><span>Analytics</span></a>
            </li>

            <li class="{{ request()->routeIs('admin.member.*') ? 'mm-active' : '' }}">
                <a href="javascript:void(0)"> <i data-feather="users" class="align-self-center menu-icon"></i><span>
                        Members </span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.member.index') }}"><i
                                class="ti-control-record"></i>All Members</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.member.create') }}"><i
                                class="ti-control-record"></i>Add new</a></li>
                    {{-- <li class="nav-item"><a class="nav-link"
                            href="{{ route('admin.member.edit', lock($member->id)) }}"><i
                                class="ti-control-record"></i>Edit</a></li> --}}
                    {{--  <li><a href="{{ route('admin.categories.index') }}"> <i
                                class="ti-control-record"></i><span>Categories</span></a></li>
                    <li><a href="{{ route('admin.content.settings') }}"> <i
                                class="ti-control-record"></i><span>Settings</span></a></li>
                    <li><a href="{{ route('admin.contents.trash') }}"> <i
                                class="ti-control-record"></i><span>Trash</span></a></li> --}}
                </ul>
            </li>

            {{--
            <li class="{{ request()->routeIs('admin.channel.*') ? 'mm-active' : '' }}">
                <a href="javascript:void(0)"> <i data-feather="plus-circle"
                        class="align-self-center menu-icon"></i><span>Channel</span><span class="menu-arrow"><i
                            class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.channel.create') }}"><i
                                class="ti-control-record"></i>Add New Channel</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.channel.index') }}"><i
                                class="ti-control-record"></i>Channels List</a></li>
                    <li><a href="{{ route('admin.channel.trash') }}"> <i
                                class="ti-control-record"></i><span>Trash</span></a></li>
                </ul>
            </li>


            <li>
                <a href="{{ route('admin.content.type.create') }}"> <i data-feather="video"
                        class="align-self-center menu-icon"></i><span>Source Type</span></a>
            </li>




            <li class="{{ request()->routeIs('admin.genres.*') ? 'mm-active' : '' }} ">
                <a href="javascript:void(0)"> <i data-feather="command"
                        class="align-self-center menu-icon"></i><span>Genres</span><span class="menu-arrow"><i
                            class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.genres.create') }}"><i
                                class="ti-control-record"></i>Create new Genere</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.genres.index') }}"><i
                                class="ti-control-record"></i>Genres List</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.genres.trash') }}"><i
                                class="ti-control-record"></i>Trash</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('admin.casts.index') }}"> <i data-feather="users"
                        class="align-self-center menu-icon"></i><span>Casts</span></a>
            </li> --}}
            {{--
            <li>
                <a href="javascript:void(0)"> <i data-feather="slack" class="align-self-center menu-icon"></i><span>Movies</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.movies.create') }}"><i class="ti-control-record"></i>Create New Movie</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.movies.list') }}"><i class="ti-control-record"></i>All Movies</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.movie.category.create') }} "><i class="ti-control-record"></i>Create Movie Category</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0)"> <i data-feather="radio" class="align-self-center menu-icon"></i><span>Live Tv</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.live.tv.create') }}"><i class="ti-control-record"></i>Create New TV</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.live.tv.list') }}"><i class="ti-control-record"></i>All Tv's</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.live.tv.category.create') }} "><i class="ti-control-record"></i>Create TV Category</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0)"> <i data-feather="align-left" class="align-self-center menu-icon"></i><span>Series</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.video.series.create') }}"><i class="ti-control-record"></i>Create New Series</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.series.list') }}"><i class="ti-control-record"></i>All Series</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.series.category.create') }} "><i class="ti-control-record"></i>Create Series Category</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0)"> <i data-feather="video" class="align-self-center menu-icon"></i><span>Video Upload</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.video.index') }}"><i class="ti-control-record"></i>Video Upload</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.video.list') }}"><i class="ti-control-record"></i>Videos List</a></li>
                </ul>
            </li> --}}

            {{-- <li>
                <a href="javascript:void(0)"> <i data-feather="sliders"
                        class="align-self-center menu-icon"></i><span>Sliders</span><span class="menu-arrow"><i
                            class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.video.index') }}"><i
                                class="ti-control-record"></i>Broadcast Slider</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.slider.list') }}"><i
                                class="ti-control-record"></i>Custom Slider</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.slider.setting') }}"><i
                                class="ti-control-record"></i>Settings</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('admin.cloud.flare.videos.list') }}"> <i data-feather="globe"
                        class="align-self-center menu-icon"></i><span>Cloud Flare Videos</span></a>
            </li>

            <li>
                <a href="javascript:void(0)"> <i data-feather="lock"
                        class="align-self-center menu-icon"></i><span>Authenticate</span><span class="menu-arrow"><i
                            class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.authenticate.role') }}"><i
                                class="ti-control-record"></i>Role</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.authenticate.permission') }}"><i
                                class="ti-control-record"></i>Permission</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.users.list') }}"> <i data-feather="users"
                        class="align-self-center menu-icon"></i><span>Users</span></a>
            </li> --}}
            <li>
                <a href="{{ route('admin.system.restart') }}"> <i data-feather="refresh-cw"
                        class="align-self-center menu-icon"></i><span>System Restart</span></a>
            </li>
            <li>
                <a href="{{ route('front.home.page') }}" target="_blank"> <i data-feather="globe"
                        class="align-self-center menu-icon"></i><span>Website</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- end left-sidenav-->
