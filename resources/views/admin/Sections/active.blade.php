
<button type="button"  data-bs-toggle="modal" data-bs-target="#active-{{$section->id}}">
    <div class="green-radio "></div>
</button>
<!-- Modal -->
<div class="modal fade" id="active-{{$section->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Active Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('active.section') }}" class="row g-3 needs-validation" novalidate enctype="multipart/form-data" method="post">
                    @csrf
                        <div style="justify-content: center;display:flex;gap:20px;" class="form-check">
                            <input hidden
                                type="text"
                                class="form-check-input"
                                id="validationFormCheck"
                                name="active_section_id"
                                value="{{ $section->id }}"
                                {{ $section->active == 1 ? 'checked' : '' }}
                            >
                            <h4>ARE YOU SURE ACTIVE <span style="color: red"><b>{{$section->name}}</b></span></h4>
                        </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Active</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
