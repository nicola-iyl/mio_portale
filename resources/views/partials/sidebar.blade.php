<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" style="padding-left:0px;">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><img alt="" class="img-circle" src="/images/logo_cms.png"/></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs"><strong class="font-bold">TOMO SAPIENS</strong></span>
                            <span class="text-muted text-xs block">{{ Auth::user()->name }}<b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">ID+</div>
            </li>
        </ul>
        @section('sidebar-menu')
            <ul class="nav metismenu" id="side-menu" style="padding-left:0px;">
                <li class="{{ (Route::currentRouteName() == 'dashboard') ? "active" : "" }}">
                    <a href="{{route('home')}}">
                        <i class="fa fa-th-large"></i>
                        <span class="nav-label">DASHBOARD</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-th-large"></i> <span class="nav-label">PROGRAMMAZIONE</span> <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse {{(request()->is('category/*')) ? 'in' : ''}}">
                        @foreach($macrocategories as $cat)
                            <li><a href="{{route('category',['id'=>$cat->id])}}">{{$cat->name}} {{request()->route('name')}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="{{ (Route::currentRouteName() == 'tags') ? "active" : "" }}">
                    <a href="{{route('tags')}}">
                        <i class="fa fa-th-large"></i>
                        <span class="nav-label">TAGS</span>
                    </a>
                </li>
            </ul>

        @show
    </div>
</nav>
