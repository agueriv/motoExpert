<div class="modal" id="deleteMotoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #1A1C24 !important">
            <div class="modal-header">
                <h5 class="modal-title">Delete moto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are u sure that u want to delete the model "<span id="motoBrandModel"></span>"?</p>
            </div>
            <form id="formDelete" action="{{ url('') }}" method="post">
                @csrf
                @method('delete')
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="formDelete" class="btn btn-danger">Delete model</button>
            </div>
        </div>
    </div>
</div>