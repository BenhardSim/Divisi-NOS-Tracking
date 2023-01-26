<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/upload*') ? 'active' : '' }}" href="/dashboard/upload">
            <span data-feather="upload" class="align-text-bottom"></span>
            Upload Data
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/tagging*') ? 'active' : '' }}" href="/dashboard/tagging">
              <span data-feather="tag" class="align-text-bottom"></span>
              Tagging Asset
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/control*') ? 'active' : '' }}" href="/dashboard/control">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Control Document
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/numbering*') ? 'active' : '' }}" href="/dashboard/numbering">
              <span data-feather="hash" class="align-text-bottom"></span>
              Numbering Document
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/contract*') ? 'active' : '' }}" href="/dashboard/contract">
              <span data-feather="pen-tool" class="align-text-bottom"></span>
              Contract TP
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/tracking*') ? 'active' : '' }}" href="/dashboard/tracking">
              <span data-feather="activity" class="align-text-bottom"></span>
              Document Tracking
            </a>
        </li>
      </ul>

      <br>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/setting*') ? 'active' : '' }}" aria-current="page" href="/dashboard/setting">
            <span data-feather="settings" class="align-text-bottom"></span>
            Setting
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/history*') ? 'active' : '' }}" href="/dashboard/history">
            <span data-feather="clock" class="align-text-bottom"></span>
            History
          </a>
        </li>
      </ul>

      @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>

      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span data-feather="grid" class="align-text-bottom"></span>
            Post Categories
          </a>
        </li>
      </ul>
      @endcan
      
    </div>
  </nav>