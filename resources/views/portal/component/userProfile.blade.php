    @php
        if (Gate::allows('staff')) {
                $notifcount =  App\Models\tracked_document::where("level_approval", 0)->where("id_pengirim", auth()->user()->id)->count();
        }
        if (Gate::allows('supervisor')) {
                $notifcount =  App\Models\tracked_document::where("level_approval", 1)->where("id_level_dua", auth()->user()->id)->count();
        }
        if (Gate::allows('manager')) {
                $notifcount =  App\Models\tracked_document::where("level_approval", 2)->where("id_level_tiga", auth()->user()->id)->count();
        }
        if (Gate::allows('gm')) {
                $notifcount =  App\Models\tracked_document::where("level_approval", 3)->where("id_level_empat", auth()->user()->id)->where("status", "Pending")->count();
        }
    @endphp
    
    <div class="profile-pic">
        <div style="padding-right: 18px">
            <a href="/sign-document" class="notification">
                <span data-feather="bell" class="align-text-bottom belll" style="width: 28px;height:28px;"></span>
                @isset($notifcount)
                    @if($notifcount > 0)
                        <span class="badge">      
                            {{ $notifcount }}
                        </span>
                    @endif
                @endisset
            </a>
        </div>
        <div style="padding-right: 10px">
            <p>
                <b>{{ auth()->user()->name }}</b>
                <br>
                @can('staff')
                staff level account
                @endcan
                @can('supervisor')
                supervisor level account
                @endcan
                @can('manager')
                manager level account
                @endcan
                @can('gm')
                General Manager level account
                @endcan
                @can('admin')
                admin level account
                @endcan
            </p>
        </div>
       <div>
           <form action="/logout" method="POST">
               @csrf
               <div class="btn-wrao">
                   <button style="vertical-align: middle;" type="submit" class="btn btn-danger"><span data-feather="log-out" class="align-text-bottom"></span> Logout</button>
               </div>
           </form>
       </div>
    </div>