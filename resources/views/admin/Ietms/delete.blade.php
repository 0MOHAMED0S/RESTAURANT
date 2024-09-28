<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$ietm->id}}">
    DEL
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal-{{$ietm->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Ietm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('destroy.ietm',['id'=>$ietm->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <h5>ARE YOU SURE DELETE <span style="color: red">{{$ietm->name}}</span></h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
