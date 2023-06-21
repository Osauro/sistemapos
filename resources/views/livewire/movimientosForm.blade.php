@include('common.modalHeader')
<div class="col-sm-12 mt-3">
    <label for="">Detalle:</label>
    <input class="form-control" type="text" wire:model="detalle">
    @error('detalle')
        <span class="text-danger small er">
            {{ $message }}
        </span>
    @endempty
</div>
<div class="col-sm-6 mt-3">
    <label for="">Tipo:</label>
    <select class="form-control" wire:model="tipo">
        <option>Seleccione...</option>
        <option value="Ingreso">Ingreso</option>
        <option value="Egreso">Egreso</option>
    </select>
    @error('tipo')
        <span class="text-danger small er">
            {{ $message }}
        </span>
    @endempty
</div>
<div class="col-sm-6 mt-3">
    <label for="">Monto:</label>
    <input class="form-control" type="number" wire:model="monto" min="0">
    @error('monto')
        <span class="text-danger small er">
            {{ $message }}
        </span>
    @endempty
</div>
@include('common.modalFooter')
