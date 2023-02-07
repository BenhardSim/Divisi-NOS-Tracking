
    <div class="profile-pic">
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