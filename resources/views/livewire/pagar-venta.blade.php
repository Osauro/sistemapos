<div class="row sales layouts-top-spacing mt-3" id="mostrar-fullscreen">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }}</b>
                </h4>
                <div>
                    <a href="{{ route('pos') }}" class="btn btn-dark p-2">
                        <i class="fa fa-store fa-fw"></i>
                    </a>
                </div>
            </div>
            <div class="widget-content">
                <table class="table">
                    <thead>
                        <th>Nombre</th>
                        <th width="150px" class="text-center">Precio</th>
                        <th width="250px" class="text-center">Cantidad</th>
                        <th width="150px" class="text-center">Subtotal</th>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->producto->nombre }}</td>
                                <td class="text-right">
                                    <span class="form-control">
                                        {{ $item->producto->precio }}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-sm btn-danger" wire:click="res({{ $item->id }})">
                                                @if ($item->cantidad > 1)
                                                    <i class="fa fa-minus"></i>
                                                @else
                                                    <i class="fa fa-trash"></i>
                                                @endif
                                            </button>
                                        </div>
                                        <input class="form-control text-right" type="number"
                                            value="{{ $item->cantidad }}" id="i{{ $item->id }}"
                                            wire:change="nuevaCantidad({{ $item->id }}, $('#i' + {{ $item->id }}).val())" onclick="this->select()" max="{{ $item->producto->stock }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-success"
                                                wire:click="add({{ $item->id }})">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <span class="form-control">
                                        {{ $item->subtotal }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row mb-3">
                    <div class="col-sm-4 mt-3">
                        <label for="">Efectivo:</label>
                        <input class="form-control text-right" type="number" wire:model="efectivo" min="0" id="efectivo" wire:change="nuevoEfectivo($('#efectivo').val())" wire:keydown.enter="pagar()">
                        @error('efectivo')
                            <span class="text-danger small er">
                                {{ $message }}
                            </span>
                        @endempty
                    </div>
                    <div class="col-sm-4 mt-3">
                        <label for="">Cambio:</label>
                        <input class="form-control text-right" type="number" wire:model="cambio" min="0">
                        @error('cambio')
                            <span class="text-danger small er">
                                {{ $message }}
                            </span>
                        @endempty
                    </div>
                    <div class="col-sm-4 mt-3">
                        <label for="">Total:</label>
                        <input class="form-control text-right" type="number" wire:model="total" min="0">
                        @error('total')
                            <span class="text-danger small er">
                                {{ $message }}
                            </span>
                        @endempty
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success mr-3" wire:click="pagar()">
                        <i class="fa fa-money"></i> Pagar
                    </button>
                    <button class="btn btn-danger" wire:click="cancelar()">
                        <i class="fa fa-close"></i> Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.addEventListener('noty', event => {
            $('#theModal').modal('hide');
            noty(event.detail.msg)
        })

        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show');
        });

        window.livewire.on('show-error', msg => {
            $('#theModal').modal('hide');
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: msg,
                showConfirmButton: false,
                timer: 800
            })
        });
    });
</script>
