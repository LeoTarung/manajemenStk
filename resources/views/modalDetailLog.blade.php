<main>
    <form action="/update/SparePart/{{ $dataTransaction->no_transaction }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
         {{-- <div class="modal-body">
            @csrf --}}
            <div class="row">
                <div class="col-6">
                    <div class="mb-2 form">
                        <label for="exampleFormControlInput1" class="form-label heading" style="color: #262626">Nomor Transaksi</label>
                        <p class="ms-1">{{ $dataTransaction->no_transaction }}</p>
                        {{-- <input required="" class="input" type="number" name="kode_part" id="kode_part"
                            required value="{{ $dataTransaction->no_transaction }}" /> --}}
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <div class="mb-3 form text-end">
                        {{-- <div class=""> --}}
                            <label for="exampleFormControlInput1" class="form-label heading" style="color: #262626">Date</label>
                        {{-- </div> --}}
                        {{-- <div class=""> --}}
                            {{-- <input required="" class="input" type="date" name="date" id="date"
                                 required value="{{ $dataTransaction->date }}"  /> --}}
                            <p >{{ \Carbon\Carbon::parse($dataTransaction->date)->format('d-m-Y') }}</p>
                        {{-- </div> --}}
                      
                    </div>
                </div>
                <div class="col-12">
                    <div class="mt-1 form">
                        <label for="exampleFormControlInput1" class="form-label heading mb-2    " style="color: #262626">Detail Part</label>
                       
                        <div class="row px-3">
                            <table id="dataTraining" class="table table-bordered table-striped hover">
                                <thead>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jumlah</th>
                                </thead>
                                <tbody>
                                    @php
                                    // dd($detail->sparepart);
                                    $no = 1;
                                    @endphp
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>{{ $no }}.</td>
                                            <td>{{ $detail->sparepart->name }}</td>
                                            <td>{{ $detail->qty }}</td>
                                        </tr>
                                        @php
                                        $no = $no + 1;
                                        @endphp
                                     @endforeach
                                </tbody>
                            </table>

                        </div>
                      
                
                    </div>
                  
                </div>
            {{-- </div> --}}
        </div>
        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-danger">Delete</button>
            <button type="submit" class="btn btn-primary">Submit</button> --}}
        </div>
    </form>
    <script>

    </script>
</main>