<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <div style="text-align: center">
        <a class="" href="#"><img width="80%"  src="img/logo-telkomsel-baru.png" alt=""></a>
      </div>
      
      <ul class="nav flex-column wht-text ">
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('dashboard') ? '#5B8FB9' : '' }} " >
          <a class="nav-link text-white" aria-current="page" href="/dashboard">
            <span style="color: #EB3223" data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item pt-2 pb-2">
          <a class="nav-link {{ Request::is('dashboard/upload*') ? 'active' : ' text-white ' }}" href="/dashboard/upload">
            <span style="color: #EB3223" data-feather="upload" class="align-text-bottom"></span>
            Upload Data
          </a> 
        </li>
        <li class="nav-item pt-2 pb-2">
            <a class="nav-link {{ Request::is('dashboard/tagging*') ? 'active' : ' text-white ' }}" href="/dashboard/tagging">
              <span style="color: #EB3223" data-feather="tag" class="align-text-bottom"></span>
              Tagging Asset
            </a>
        </li>
        <li class="nav-item pt-2 pb-2">
            <a class="nav-link {{ Request::is('dashboard/control*') ? 'active' : ' text-white ' }}" href="/dashboard/control">
              <span style="color: #EB3223" data-feather="file-text" class="align-text-bottom"></span>
              Control Document
            </a>
        </li>
        <li class="nav-item pt-2 pb-2">
            <a class="nav-link {{ Request::is('dashboard/numbering*') ? 'active' : ' text-white ' }}" href="/dashboard/numbering">
              <span style="color: #EB3223" data-feather="hash" class="align-text-bottom"></span>
              Numbering Document
            </a>
        </li>
        <li class="nav-item pt-2 pb-2">
            <a class="nav-link {{ Request::is('dashboard/contract*') ? 'active' : ' text-white ' }}" href="/dashboard/contract">
              <span style="color: #EB3223" data-feather="pen-tool" class="align-text-bottom"></span>
              Contract TP
            </a>
        </li>
        <li class="nav-item pt-2 pb-2">
            <a class="nav-link {{ Request::is('dashboard/tracking*') ? 'active' : ' text-white ' }}" href="/dashboard/tracking">
              <span style="color: #EB3223" data-feather="activity" class="align-text-bottom"></span>
              Document Tracking
            </a>
        </li>
      </ul>
      <br><br>
      <div class="mt-5">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/setting*') ? 'active' : ' text-white ' }}" aria-current="page" href="/dashboard/setting">
            <span style="color: #EB3223" data-feather="settings" class="align-text-bottom"></span>
            Setting
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/history*') ? 'active' : ' text-white ' }}" href="/dashboard/history">
            <span style="color: #EB3223" data-feather="clock" class="align-text-bottom"></span>
            History
          </a>
        </li>
      </ul>
      </div>

      @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>

      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : ' text-white ' }}" href="/dashboard/categories">
            <span data-feather="grid" class="align-text-bottom"></span>
            Post Categories
          </a>
        </li>
      </ul>
      @endcan
      
    </div>
  </nav>