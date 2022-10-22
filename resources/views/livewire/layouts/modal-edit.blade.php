<div wire:ignore.self class="modal fade" id="editKaryawanModal" tabindex="-1" data-backdrop="static"
  data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form wire:submit.prevent="update">
          <input type="hidden" wire:model="id">
          <div class="form-group row">
            <label for="name" class="col-4">Name</label>
            <div class="col-8">
              <input type="text" id="name" class="form-control" wire:model="name">
              @error('name')
              <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="pengalaman_kerja" class="col-4">Penglaman Kerja</label>
            <div class="col-8">
              <input type="text" id="pengalaman_kerja" class="form-control" wire:model="pengalaman_kerja">
              @error('pengalaman_kerja')
              <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="pendidikan" class="col-4">Pendidikan</label>
            <div class="col-8">
              <input type="text" id="pendidikan" class="form-control" wire:model="pendidikan">
              @error('pendidikan')
              <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="umur" class="col-4">Umur</label>
            <div class="col-8">
              <input type="text" id="umur" class="form-control" wire:model="umur">
              @error('umur')
              <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="status" class="col-4">Status</label>
            <div class="col-8">
              <input type="text" id="status" class="form-control" wire:model="status">
              @error('status')
              <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="alamat" class="col-4">Alamat</label>
            <div class="col-8">
              <input type="text" id="alamat" class="form-control" wire:model="alamat">
              @error('alamat')
              <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-4"></label>
            <div class="col-8">
              <button type="submit" class="btn btn-sm btn-primary">Edit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>