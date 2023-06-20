<div class="row sales layouts-top-spacing mt-3" id="mostrar-fullscreen">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }}</b>
                </h4>
                <div>
                    <a href="javascript:void(0)" class="btn btn-dark p-2" data-toggle="modal" data-target="#theModal" wire:click="resetUI()">
                        <i class="fa fa-plus fa-fw"></i>
                    </a>
                </div>
            </div>
            @include('common.searchBox')
            <div class="widget-content">
                @if ($usuarios->total())
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th width="100px">Celular</th>
                                <th width="100px">Tipo</th>
                                <th width="10px">Acción</th>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->celular }}</td>
                                        <td>{{ $usuario->tipo }}</td>
                                        <td class="text-right">
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-primary btn-sm p-2" wire:click="edit({{ $usuario->id }})">
                                                    <i class="fa-solid fa-user-pen"></i>
                                                </button>
                                                @if ($usuario->id > 1)
                                                    <button class="btn btn-danger btn-sm p-2" wire:click="destroy({{ $usuario->id }})">
                                                        <i class="fa-solid fa-user-xmark"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <h1 class="text-center">No se encontraron resultado...</h1>
                @endif
            </div>
        </div>
    </div>
    @include('livewire.usuariosForm')
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
    });
</script>
