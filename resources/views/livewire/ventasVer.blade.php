<div wire:ignore.self class="modal fade" id="theModal" tabindex="-1" role="dialog" aria-labelledby="theModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #3b3f5c">
                <h5 class="modal-title text-white" id="theModalLabel">
                    Venta Folio #{{ $venta_ver->id }}
                </h5>
                <button class="btn btn-dark p2" data-dismiss="modal">
                    <i class="fa fa-close text-white"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <th>Producto</th>
                            <th class="text-right" width="100px">Precio</th>
                            <th class="text-right" width="100px">Cantidad</th>
                            <th class="text-right" width="100px">Subtotal</th>
                        </thead>
                        <tbody>
                            @foreach ($venta_ver->items as $item)
                                <tr>
                                    <td>{{ $item->producto->nombre }}</td>
                                    <td class="text-right">{{ $item->producto->precio }}</td>
                                    <td class="text-right">{{ $item->cantidad }}</td>
                                    <td class="text-right">{{ $item->subtotal }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="text-right" colspan="3"><strong>TOTAL:</strong></td>
                                <td class="text-right">{{ $venta_ver->total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <span>Usuario: {{ $venta_ver->user->name }}</span>
                <span>Folio # {{ str_pad($venta_ver->id, 6, '0', STR_PAD_LEFT) }}</span>
                <span><i class="fa fa-calendar"></i> {{ $venta_ver->created_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>
</div>
