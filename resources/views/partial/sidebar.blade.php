<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav mt-3">
                {{-- @if (Auth::user()->departement == 'HC & GA')
                    <li class="active">
                        <a href="/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard Skill Map</a>
                    </li>
                    <li class="menu-title">Skill Map</li>
                    <li>
                        <a href="/home-admin">
                            <i class="menu-icon fa fa-home"></i>Home
                        </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Master Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="fa fa-user"></i><a href="/data-karyawan" class="ms-1">Kelola Karyawan</a>
                            </li>
                            <li>
                                <i class="fa fa-users"></i><a href="/data-section" class="ms-1">Kelola Section</a>
                            </li>
                            <li>
                                <i class="fa fa-sitemap"></i><a href="/data-departement" class="ms-1">Kelola
                                    Departement</a>
                            </li>
                            <li>
                                <i class="fa fa-bullseye"></i><a href="/data-skill" class="ms-1">Kelola Skill</a>
                            </li>
                            <li>
                                <i class="fa fa-book"></i><a href="/data-training" class="ms-1">Kelola Training</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/Menu-skill-map">
                            <i class="menu-icon fa fa-star"></i>Skill Map Karyawan
                        </a>
                    </li>
                    <li class="menu-title">Jurnal Karyawan Baru</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Master Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="fa fa-user-plus"></i><a href="/data-karyawan-baru" class="ms-1">Karyawan
                                    Baru</a>
                            </li>
                            <li>
                                <i class="fa fa-info"></i><a href="/data-informasi" class="ms-1">Kelola
                                    Informasi</a>
                            </li>
                            <li>
                                <i class="fa fa-book"></i><a href="/data-training-ojt" class="ms-1">Training &
                                    Silabus</a>
                            </li>
                            <li>
                                <i class="fa fa-users"></i><a href="/data-trainer" class="ms-1">Trainer dan
                                    Mentor</a>
                            </li>
                            <li>
                                <i class="fa fa-users"></i><a href="/data-kriteria-poin" class="ms-1">Kriteria
                                    Poin</a>
                            </li>
                            <li>
                                <i class="fa fa-users"></i><a href="/data-guidance" class="ms-1">Guidance &
                                    Ck. Point</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/review-activities">
                            <i class="menu-icon fa fa-users"></i>Review Aktivitas
                        </a>
                    </li>
                    <li>
                        <a href="/class-training">
                            <i class="menu-icon fa fa-book"></i>Training Class
                        </a>
                    </li>
                @elseif(Auth::user()->departement != 'HC & GA' && Auth::user()->role == '4')
                    <li class="menu-title">Menu</li><!-- /.menu-title -->
                    <li>
                        <a href="/home">
                            <i class="menu-icon fa fa-home"></i>Home
                        </a>
                    </li>
                    <li>
                        <a href="/Menu-skill-map">
                            <i class="menu-icon fa fa-star"></i>Skill Map Karyawan
                        </a>
                    </li>
                @elseif(Auth::user()->departement != 'HC & GA' && Auth::user()->role == '5')
                    <li class="menu-title">Menu</li><!-- /.menu-title -->
                    <li>
                        <a href="/home">
                            <i class="menu-icon fa fa-home"></i>Home
                        </a>
                    </li>
                    <li>
                        <a href="/Menu-skill-map">
                            <i class="menu-icon fa fa-star"></i>Skill Map Karyawan
                        </a>
                    </li>
                @endif --}}
                <li>
                    <a href="/">
                        <i class="menu-icon fa fa-home"></i>Dashboard</a>
                </li>
                <li>
                    <a href="/master-data/sparepart">
                        <i class="menu-icon fa fa-database"></i>Master Data Spare Part
                    </a>
                </li>
                <li>
                    <a href="/stock">
                        <i class="menu-icon fa fa-gears"></i>Stock
                    </a>
                </li>
                <li>
                    <a href="/log-stock">
                        <i class="menu-icon fa fa-book"></i>Log Stock
                    </a>
                </li>
                
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
