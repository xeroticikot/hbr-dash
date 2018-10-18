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

        <li @if($slug == 'home' || Auth::user()->role == 'other')class="active"@endif><a href="{{ url('/') }}"><em class="fa fa-home">&nbsp;</em> Home</a></li>


        @if(Auth::check() && Auth::user()->role == 'admin')

            <li @if($slug == 'owners')class="active"@endif><a href="{{ url('/owners') }}"><em class="fa fa-bookmark">&nbsp;</em> Owner Feedback & Status</a></li>

            <li @if($slug == 'rfc')class="active"@endif><a href="{{ url('/bookings/rfc') }}">
                    <span class="fa-stack">
                        <span class="fa fa-circle-o fa-stack-2x"></span><strong class="fa-stack-1x">1</strong>
                    </span></span> Ready For Contracts <span class="badge badge-light">{{ $form_2 }}</span></a>
            </li>

            <li @if($slug == 'ipi')class="active"@endif><a href="{{ url('/bookings/ipi') }}"><span class="fa-stack">
                        <span class="fa fa-circle-o fa-stack-2x"></span><strong class="fa-stack-1x">
                            2
                        </strong>
                    </span></span> Internal Phone Inquiry <span class="badge badge-light">{{ $form_4 }}</span></a></li>

  <li @if($slug == 'rb')class="active"@endif><a href="{{ url('/bookings/rb') }}"><span class="fa-stack">
    <span class="fa fa-circle-o fa-stack-2x"></span><strong class="fa-stack-1x">
        3   
    </strong>
</span></span>100% Ready to Book <span class="badge badge-light">{{ $form_1 }}</span></a></li>

 <li @if($slug == 'cf')class="active"@endif><a href="{{ url('/bookings/cf') }}"><span class="fa-stack">
    <span class="fa fa-circle-o fa-stack-2x"></span><strong class="fa-stack-1x">
        4    
    </strong>
</span></span> Our Boats <span class="badge badge-light">{{ $form_6 }}</a></li>

        <li @if($slug == 'sc')class="active"@endif><a href="{{ url('/bookings/sc') }}"><span class="fa-stack">
    <span class="fa fa-circle-o fa-stack-2x"></span><strong class="fa-stack-1x">
        5    
    </strong>
</span></span> Bachelorette Party <span class="badge badge-light">{{ $form_5 }}</span></a></li>
<li @if($slug == 'hc')class="active"@endif><a href="{{ url('/bookings/hc') }}"><span class="fa-stack">
    <span class="fa fa-circle-o fa-stack-2x"></span><strong class="fa-stack-1x">
        6   
    </strong>
</span></span> Home Contact Us <span class="badge badge-light">{{ $form_3 }}</span></a></li>
       

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