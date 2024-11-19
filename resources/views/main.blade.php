<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manajemen Stok</title>
    <link rel="icon" href="/img/nm_title.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    {{-- <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="/css/style.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/boxicons-2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="/bootstrap-5/css/bootstrap.css">
    {{-- <script src="/bootstrap-5/js/bootstrap.js"></script> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    {{-- <script src="/js/jquery-3.7.1.min.js"></script> --}}
    <script src="/bootstrap-5/js/bootstrap.js"></script>
    {{-- <script src="/assets/js/popper.min.js"></script> --}}
    {{-- <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script> --}}

    <script src="/sweetalert2-11.11.0/package/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="/sweetalert2-11.11.0/package/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- Scaripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="/assets/js/main.js"></script>

    <script src="/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="/assets/js/init/datatables-init.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- <script src="https://unpkg.com/slim-select@latest/dist/slimselect.min.js"></script>
    <link href="https://unpkg.com/slim-select@latest/dist/slimselect.css" rel="stylesheet">
    </link> --}}
</head>

<body>
    @include('partial.sidebar')
    <div id="right-panel" class="right-panel">
        @include('partial.navbar')
        @include('partial.breadcrumbs')
        <div class="content w-100">
            @yield('content')
        </div>
    </div>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>
