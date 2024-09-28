
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addietm">
    ADD IETM
</button>
<!-- Modal -->
<div class="modal fade" id="addietm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Menu Ietm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store.ietm') }}" class="row g-3 needs-validation" novalidate enctype="multipart/form-data"
                method="post">
                @csrf
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="validationServer04" class="form-label">Section</label>
                    <select name="section_id" class="form-select isvalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                        @foreach ($sections as $section)
                            <option value="{{$section->id}}">{{$section->name}}</option>
                        @endforeach
                    </select>
                    <div id="validationServer04Feedback" class="invalid-feedback">
                        Please select a valid state.
                    </div>
                    @error('section_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Details</label>
                    <input name="details" type="text" class="form-control" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    @error('details')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Price</label>
                    <input name="price" type="number" class="form-control" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Image</label>
                    <input name="path" type="file" class="form-control" aria-label="file example" required>
                    <div class="invalid-feedback">Example invalid form file feedback</div>
                    <br>
                    @error('path')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
