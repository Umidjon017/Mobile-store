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
          <li class="dropdown {{ request()->is('admin/product-categories/*') ? 'active' : ''  }}">
            <a href="#" class="menu-toggle nav-link has-dropdown" ><i class="fas fa-list-alt"></i><span>{{ __("Mahsulot kategoriyasi") }}</span></a>
              <ul class="dropdown-menu">
                <li class="{{ request()->is('admin/product-categories/table*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.product-categories.table.index') }}" ><i class="fas fa-list-alt"></i><span>{{ __("Mahsulot kategoriyasi") }}</span></a>
                </li>

                <li class="{{ request()->is('admin/product-categories/telephones*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.product-categories.telephones.index') }}" ><i class="fas fa-list-alt"></i><span>{{ __("Telefon kategoriyasi") }}</span></a>
                </li>
              </ul>
          </li>
        {{-- @endcan --}}

        {{-- @can('product-list') --}}
          <li class="dropdown {{ request()->is('admin/product-telephones*') ? 'active' : ''  }}">
            <a href="#" class="menu-toggle nav-link has-dropdown" ><i class="fas fa-boxes"></i> <span> {{ __("Telefon Mahsulotlar") }} </span></a>
              <ul class="dropdown-menu">
                <li class="{{ request()->is('admin/product-telephones*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.product-telephones.index') }}" > <i class="fas fa-boxes"></i> <span> {{ __("Telefon mahsulotlari") }} </span></a>
                </li>

                <li class="{{ request()->is('admin/telephone-memories') ? 'active' : ''  }}">
                    <a href="{{ route('admin.telephone-memories.index') }}" ><i class="fas fa-list-alt"></i><span>{{ __("Telefon xotiralari") }}</span></a>
                </li>
              </ul>
          </li>
        {{-- @endcan --}}

        <li class="dropdown {{ request()->is('admin/colors*') ? 'active' : ''  }}">
          <a href="{{ route('admin.colors.index') }}" ><i class="fas fa-list-alt"></i><span>{{ __("Ranglar") }}</span></a>
        </li>

        

        {{-- @if (Auth::user()->hasAllPermissions(['role-list', 'user-list']))
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
  