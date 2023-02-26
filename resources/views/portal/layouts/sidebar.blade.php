<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="position: sticky; height:100vh">
    <div class="position-sticky sidebar-sticky">
      <div style="text-align: left">
        <a class="" href="#"><img width="80%"  src="{{ asset('img/logo-telkomsel-baru.png') }}" alt=""></a>
      </div>
      
      <ul class="nav flex-column wht-text ">
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('dashboard') ? '#eb3223' : '' }} " >
          <a class="nav-link text-white" aria-current="page" href="/dashboard">
            <span style="color: {{ Request::is('dashboard*') ? '#FFFFFF' : '#EB3223' }}" data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
{{-- 
        <li class="nav-item pt-2 pb-2">
          <a class="nav-link text-white" aria-current="page" href="/dashboard">
            <span style="color: {{ Request::is('upload-data*') ? '#FFFFFF' : '#EB3223' }}" data-feather="upload" class="align-text-bottom"></span>
            Upload
          </a>
          <ul class="submenu collapse" style="list-style-type: none;">
            <li style="text-decoration: none" style="background-color: {{ Request::is('upload-dokumen') ? '#eb3223' : '' }}">
              <a class="nav-link text-white" href="/upload-dokumen">Upload Dokumen</a>
            </li>
            <li><a class="nav-link text-white" href="#">Upload Data</a></li>
          </ul>
        </li> --}}
        
        @cannot('admin')
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('upload-dokumen') ? '#eb3223' : '' }} ">
          <a class="nav-link text-white"  href="/upload-dokumen">
            <span style="color: {{ Request::is('upload-dokumen*') ? '#FFFFFF' : '#EB3223' }}" data-feather="send" class="align-text-bottom"></span>
            Send Document
          </a> 
        </li>

        @endcannot
        


        {{-- hanya bisa di akses admin --}}
        @can('admin')
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('upload-data*') ? '#eb3223' : '' }} ">
          <a class="nav-link text-white" href="/upload-data">
            <span style="color: {{ Request::is('upload-data*') ? '#FFFFFF' : '#EB3223' }}" data-feather="upload" class="align-text-bottom"></span>
            Upload Data
          </a> 
        </li>
        @endcan

        @cannot('admin')
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('sign-document') ? '#eb3223' : '' }} ">
          <a class="nav-link text-white"  href="/sign-document">
            <span style="color: {{ Request::is('sign-document*') ? '#FFFFFF' : '#EB3223' }}" data-feather="check-circle" class="align-text-bottom"></span>
            Control Document
          </a> 
        </li>
        @endcannot

    
        


        @can('admin')
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('tracking*') ? '#eb3223' : '' }} ">
            <a class="nav-link text-white" href="/tracking">
              <span style="color: {{ Request::is('tracking*') ? '#FFFFFF' : '#EB3223' }}" data-feather="activity" class="align-text-bottom"></span>
              Document Tracking
            </a>
        </li>
        @endcan

        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('numbereddocuments*') ? '#eb3223' : '' }} ">
            <a class="nav-link text-white" href="/numbereddocuments/create">
              <span style="color: {{ Request::is('numbereddocuments*') ? '#FFFFFF' : '#EB3223' }}" data-feather="hash" class="align-text-bottom"></span>
              Numbering Document
            </a>
        </li>
        
        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('setting*') ? '#eb3223' : '' }} ">
          <a class="nav-link text-white" aria-current="page" href="/setting">
            <span style="color: {{ Request::is('setting*') ? '#FFFFFF' : '#EB3223' }}" data-feather="settings" class="align-text-bottom"></span>
            Setting
          </a>
        </li>


        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('history*') ? '#eb3223' : '' }} ">
          <a class="nav-link text-white" href="/history">
            <span style="color: {{ Request::is('history*') ? '#FFFFFF' : '#EB3223' }}" data-feather="clock" class="align-text-bottom"></span>
            History
          </a>
        </li>

        <br>
        <br>

        <li class="nav-item pt-2 pb-2" style="background-color: {{ Request::is('help*') ? '#eb3223' : '' }} ">
          <a class="nav-link text-white" href="/help">
            <span style="color: {{ Request::is('help*') ? '#FFFFFF' : '#EB3223' }}" data-feather="help-circle" class="align-text-bottom"></span>
            Help
          </a>
        </li>

        

        
      </ul>

      
    </div>
  </nav>