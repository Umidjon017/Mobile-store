<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('admin.dashboard')}}">
          <img alt="image" src="/assets/img/logo.png" class="header-logo" />
          <span class="logo-name">{{ __("Mobile Store") }}</span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">{{ __("Asosiy") }}</li>
        <li class="dropdown {{ request()->is('admin/dashboard*') ? 'active' : ''  }}">
          <a href="{{ Route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>{{ __("Dashboard") }}</span></a>
        </li>

        {{-- @can('product-list') --}}
            <li class="dropdown {{ request()->is('admin/product-categories*') ? 'active' : ''  }}">
                <a href="{{ route('admin.product-categories.index') }}" ><i class="fas fa-list-alt"></i><span>{{ __("Mahsulot kategoriyasi") }}</span></a>
            </li>
        {{-- @endcan --}}
        
        {{-- @can('product-list') --}}
            <li class="dropdown {{ request()->is('admin/product-categories/telephones*') ? 'active' : ''  }}">
                <a href="{{ route('admin.product-categories.telephones.index') }}" ><i class="fas fa-list-alt"></i><span>{{ __("Telefon kategoriyasi") }}</span></a>
            </li>
        {{-- @endcan --}}

        {{-- @can('product-list') --}}
            <li class="dropdown {{ request()->is('admin/products*') ? 'active' : ''  }}">
                <a href="{{ route('admin.products.index') }}" >
                  <i class="fas fa-boxes"></i>
                  <span> Mahsulotlar </span>
                </a>
            </li>
        {{-- @endcan --}}

        {{-- @can('home-list')
            <li class="dropdown {{ request()->is('admin/homes*') ? 'active' : ''  }}">
                <a href="{{ route('admin.homes.index') }}" ><i class="fas fa-home"></i><span>Home</span></a>
            </li>
        @endcan

        @can('sport_category-list')
            <li class="dropdown {{ request()->is('admin/categories*') ? 'active' : ''  }}">
            <a href="{{ route('admin.categories.index') }}" ><i class="fas fa-align-left"></i><span>Sport Kategoriyasi</span></a>
            </li>
        @endcan

        @can('news-list')
            <li class="dropdown {{ request()->is('admin/news*') ? 'active' : ''  }}">
                <a href="{{ route('admin.news.index') }}" ><i class="far fa-newspaper"></i><span> Yangiliklar </span></a>
            </li>
        @endcan

        @can('brand-list')
            <li class="dropdown {{ request()->is('admin/brands*') ? 'active' : ''  }}">
                <a href="{{ route('admin.brands.index') }}" ><i class="fas fa-award"></i><span> Brendlar </span></a>
            </li>
        @endcan

        @can('size-list')
            <li class="dropdown {{ request()->is('admin/sizes*') ? 'active' : ''  }}">
                <a href="{{ route('admin.sizes.index') }}" ><i class="fas fa-align-left"></i><span>Mahsulot O'lchamlari</span></a>
            </li>
        @endcan

        @can('team-list')
            <li class="dropdown {{ request()->is('admin/team*') ? 'active' : ''  }}">
                <a href="{{ route('admin.team.index') }}" ><i class="fas fa-users"></i><span>Jamoalar</span></a>
            </li>
        @endcan --}}

        {{-- Sport Complexes --}}
        {{-- @can('sport_complex-list')
          <li class="dropdown {{ request()->is('admin/complexes*') ? 'active' : ''  }}">
            <a href="#" class="menu-toggle nav-link has-dropdown"> <i class="fas fa-dumbbell"></i> <span> Sport majmuolari </span></a>
              <ul class="dropdown-menu">
                <li class="{{ request()->is('admin/complexes/locations*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.complexes.locations.') }}"> <i class="fas fa-map-marker-alt"></i><span> Joylashuvlar </span></a>
                </li>
                <li class="{{ request()->is('admin/complexes/table*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.complexes.table.index') }}"> <i class="fas fa-building"></i><span> Majmualar </span></a>
                </li>
              </ul>
          </li>
        @endcan --}}

        {{-- Tickets --}}
        {{-- @can('ticket-list')
          <li class="dropdown {{ request()->is('admin/tickets*') ? 'active' : ''  }}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-ticket-alt"></i><span> Chiptalar bo'limi </span></a>
              <ul class="dropdown-menu">
                <li class="{{ request()->is('admin/tickets/table*') ? 'active' : ''  }}">
                  <a href="{{ route('admin.tickets.table.index') }}"> <i class="fas fa-money-bill"></i><span> Chiptalar </span></a>
                </li>
                <li class="dropdown {{ request()->is('admin/tickets/stadiums*') ? 'active' : ''  }}">
                  <a href="{{ route('admin.tickets.stadiums.table.index') }}" ><i class="fas fa-futbol"></i><span> Stadionlar </span></a>
                </li>
              </ul>
          </li>
        @endcan

        @if (Auth::user()->hasAllPermissions(['role-list', 'user-list']))
            <li class="menu-header"> Xavfsizlik </li>
            <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                data-feather="user-check"></i><span> Administratsiya </span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->is('admin/roles*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.roles.index') }}" > <i class="fas fa-universal-access"></i> Rollar</a>
                </li>
                <li class=" {{ request()->is('admin/users*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.users.index') }}" > <i class="fas fa-users-cog"></i><span>Foydalanuvchi&Admin</span></a>
                </li>
            </ul>
            </li>
        @endif --}}
      </ul>
    </aside>
  </div>
  