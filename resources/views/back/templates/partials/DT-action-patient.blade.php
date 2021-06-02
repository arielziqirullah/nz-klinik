<button type="button" class="btn btn-warning" data-toggle="modal" id="modal" data-id="{{ $model->id }}" data-target="#exampleModalCenter"><i class="fas fa-eye"></i></button>
{{-- <button class="btn btn-danger" id="delete" data-id="{{ $model->id }}"><i class="fa fa-trash"></i></button> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Keluhan Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group" id="list-complaints">
                    {{-- <li class="list-group-item">{{ $model-> }}</li> --}}
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

