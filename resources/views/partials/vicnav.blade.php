<section class="menu cid-qBPDpuwyM3" once="menu" id="menu2-1m" data-rv-view="162">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="https://vic.com.ro">
                         <img src="{{asset('assets/images/traian-s-640x426.jpg')}}" alt="Traian Alexandru" title="Traian Alexandru" media-simple="true" style="height: 4.5rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-7" href="https://vic.com.ro">Web Development</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link link text-black" data-toggle="dropdown-submenu" aria-expanded="false">
                        <span class="label"><i class="fa fa-bell-o"></i></span>
                    </a>
                    <div class="dropdown-menu notification-menu">
                        <a class="text-black dropdown-item display-4"  aria-expanded="false">Your notifications</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link text-black display-4" href="/">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>&nbsp;Home</a>
                </li><li class="nav-item">
                    <a class="nav-link link text-black display-4" href="/about">
                        <span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                        About</a>
                </li><li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle display-4" href="/services" data-toggle="dropdown-submenu" aria-expanded="false"><span class="mbri-mobile2 mbr-iconfont mbr-iconfont-btn"></span>&nbsp;Dev&nbsp;</a><div class="dropdown-menu"><a class="text-black dropdown-item display-4" href="/services" aria-expanded="false"><span class="mbri-website-theme mbr-iconfont mbr-iconfont-btn"></span>Services</a><a class="text-black dropdown-item display-4" href="/links"><span class="mbri-link mbr-iconfont mbr-iconfont-btn"></span>Links</a><a class="text-black dropdown-item display-4" href="/demos" aria-expanded="false"><span class="mbri-code mbr-iconfont mbr-iconfont-btn"></span>Demos</a></div></li>
                <li class="nav-item"><a class="nav-link link text-black display-4" href="/contact"><span class="mbri-letter mbr-iconfont mbr-iconfont-btn"></span>&nbsp; Contact &nbsp;&nbsp;</a></li>
                @if(auth()->check())
                    <li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false"><span class="mbri-smile-face mbr-iconfont mbr-iconfont-btn"></span>&nbsp;{{ auth()->user()->name }} <span class="caret"></span>&nbsp;</a><div class="dropdown-menu">@if(auth()->user()->hasRole('admin')) @if(admins()->check())<a class="text-black dropdown-item display-4" href="{{ url('/scaffold-dashboard') }}" aria-expanded="false"><span class="mbri-website-theme mbr-iconfont mbr-iconfont-btn"></span>Dashboard</a>@else<a class="text-black dropdown-item display-4" href="{{ url('/adm/login') }}" aria-expanded="false"><span class="mbri-website-theme mbr-iconfont mbr-iconfont-btn"></span>Admin</a>@endif @endif<a class="text-black dropdown-item display-4" href="{{ url('/auth/logout') }}" aria-expanded="false"><span class="mbri-website-theme mbr-iconfont mbr-iconfont-btn"></span>Logout</a></div></li>
                @endif
            </ul>
        </div>
    </nav>
</section>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light notify-hide" style="margin-top: 64px;">
    <ul class="nav nav-pills" style="margin: auto;">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#!" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o"></i></a>
        <div class="dropdown-menu notification-menu">
          <a class="dropdown-item" href="#!">Your notifications</a>
        </div>
      </li>
    </ul>
</nav>
