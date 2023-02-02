<div class="form-group container">
  <form action="{{ url('/search') }}" method="GET" role="search" >
      <input value="" name="search" class="form-control" id="exampleFormControlInput1" placeholder="Search By Site ID">
  </form>
</div>
<br>
<div class="container con-tbl px-2">
    <table class="table table-hover" >
        <thead>
          <tr class="text-white text-left rounded" style="background-color: #144272">
            <th scope="col" style="border-radius: 10px 0 0 0">Site ID</th>
            <th scope="col">Site Name</th>
            <th scope="col">Alamat</th>
            <th scope="col">Tower Status</th>
            <th scope="col" style="border-radius: 0 10px 0 0" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($site_all as $site)
          <tr class="text-left">
            <th scope="row">{{ $site->SITEID }}</th>
            <td>{{ $site->SITENAME }}</td>
            <td>{{ $site->ALAMAT }}</td>
            <td>{{ $site->TOWERSTATUS }}</td>
            <td class="text-center"><a href="/{{ $root }}/{{ $site->SITEID }}" class="badge px-3 py-2 text-white text-center links" style="background-color: #144272">Detail</a></td>
          </tr>  
          @endforeach
          
        </tbody>
    </table>
</div>

{{ $site_all->links() }}
