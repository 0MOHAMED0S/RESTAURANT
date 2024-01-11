<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#contactus">
    EDIT 
</button>
<!-- Modal -->
<div class="modal fade" id="contactus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form style="    display: contents; " action="{{route('update.contactus',['id'=>$contactus->id])}}"  class="row g-3 needs-validation" novalidate enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT') 
                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label">Map Link</label>
                        <textarea name="link" class="form-control" id="validationTextarea" placeholder="Required example textarea" required>
                            {{$contactus->link}}
                        </textarea>
                        <div class="invalid-feedback">
                            Please enter a message in the textarea.
                        </div>
                        @error('link')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Address</label>
                        <input name="address" type="text" class="form-control" id="validationCustom01" value="{{$contactus->address}}" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="validationCustom01" value="{{$contactus->email}}" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Number</label>
                        <input name="number" type="text" class="form-control" id="validationCustom01" value="{{$contactus->number}}" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Openning Hours</label>
                        <input name="opening_hour" type="text" class="form-control" id="validationCustom01" value="{{$contactus->opening_hour}}" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('opening_hour')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Facebook Link</label>
                        <input name="facebook" type="text" class="form-control" id="validationCustom01" value="{{$contactus->facebook}}" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('facebook')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Instgram Link</label>
                        <input name="instgram" type="text" class="form-control" id="validationCustom01" value="{{$contactus->instgram}}" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('instgram')
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
