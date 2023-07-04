    <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
        <a href="{{ $carrito ? route('pagar-venta') : '#' }}" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-shopping-cart">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            @if ($carrito > 0)
                <div class="badge badge-dark">{{ $carrito }}</div>
            @endif
        </a>
    </li>
