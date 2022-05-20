<nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="{{ (request()->is('home')) ? 'active' : '' }}">
                <a href="{{ route('home') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
            </li>
            <li class="menu-title">Module</li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="menu-icon fa fa-th"></i>Master</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-table"></i><a href="{{ route('dompet.index') }}">Dompet</a></li>
                    <li><i class="fa fa-table"></i><a href="{{ route('category.index') }}">Kategori</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="menu-icon fa fa-bar-chart"></i>Transaksi</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-table"></i><a href="{{ route('dompetmasuk.index') }}">Dompet Masuk</a></li>
                    <li><i class="fa fa-table"></i><a href="{{ route('dompetkeluar.index') }}">Dompet Keluar</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="menu-icon ti-email"></i>Laporan</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-table"></i><a href="{{ route('laporan.index') }}">Laporan Transaksi</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>