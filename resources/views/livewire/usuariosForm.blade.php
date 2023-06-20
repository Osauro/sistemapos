@include('common.modalHeader')
<div class="col-sm-6 mt-3">
    <label for="">Nombre:</label>
    <input class="form-control" type="text" wire:model.lazy="name">
    @error('name')
        <span class="text-danger small er">
            {{ $message }}
        </span>
    @endempty
</div>
<div class="col-sm-6 mt-3">
    <label for="">Correo electrónico:</label>
    <input class="form-control" type="email" wire:model.lazy="email">
    @error('email')
        <span class="text-danger small er">
            {{ $message }}
        </span>
    @endempty
</div>
<div class="col-sm-6 mt-3">
    <label for="">Celular:</label>
    <input class="form-control" type="number" min="60000000" max="79999999" wire:model.lazy="celular">
    @error('celular')
        <span class="text-danger small er">
            {{ $message }}
        </span>
    @endempty
</div>
<div class="col-sm-6 mt-3">
    <label for="">Tipo:</label>
    <select class="form-control" wire:model.lazy="tipo">
        <option>Seleccione...</option>
        <option value="Cajero">Cajero</option>
        <option value="Admin">Admin</option>
    </select>
    @error('tipo')
        <span class="text-danger small er">
            {{ $message }}
        </span>
    @endempty
</div>
@include('common.modalFooter')
