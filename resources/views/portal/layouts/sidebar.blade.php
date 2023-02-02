<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="position: sticky; height:100vh">
    <div class="position-sticky sidebar-sticky">
      <div style="text-align: left">
        <a class="" href="#"><img width="80%"  src="{{ asset('img/logo-telkomsel-baru.png') }}" alt=""></a>
      </div>
      
      <ul class="nav flex-column wht-text ">
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('dashboard') ? '#5B8FB9' : '' }} " >
          <a class="nav-link text-white" aria-current="page" href="/dashboard">
            <span style="color: #EB3223" data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
{{-- 
        <li class="nav-item pt-2 pb-2">
          <a class="nav-link text-white" aria-current="page" href="/dashboard">
            <span style="color: #EB3223" data-feather="upload" class="align-text-bottom"></span>
            Upload
          </a>
          <ul class="submenu collapse" style="list-style-type: none;">
            <li style="text-decoration: none" style="background-color: {{ Request::is('upload-dokumen') ? '#5B8FB9' : '' }}">
              <a class="nav-link text-white" href="/upload-dokumen">Upload Dokumen</a>
            </li>
            <li><a class="nav-link text-white" href="#">Upload Data</a></li>
          </ul>
        </li> --}}
        
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('upload-dokumen') ? '#5B8FB9' : '' }} ">
          <a class="nav-link text-white"  href="/upload-dokumen">
            <span style="color: #EB3223" data-feather="upload" class="align-text-bottom"></span>
            Upload Dokumen
          </a> 
        </li>
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('upload-data*') ? '#5B8FB9' : '' }} ">
          <a class="nav-link text-white" href="/upload-data">
            <span style="color: #EB3223" data-feather="upload" class="align-text-bottom"></span>
            Upload Data
          </a> 
        </li>


        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('tagging*') ? '#5B8FB9' : '' }} ">
            <a class="nav-link text-white" href="/tagging">
              <span style="color: #EB3223" data-feather="tag" class="align-text-bottom"></span>
              Tagging Asset
            </a>
        </li>
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('control*') ? '#5B8FB9' : '' }} ">
            <a class="nav-link text-white" href="/control">
              <span style="color: #EB3223" data-feather="file-text" class="align-text-bottom"></span>
              Control Document
            </a>
        </li>
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('numbering*') ? '#5B8FB9' : '' }} ">
            <a class="nav-link text-white" href="/numbering">
              <span style="color: #EB3223" data-feather="hash" class="align-text-bottom"></span>
              Numbering Document
            </a>
        </li>
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('contract*') ? '#5B8FB9' : '' }} ">
            <a class="nav-link text-white" href="/contract">
              <span style="color: #EB3223" data-feather="pen-tool" class="align-text-bottom"></span>
              Contract TP
            </a>
        </li>
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('tracking*') ? '#5B8FB9' : '' }} ">
            <a class="nav-link text-white" href="/tracking">
              <span style="color: #EB3223" data-feather="activity" class="align-text-bottom"></span>
              Document Tracking
            </a>
        </li>
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('setting*') ? '#5B8FB9' : '' }} ">
          <a class="nav-link text-white" aria-current="page" href="/setting">
            <span style="color: #EB3223" data-feather="settings" class="align-text-bottom"></span>
            Setting
          </a>
        </li>
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('history*') ? '#5B8FB9' : '' }} ">
          <a class="nav-link text-white" href="/history">
            <span style="color: #EB3223" data-feather="clock" class="align-text-bottom"></span>
            History
          </a>
        </li>
      </ul>
>

      @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>

      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('categories*') ? 'active' : ' text-white" href="/categories">
            <span data-feather="grid" class="align-text-bottom"></span>
            Post Categories
          </a>
        </li>
      </ul>
      @endcan
      
    </div>
  </nav>