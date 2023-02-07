
    <div class="profile-pic">
        <div style="padding-right: 10px">
            <p>
                <b>{{ auth()->user()->name }}</b>
                <br>
                @can('staff')
                 You're on a staff level account
                @endcan
                @can('supervisor')
                 You're on a supervisor level account
                @endcan
                @can('manager')
                 You're on a manager level account
                @endcan
                @can('gm')
                 You're on a Grand Master level account
                @endcan
                @can('admin')
                 You're on an admin level account
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