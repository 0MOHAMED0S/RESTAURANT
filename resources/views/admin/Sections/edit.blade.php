<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#active2-{{$section->id}}">
    Edit SECTION
</button>
<!-- Modal -->
<div class="modal fade" id="active2-{{$section->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.section',['id'=>$section->id])}}"  class="row g-3 needs-validation" novalidate enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Name Of Section</label>
                        <input value="{{$section->name}}" name="name" type="text" class="form-control" id="validationCustom01" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
