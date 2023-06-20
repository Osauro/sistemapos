                </div>
            </div>
            <div class="modal-footer mt-3" wire:loading.remove>
                <button type="button" wire:click.prevent="resetUI()" class="btn btn-light close-btn text-info" data-dismiss="modal">CERRAR</button>
                @if ($selected_id < 1)
                    <button type="button" wire:click.prevent="store()" class="btn btn-dark close-modal">GUARDAR</button>
                @else
                    <button type="button" wire:click.prevent="update()" class="btn btn-dark close-modal">ACTUALIZAR</button>
                @endif
            </div>
        </div>
    </div>
</div>
