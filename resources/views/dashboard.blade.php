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
        @include('partial.session')
        <div class="row">
            <div class="col-4">
                <div class="card w-75 h-100">
                    <div class="card-header d-flex justify-content-center">
                        <p>Jumlah Transaksi Bulan ini</p>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <h1>{{ $dataTransaction->count() }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card w-75 h-100">
                    <div class="card-header d-flex justify-content-center">
                        <p>Jumlah Transaksi Masuk Bulan Ini</p>
                        <i class="fa fa-arrow-down" style="color: yellowgreen"></i>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <h1>{{ $stockIn->count() }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card w-75 h-100">
                    <div class="card-header d-flex justify-content-center">
                        <p>Jumlah Transaksi Keluar Bulan Ini</p>
                        <i class="fa fa-arrow-up" style="color: red"></i>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <h1>{{ $stockOut->count() }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12">
                <div class="row">
                    <div class="col-auto">
                        <h5 class="mb-2 fw-bold">Top Stock In</h5>
                    </div>
                   <div class="col-auto d-flex align-items-top justify-content-start">
                        <i class="fa fa-arrow-down" style="color: yellowgreen"></i>
                   </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th class="text-center">Part</th>
                        <th class="text-center">Stock Flow</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($topInParts as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $item->sparepart->name }}</td>
                                <td>{{ $item->total_qty }}</td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-12 mt-3">
                <div class="row d-flex justify-content-start">
                    <div class="col-auto">
                        <h5 class="mb-2 fw-bold">Top Stock Out</h5>
                    </div>
                   <div class="col-auto d-flex align-items-top justify-content-start">
                        <i class="fa fa-arrow-up" style="color: red"></i>
                   </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th class="text-center">Part</th>
                        <th class="text-center">Stock Flow</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($topOutParts as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $item->sparepart->name }}</td>
                                <td>{{ $item->total_qty }}</td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
