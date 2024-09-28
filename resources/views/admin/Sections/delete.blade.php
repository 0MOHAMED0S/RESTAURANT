<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$section->id}}">
    DEL
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal-{{$section->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('destroy.section',['id'=>$section->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <h4>ARE YOU SURE DELETE <span style="color: red"><b>{{$section->name}}</b></span></h4>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
