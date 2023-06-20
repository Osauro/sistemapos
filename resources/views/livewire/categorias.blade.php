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
                @if ($categorias->total())
                <div class="table-responsive">
                    <table class="table table-hover mt-1">
                        <thead>
                            <th class="text-center" width="50px">#</th>
                            <th>NOMBRE</th>
                            <th width="100px">IMAGEN</th>
                            <th width="100px" class="text-center">ACCION</th>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td>
                                        {{ str_pad($categoria->id, 4, '0', STR_PAD_LEFT) }}
                                    </td>
                                    <td>
                                        {{ $categoria->nombre }}
                                    </td>
                                    <td>
                                        <img src="{{ $categoria->photo_url }}" alt="" width="50"
                                            height="50">
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-dark p-2 mtmobile"
                                            wire:click="edit({{ $categoria->id }})"><i class="fa fa-edit fa-fw"></i></button>
                                        @if ($categoria->deleted_at)
                                            <button class="btn btn-sm btn-dark p-2 mtmobile"
                                                wire:click="restore({{ $categoria->id }})"><i
                                                    class="fa fa-check fa-fw"></i></button>
                                        @else
                                            <button class="btn btn-sm btn-dark p-2 mtmobile"
                                                wire:click="destroy({{ $categoria->id }})"><i
                                                    class="fa fa-ban fa-fw"></i></button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categorias->links() }}
                </div>
                @else
                    <h1 class="text-center">
                        No se encontraron resultados...
                    </h1>
                @endif
            </div>
        </div>
    </div>
    @include('livewire.categoriasForm')
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
