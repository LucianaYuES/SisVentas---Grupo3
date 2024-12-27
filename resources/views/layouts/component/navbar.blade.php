<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="index.html" class="logo">
        <img
          src="assets/img/kaiadmin/logo_light.svg"
          alt="navbar brand"
          class="navbar-brand"
          height="20"
        />
      </a>
      <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
          <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
          <i class="gg-menu-left"></i>
        </button>
      </div>
      <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
      </button>
    </div>
    <!-- End Logo Header -->
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">
        <li class="nav-item">
          <a href="{{ url('home') }}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="{{ route('consultas.index') }}">
            <i class="fas fa-search"></i>
            <p>Consultas</p>
          </a>
        </li>

        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Components</h4>
        </li>
        
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#productos">
            <i class="fas fa-box"></i>
            <p>Productos</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="productos">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ route('products.index') }}">
                  <span class="sub-item">Lista</span>
                </a>
              </li>
              <li>
                <a href="{{ route('products.create') }}">
                  <span class="sub-item">Crear</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#categorias">
            <i class="fas fa-tags"></i>
            <p>Categorías</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="categorias">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ route('categories.index') }}">
                  <span class="sub-item">Lista</span>
                </a>
              </li>
              <li>
                <a href="{{ route('categories.create') }}">
                  <span class="sub-item">Crear</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#usuarios">
            <i class="fas fa-users"></i>
            <p>Usuarios</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="usuarios">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ route('users.index') }}">
                  <span class="sub-item">Lista</span>
                </a>
              </li>
              <li>
                <a href="{{ route('users.create') }}">
                  <span class="sub-item">Crear</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#clientes">
            <i class="fas fa-user-friends"></i>
            <p>Clientes</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="clientes">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ route('clients.index') }}">
                  <span class="sub-item">Lista</span>
                </a>
              </li>
              <li>
                <a href="{{ route('clients.create') }}">
                  <span class="sub-item">Crear</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        
        
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#ventas">
            <i class="fas fa-dollar-sign"></i>
            <p>Ventas</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="ventas">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ route('ventas.index') }}">
                  <span class="sub-item">Lista</span>
                </a>
              </li>
              <li>
                <a href="{{ route('ventas.create') }}">
                  <span class="sub-item">Crear</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
