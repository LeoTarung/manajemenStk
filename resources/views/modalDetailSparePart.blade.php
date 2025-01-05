<main>
    <form action="/update/SparePart/{{ $detailData->no_part }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
         <div class="modal-body">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="mb-3 form">
                        <label for="exampleFormControlInput1" class="form-label heading">Nomor Part</label>
                        <input required="" class="input" type="number" name="kode_part" id="kode_part"
                            required value="{{ $detailData->no_part }}" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3 form">
                        <label for="exampleFormControlInput1" class="form-label heading">Nama Part</label>
                        <input required="" class="input" type="text" name="name" id="name"
                            placeholder="Spare Part" required value="{{ $detailData->name }}" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3 form">
                        <label for="exampleFormControlInput1" class="form-label heading">Price</label>
                        <input required="" class="input" type="number" name="price" id="price" value="{{ $detailData->price }}"
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