 <main>
    <form action="/update/stock/{{ $detailData->id }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
         <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3 form">
                        <label for="exampleFormControlInput1" class="form-label heading">Nomor Part</label>
                        <input required="" class="input" type="number" name="no_sparepart" id="no_sparepart"
                            required value="{{ $detailData->no_sparepart }}" readonly />
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3 form">
                        <label for="exampleFormControlInput1" class="form-label heading">Nama Part</label>
                        <input required="" class="input" type="text" name="name" id="name"
                            placeholder="Spare Part" required value="{{ $detailData->sparepart->name }}" readonly />
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 form">
                        <label for="exampleFormControlInput1" class="form-label heading">Min Stock</label>
                        <input required="" class="input" type="number" name="min" id="min" value="{{ $detailData->min_stock }}"
                            required />
                    </div>  
                </div> <div class="col-6">
                    <div class="mb-3 form">
                        <label for="exampleFormControlInput1" class="form-label heading">Max Stock</label>
                        <input required="" class="input" type="number" name="max" id="max" value="{{ $detailData->max_stock }}"
                            required />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger">Delete</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <script>

    </script>
</main>