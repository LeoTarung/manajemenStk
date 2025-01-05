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
        <div class="row mt-2 ">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="dataTraining" class="table table-bordered table-striped hover" style="background: transparent;">
                        <thead>
                            <th class="text-center">No Spare Part</th>
                            <th class="text-center">Nama Spare Part</th>
                            <th class="text-center">Price</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr onclick="modalDetail({{ $item->no_part }})">
                                    <td class="text-center">{{ $item->no_part }}</td>
                                    <td class="text-center">{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Add Training -->
    <div class="modal fade border-0" id="newTraining" tabindex="-1" aria-labelledby="newTrainingLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg border-0">
            <div class="modal-content">
                <form action="/add/SparePart" method="post" class="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header d-flex justify-content-between">
                        <h1 class="modal-title fs-5 heading" id="newTrainingLabel">Spare Part Baru</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 form">
                                    <label for="exampleFormControlInput1" class="form-label heading">Nomor Part</label>
                                    <input required="" class="input" type="number" name="kode_part" id="kode_part"
                                        required readonly />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 form">
                                    <label for="exampleFormControlInput1" class="form-label heading">Nama Part</label>
                                    <input required="" class="input" type="text" name="name" id="name"
                                        placeholder="Spare Part" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 form">
                                    <label for="exampleFormControlInput1" class="form-label heading">Price</label>
                                    <input required="" class="input" type="number" name="price" id="price"
                                        required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Detail Training -->
    <div class="modal fade border-0" id="detailTraining" tabindex="-1" aria-labelledby="detailTrainingLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md border-0">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h1 class="modal-title fs-5 heading" id="detailTrainingLabel">Detail Spare Part</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="body-detail">
                </div>

            </div>
        </div>
    </div>
    @php
    if ($lastData != null) {
        $noPart = $lastData->no_part;
    } else {
        $noPart = 0;
    }
        
    @endphp
    <script>
        // Guidance Table
        var table = $('#dataTraining').DataTable({
            "dom": '<"d-flex justify-content-between"<"pull-left"l><"pull-left"f><"pull-right"B>>tip',
            buttons: [{
                text: '+',
                className: 'btn btn-success mt-4', // Customize button style
                action: function(e, dt, node, config) {
                    // Define what happens when the button is clicked
                    // window.location.href = '/detail/po';
                    $('#newTraining').modal('show');
                }
            }],
        });

        var lastNoPart = {{ $noPart }};
        var kodePart = String(lastNoPart + 1).padStart(5, '1');
        document.getElementById('kode_part').value = kodePart;

        console.log(lastNo);
        
        // // Modal Detail Training
        function modalDetail(id) {
            modalUrl = `/detail-modal/sparepart/${id}`;
            $('#detailTraining').modal('show');
            $('#body-detail').load(modalUrl);
        }
    </script>
@endsection
