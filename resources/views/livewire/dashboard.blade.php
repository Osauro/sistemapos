<div class="row sales layouts-top-spacing mt-3" id="mostrar-fullscreen">
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
    });
</script>
