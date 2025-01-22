@extends('main')
@section('content')
    <style>
        table {
            font-size: 13px;
        }

        td {    
            text-align: center;
            white-space: nowrap;
            cursor: pointer;
        }
    </style>

    <div class="container-fluid" id="isiModal">
        {{-- <div class="row d-flex justify-content-center mt-2">
    <div class="col-6 text-center">
        <h2>Data Karyawan</h2>
    </div>
</div> --}}
        @include('partial.session')
    </div>
@endsection
