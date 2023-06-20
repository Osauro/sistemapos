<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <ul class="navbar-item flex-row">
            <li class="nav-item theme-logo">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('storage/images/favicon.png') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
        </ul>

        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>

        <ul class="navbar-item flex-row search-ul">

        </ul>

        <ul class="navbar-item flex-row navbar-dropdown">
            <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user text-dark"></i>
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <img src="{{ Auth::user()->profile_photo_url }}" class="img-fluid mr-2" alt="avatar">
                            <div class="media-body">
                                <h5 class="text-truncate">{{ Auth()->user()->name }}</h5>
                                <p>{{ Auth()->user()->tipo }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item pr-2">
                        <a href="{{ route('profile.edit') }}">
                            <span>Perfil</span>
                        </a>
                    </div>
                    <div class="dropdown-item pr-2">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <span>Salir</span>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->
