<div class="sidebar sidebar-style-2">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="../assets/img/lab.jpeg" alt="..." class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>
              @auth
              {{ auth()->user()->name }}
              @endauth
              @auth
              <span class="user-level">{{ auth()->user()->agency }}</span>
              @endauth

            </span>
          </a>
          <div class="clearfix"></div>
        </div>
      </div>
      <ul class="nav nav-primary">
        <!-- <li class="nav-item {{ request()->is('/*') ? 'active' : '' }}">
          <a href="{{ url('/') }}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li> -->

        <li class="nav-item {{ request()->is('/smart/calculate*/') ? 'active' : '' }}">
          <a href="{{ url('/smart') }}">
            <i class="fas fa-door-open"></i>
            <p>Hitung</p>
          </a>
        </li>
        <li class="nav-item {{ request()->is('/smart/results*') ? 'active' : '' }}">
          <a href="{{ url('/smart/results') }}">
            <i class="fas fa-door-open"></i>
            <p>Hasil</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>