@extends('main')
@section('content')
<div class="container-fluid" id="isiModal">
    @include('partial.session')
    <div class="row mt-2 ">
        <div class="col-12">
            <div class="table-responsive">
                <table id="dataTraining" class="table table-bordered table-striped hover" style="background: transparent;">
                    <thead>
                        <th class="text-center">No Transaksi</th>
                        <th class="text-center">Jenis Transaksi</th>
                        <th class="text-center">Tanggal Transaksi</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1
                        @endphp
                        @foreach ($log as $item)
                            <tr >
                                <td class="text-center">{{ $item->no_transaction }}</td>
                                <td class="text-center">{{ $item->type }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }}</td>
                                <td class="text-center"><button class="btn btn-info" onclick="modalEdit({{ $item->no_transaction }})"><i class="fa fa-info"></i></button></td>
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
        <div class="modal-dialog modal-md border-0">
            <div class="modal-content">
                <form action="/add/stock" method="post" class="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header d-flex justify-content-between">
                        <h1 class="modal-title fs-5 heading" id="newTrainingLabel">Stok Masuk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 form">
                                    <label for="exampleFormControlInput1" class="form-label heading">Tanggal Transaksi</label>
                                    <input required="" class="input" type="date" name="date" id="date"
                                        required />
                                </div>
                            </div>
                            <div id="item" class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3 form">
                                            <label for="staticEmail2" class="form-label heading">Pilih Spare Part</label>
                                            <select class="form-select form-select-sm input" aria-label="Small select example" id="sparepart_1" name="no_sparepart[]" required>
                                                <option>-</option>
                                                @foreach ($data as $item)
                                                    <option value="{{ $item->no_sparepart }}">{{ $item->sparepart->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 form">
                                            <label for="exampleFormControlInput1" class="form-label heading">Jumlah Stok Masuk</label>
                                            <input required="" class="input" type="number" name="qty[]" id="qty_1"
                                                required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-success plus-sign" onclick=" addSectionName()"><i
                                        class="fa fa-plus"></i></button><button type="button" class="btn  plus-delete"
                                    onclick="deleteSectionName()"><i class="fa fa-minus"></i></button>
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

  <!-- Modal Add Training -->
    <div class="modal fade border-0" id="modalOut" tabindex="-1" aria-labelledby="modalOutLabel" aria-hidden="true">
    <div class="modal-dialog modal-md border-0">
        <div class="modal-content">
            <form action="/add/stock/out" method="post" class="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header d-flex justify-content-between">
                    <h1 class="modal-title fs-5 heading" id="newTrainingLabel">Stok Keluar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3 form">
                                <label for="exampleFormControlInput1" class="form-label heading">Tanggal Transaksi</label>
                                <input required="" class="input" type="date" name="date_out" id="date_out"
                                    required />
                            </div>
                        </div>
                        <div id="itemOut" class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3 form">
                                        <label for="staticEmail2" class="form-label heading">Pilih Spare Part</label>
                                        <select class="form-select form-select-sm input" aria-label="Small select example" id="sparepart_out_1" name="no_sparepart_out[]" required>
                                            <option>-</option>
                                            @foreach ($data as $item)
                                                <option value="{{ $item->no_sparepart }}">{{ $item->sparepart->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 form">
                                        <label for="exampleFormControlInput1" class="form-label heading">Jumlah Stok Keluar</label>
                                        <input required="" class="input" type="number" name="qty_out[]" id="qty_out_1"
                                            required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-success plus-sign" onclick="addStockOut()"><i
                                    class="fa fa-plus"></i></button><button type="button" class="btn  plus-delete"
                                onclick="deleteStockOut()"><i class="fa fa-minus"></i></button>
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
    
  <!-- Modal Edit-->
  <div class="modal fade border-0" id="editStock" tabindex="-1" aria-labelledby="detailTrainingLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-md border-0">
      <div class="modal-content">
          <div class="modal-header d-flex justify-content-between">
              <h1 class="modal-title fs-5 heading" id="body-editLabel">Detail Transaction</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="body-edit">
          </div>

      </div>
  </div>
</div>
<script>
    // Guidance Table
    var table = $('#dataTraining').DataTable({
    "dom": '<"d-flex justify-content-between"<"pull-left"l><"pull-left"f><"pull-right"B>>tip',
    buttons: [
            {
                text: 'Stock In (+)',
                className: 'btn btn-success mt-4 mx-1',
                action: function(e, dt, node, config) {
                    // Define what happens when the button is clicked
                    // window.location.href = '/detail/po';
                    $('#newTraining').modal('show');
                }
            },
            {
                text: 'Stock Out (-)',
                className: 'btn btn-danger mt-4 mx-1',
                action: function(e, dt, node, config) {
                    // Define what happens when the button is clicked
                    // You can add your own logic here
                    $('#modalOut').modal('show');
                }
            }
        ],
    });


        // Modal Edit Stock
        function modalEdit(id) {
            modalUrl = `/detail-modal/log-stock/${id}`;
            $('#editStock').modal('show');
            $('#body-edit').load(modalUrl);
        }

        let rowCounter = 1;
        
        function addSectionName() {
            rowCounter++;
            const newRow = `
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3 form">
                            <label for="staticEmail2" class="form-label heading">Pilih Spare Part</label>
                            <select class="form-select form-select-sm input" aria-label="Small select example" id="sparepart_${rowCounter}" name="no_sparepart[]" required>
                                <option>-</option>
                                @foreach ($data as $item)
                                    <option value="{{ $item->no_sparepart }}">{{ $item->sparepart->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 form">
                            <label for="exampleFormControlInput1" class="form-label heading">Jumlah Stok Masuk</label>
                            <input required="" class="input" type="number" name="qty[]" id="qty_${rowCounter}"
                                required />
                        </div>
                    </div>
                </div>
            `;
            document.getElementById('item').innerHTML += newRow;
        }
        
        function deleteSectionName() {
            const rows = document.getElementById('item').children;
            if (rows.length > 1) {
                rows[rows.length - 1].remove();
                rowCounter--;
            }
        }

        function addStockOut() {
            rowCounter++;
            const newRow = `
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3 form">
                            <label for="staticEmail2" class="form-label heading">Pilih Spare Part</label>
                            <select class="form-select form-select-sm input" aria-label="Small select example" id="sparepart_out_${rowCounter}" name="no_sparepart_out[]" required>
                                <option>-</option>
                                @foreach ($data as $item)
                                    <option value="{{ $item->no_sparepart }}">{{ $item->sparepart->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 form">
                            <label for="exampleFormControlInput1" class="form-label heading">Jumlah Stok Masuk</label>
                            <input required="" class="input" type="number" name="qty_out[]" id="qty_out_${rowCounter}"
                                required />
                        </div>
                    </div>
                </div>
            `;
            document.getElementById('itemOut').innerHTML += newRow;
        }
        
        function deleteStockOut() {
            const rows = document.getElementById('itemOut').children;
            if (rows.length > 1) {
                rows[rows.length - 1].remove();
                rowCounter--;
            }
        }

</script>
@endsection