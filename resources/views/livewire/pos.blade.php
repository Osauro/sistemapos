<div class="row sales layouts-top-spacing mt-3" id="mostrar-fullscreen">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            @include('common.searchBox')
            <div class="widget-content">
                @if ($productos->total())
                <div class="row">
                    @foreach ($productos as $producto)
                        <div class="col-6 col-md-2 item pt-3 pb-3 animete__animated animate__pulse"
                            wire:click="addItem({{ $producto->id }})">
                            <img src="{{ $producto->photo_url }}" alt="{{ $producto->nombre }}" class="img img-fluid">

                            <div class="d-flex justify-content-end">
                                <span class="position-absolute w-50 mt-n4">
                                    <h6 class="badge badge-dark w-100 text-white">
                                        {{ $producto->precio }} <strong>Bs.</strong>
                                    </h6>
                                </span>
                            </div>

                            <div class="mt-2 text-center text-truncate">
                                <strong>
                                    {{ $producto->nombre }}
                                </strong>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                    <h1 class="text-center">No se encontraron resultados...</h1>
                @endif
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

        window.livewire.on('show-success', msg => {
            $('#theModal').modal('hide');
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: msg,
                showConfirmButton: false,
                timer: 800
            })
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
