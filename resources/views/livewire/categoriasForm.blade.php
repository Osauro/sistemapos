@include('common.modalHeader')
<div class="col-sm-12 mt-3">
    <label for="">Nombre:</label>
    <input class="form-control" type="text" wire:model="nombre">
    @error('nombre')
        <span class="text-danger small er">
            {{ $message }}
        </span>
    @endempty
</div>
<div class="col-sm-12 mt-3">
    <label>Imagen:</label>
    <div class="form-group custom-file">
        <div class="input-group-prepend">
            <input class="form-control custom-file-input" type="file" wire:model.lazy="imagen" accept="image/x-png, image/gif, image/jpeg">
            <label class="custom-file-label">Imagen: {{ $imagen }}</label>
        </div>
    </div>
    @error('imagen')
        <span class="text-danger small er">
            {{ $message }}
        </span>
    @endempty
</div>
@include('common.modalFooter')
