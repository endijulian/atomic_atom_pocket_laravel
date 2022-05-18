<nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="{{ (request()->is('home')) ? 'active' : '' }}">
                <a href="{{ route('home') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
            </li>
            <li class="menu-title">Module</li>
            <li class="{{ (request()->is('menu1*')) ? 'active' : '' }}">
                <a href="#"> <i class="menu-icon fa fa-table"></i>Menu 1</a>
            </li>
            <li class="{{ (request()->is('menu2*')) ? 'active' : '' }}">
                <a href="#"> <i class="menu-icon fa fa-table"></i>Menu 2</a>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>