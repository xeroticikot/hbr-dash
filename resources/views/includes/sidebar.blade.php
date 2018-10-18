<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

    <div class="profile-sidebar">

        <div class="profile-userpic">

            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">

        </div>

        <div class="profile-usertitle">

            <div class="profile-usertitle-name">{{ Auth::user()->name }}</div>

            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>

        </div>

        <div class="clear"></div>

    </div>

    <div class="divider"></div>

    <ul class="nav menu">

        <li @if($slug == 'home' || Auth::user()->role == 'other')class="active"@endif><a href="{{ url('/') }}"><em class="fa fa-home">&nbsp;</em> Home - All Leads</a></li>


        @if(Auth::check() && Auth::user()->role == 'admin')

            <li @if($slug == 'rfc')class="active"@endif><a href="{{ url('/bookings/rfc') }}">1. Ready For Contracts <span class="badge badge-light">{{ $form_2 }}</span></a>
            </li>

            <li @if($slug == 'ipi')class="active"@endif><a href="{{ url('/bookings/ipi') }}">2. Internal Phone Inquiry <span class="badge badge-light">{{ $form_4 }}</span></a></li>

            <li @if($slug == 'rb')class="active"@endif><a href="{{ url('/bookings/rb') }}">3. 100% Ready to Book <span class="badge badge-light">{{ $form_1 }}</span></a></li>

            <li @if($slug == 'cf')class="active"@endif><a href="{{ url('/bookings/cf') }}">4. Our Boats <span class="badge badge-light">{{ $form_6 }}</a></li>

            <li @if($slug == 'sc')class="active"@endif><a href="{{ url('/bookings/sc') }}">5. Bachelorette Party <span class="badge badge-light">{{ $form_5 }}</span></a></li>
            <li @if($slug == 'hc')class="active"@endif><a href="{{ url('/bookings/hc') }}">6. Home Contact Us <span class="badge badge-light">{{ $form_3 }}</span></a></li>

            <li @if($slug == 'owners')class="active"@endif><a href="{{ url('/owners') }}"><em class="fa fa-bookmark">&nbsp;</em> Owner Feedback & Status</a></li>

            <li @if($slug == 'boats')class="active"@endif><a href="{{ url('/boats') }}"><em class="fa fa-ship">&nbsp;</em> Boats</a></li>

            <li class="parent @if($slug == 'addmin' || $slug == 'users'){{'active'}}@endif"><a data-toggle="collapse" href="#sub-item-1">

                    <em class="fa fa-user">&nbsp;</em> Users (Admin) <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>

                </a>

                <ul class="children collapse" id="sub-item-1">

                    <li @if($slug == 'addmin')class="active"@endif><a class="" href="{{ url('/create-users') }}">

                            <span class="fa fa-arrow-right">&nbsp;</span> Create Users

                        </a>

                    </li>

                    <li @if($slug == 'users')class="active"@endif>

                        <a class="" href="{{ url('/users-list') }}">

                            <span class="fa fa-arrow-right">&nbsp;</span>Users Lists

                        </a>

                    </li>

                </ul>

            </li>

             @endif
    </ul>

</div><!--/.sidebar-->