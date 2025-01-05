@extends('main')
@section('content')
<div class="container-fluid" id="isiModal">
    @include('partial.session')
    <div class="row mt-2 ">
        <div class="col-12">
            <div class="table-responsive">
                <table id="dataTraining" class="table table-bordered table-striped hover" style="background: transparent;">
                    <thead>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Spare Part</th>
                        <th class="text-center">Min</th>
                        <th class="text-center">Max</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1
                        @endphp
                        @foreach ($data as $item)
                            <tr onclick="modalDetail({{ $item->id }})">
                                <td class="text-center">{{ $item->no_sparepart }}</td>
                                <td class="text-center">{{ $item->sparepart->name }}</td>
                                <td class="text-center">{{ $item->min_stock }}</td>
                                <td class="text-center">{{ $item->max_stock }}</td>
                                <td class="text-center">{{ $item->current_capacity  }}</td>
                                <td class="text-center"><button class="btn btn-warning" onclick="modalEdit({{ $item->id }})"><i class="fa fa-edit"></i></button></td>
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
                                <label for="staticEmail2" class="form-label heading">Pilih Spare Part</label>
                                <select class="form-select form-select-sm input" aria-label="Small select example" id="sparepart" name="no_sparepart" required>
                                    <option>-</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->no_sparepart }}">{{ $item->sparepart->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3 form">
                                <label for="exampleFormControlInput1" class="form-label heading">Jumlah Stok Masuk</label>
                                <input required="" class="input" type="number" name="qty" id="qty"
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
  <!-- Modal Edit-->
  <div class="modal fade border-0" id="editStock" tabindex="-1" aria-labelledby="detailTrainingLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-md border-0">
      <div class="modal-content">
          <div class="modal-header d-flex justify-content-between">
              <h1 class="modal-title fs-5 heading" id="body-editLabel">Edit</h1>
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
        buttons: [{
            text: 'Stock In (+)',
            className: 'btn btn-success mt-4', // Customize button style
            action: function(e, dt, node, config) {
                // Define what happens when the button is clicked
                // window.location.href = '/detail/po';
                $('#newTraining').modal('show');
            }
        }],
    });

        // // Modal Edit Stock
        function modalEdit(id) {
            modalUrl = `/edit/stock/${id}`;
            $('#editStock').modal('show');
            $('#body-edit').load(modalUrl);
        }
</script>
@endsection