
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addgallary">
    ADD IMAGE
</button>
<!-- Modal -->
<div class="modal fade" id="addgallary" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store.gallary') }}" class="row g-3 needs-validation" novalidate enctype="multipart/form-data"
                method="post">
                @csrf
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
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
