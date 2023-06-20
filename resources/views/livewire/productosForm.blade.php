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
<div class="col-sm-6 mt-3">
    <label for="">Categoria:</label>
    <select class="form-control" wire:model="categoria_id">
        <option>Seleccione...</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
        @endforeach
    </select>
    @error('categoria_id')
        <span class="text-danger small er">
            {{ $message }}
        </span>
    @endempty
</div>
<div class="col-sm-6 mt-3">
    <label for="">Precio:</label>
    <input class="form-control" type="number" wire:model="precio" min="0">
    @error('precio')
        <span class="text-danger small er">
            {{ $message }}
        </span>
    @endempty
</div>
<div class="col-sm-12 mt-3">
    <label for="">Detalle:</label>
    <textarea class="form-control" cols="30" rows="10" wire:model="detalle">

    </textarea>
    @error('detalle')
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
