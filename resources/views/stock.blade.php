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

<script>
    // Guidance Table
    var table = $('#dataTraining').DataTable({
    "dom": '<"d-flex justify-content-between"<"pull-left"l><"pull-left"f><"pull-right"B>>tip',
        // buttons: [{
        //     text: 'Stock In (+)',
        //     className: 'btn btn-success mt-4', // Customize button style
        //     action: function(e, dt, node, config) {
        //         // Define what happens when the button is clicked
        //         // window.location.href = '/detail/po';
        //         $('#newTraining').modal('show');
        //     }
        // }],
    });

        // // Modal Edit Stock
        function modalEdit(id) {
            modalUrl = `/edit/stock/${id}`;
            $('#editStock').modal('show');
            $('#body-edit').load(modalUrl);
        }

</script>
@endsection