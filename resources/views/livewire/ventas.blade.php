<div class="row sales layouts-top-spacing mt-3" id="mostrar-fullscreen">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }}</b>
                </h4>
                <div>
                    <a href="{{ route('pos') }}" class="btn btn-dark p-2">
                        <i class="fa fa-plus fa-fw"></i>
                    </a>
                </div>
            </div>
            @include('common.searchBox')
            <div class="widget-content">
                @if ($ventas->count())
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th width="10px">ID</th>
                                <th width="180px">FECHA</th>
                                <th>USUARIO</th>
                                <th class="text-right" width="100px">PRODUCTOS</th>
                                <th class="text-right" width="100px">EFECTIVO</th>
                                <th class="text-right" width="100px">CAMBIO</th>
                                <th class="text-right" width="100px">TOTAL</th>
                                <th class="text-right" width="100px">ACCION</th>
                            </thead>
                            <tbody>
                                @foreach ($ventas as $venta)
                                    <tr>
                                        <td>{{ $venta->id }}</td>
                                        <td>{{ $venta->created_at->format('d-M-Y') }}</td>
                                        <td>{{ $venta->user->name }}</td>
                                        <td class="text-right">{{ $venta->items->sum('cantidad') }}</td>
                                        <td class="text-right">{{ $venta->efectivo }}</td>
                                        <td class="text-right">{{ $venta->cambio }}</td>
                                        <td class="text-right">{{ $venta->total }}</td>
                                        <td class="text-right">
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-dark btn-sm p-2"
                                                    wire:click="ver({{ $venta->id }})">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <button class="btn btn-primary btn-sm p-2"
                                                    wire:click="edit({{ $venta->id }})">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $ventas->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if ($venta_ver)
        @include('livewire.ventasVer')
    @endif
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
    });
</script>
