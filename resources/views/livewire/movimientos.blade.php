<div class="row sales layouts-top-spacing mt-3">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }}</b>
                </h4>
                <div>
                    <a href="javascript:void(0)" class="btn btn-dark p-2" data-toggle="modal" data-target="#theModal">
                        <i class="fa fa-plus fa-fw"></i>
                    </a>
                </div>
            </div>
            @include('common.searchBox')
            <div class="widget-content">
                @if ($movimientos->total())
                    <div class="table-responsive">
                        <table class="table table-hover mt-1">
                            <thead>
                                <th class="text-center" width="50px">#</th>
                                <th width="100px">USUARIO</th>
                                <th>DETALLE</th>
                                <th width="100px" class="text-right">INGRESO</th>
                                <th width="100px" class="text-right">EGRESO</th>
                                <th width="100px" class="text-right">SALDO</th>
                            </thead>
                            <tbody>
                                @foreach ($movimientos as $movimiento)
                                    <tr>
                                        <td>
                                            {{ str_pad($movimiento->id, 4, '0', STR_PAD_LEFT) }}
                                        </td>
                                        <td>
                                            {{ $movimiento->user->name }}
                                        </td>
                                        <td>
                                            {{ $movimiento->detalle }}
                                        </td>
                                        <td class="text-right">
                                            {{ $movimiento->ingreso }}
                                        </td>
                                        <td class="text-right">
                                            {{ $movimiento->egreso }}
                                        </td>
                                        <td class="text-right">
                                            {{ $movimiento->saldo }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $movimientos->links() }}
                    </div>
                @else
                    <h1 class="text-center">
                        No se encontraron resultados...
                    </h1>
                @endif
            </div>
        </div>
    </div>
    @include('livewire.movimientosForm')
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show');
        });
        window.addEventListener('noty', event => {
            $('#theModal').modal('hide');
            noty(event.detail.msg)
        })

        window.livewire.on('show-success', msg => {
            $('#theModal').modal('hide');
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: msg,
                showConfirmButton: false,
                timer: 1500
            })
        });

        window.livewire.on('show-error', msg => {
            $('#theModal').modal('hide');
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: msg,
                showConfirmButton: false,
                timer: 1500
            })
        });
    });
</script>
