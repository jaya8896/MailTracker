<header class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <a href="/" class="logo">Open/Click <span class="lite">Tracker</span></a>
    <!--logo end-->



    <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="{{asset('img/avatar1_small.jpg')}}">
                            </span>
                    <span class="username">{{Auth::user()->name}}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li class="eborder-top">
                        <a href="#"><i class="icon_profile"></i> My Profile</a>
                    </li>
                    <li>
                        <a href="\logout"><i class="icon_key_alt"></i> Log Out</a>
                    </li>
                    <li>
                        <a href="https://red-crater-3128.postman.co/docs/collection/view/2463944-b7f9c6f4-f6c6-39ae-3617-20dd9e0ddc6d#4280fa8f-ac87-1b27-ad55-e8fb5c7cf308"><i class="icon_key_alt"></i> Documentation</a>
                    </li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
    </div>
</header>