<div wire:ignore.self class="modal fade" id="deleteKaryawanModal" tabindex="-1" data-backdrop="static"
  data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pt-4 pb-4">
        <h6>Are you sure? You want to delete this student data!</h6>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal"
          aria-label="Close">Cancel</button>
        <button class="btn btn-sm btn-danger" wire:click="destroy()">Yes! Delete</button>
      </div>
    </div>
  </div>
</div>