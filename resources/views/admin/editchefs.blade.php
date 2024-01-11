
<!-- Modal -->
<div class="modal fade" id="editchef-{{$chef->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu Ietm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.chefs',['id'=>$chef->id]) }}" class="row g-3 needs-validation" novalidate enctype="multipart/form-data"
                method="post">
                @method('PUT') 
                @csrf
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Name</label>
                    <input value="{{$chef->name}}" name="name" type="text" class="form-control" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Rank</label>
                    <input name="rank" value="{{$chef->rank}}" type="text" class="form-control" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    @error('rank')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Details</label>
                    <input name="details" value="{{$chef->details}}" type="text" class="form-control" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    @error('details')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Image</label>
                    <input name="path"  type="file" class="form-control" aria-label="file example" required>
                    <div class="invalid-feedback">Example invalid form file feedback</div>
                    <br>
                    <a href="{{ asset('storage/' . $chef->path) }}" class="glightbox"><img
                        width="70" height="70"  src="{{ asset('storage/' . $chef->path) }}"
                            class="menu-img img-fluid" alt=""></a>
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