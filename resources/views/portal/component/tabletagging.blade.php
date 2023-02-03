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
            <th scope="col">TA RTPO</th>
            <th scope="col">TA NSA</th>
            <th scope="col">Tahap</th>
            <th scope="col">Site Project</th>
            <th scope="col">Status</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Mitra</th>
            <th scope="col">Lintas Cluster</th>


            <th scope="col" style="border-radius: 0 10px 0 0" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($assets as $asset)
          <tr class="text-left">
            <th scope="row">{{ $asset->ta_siteid }}</th>
            <td>{{ $asset->ta_sitename }}</td>
            <td>{{ $asset->ta_rtpo }}</td>
            <td>{{ $asset->ta_nsa }}</td>
            <td>{{ $asset->ta_tahap }}</td>
            <td>{{ $asset->ta_site_project }}</td>
            <td>{{ $asset->ta_status }}</td>
            <td>{{ $asset->ta_tanggal }}</td>
            <td>{{ $asset->ta_mitra }}</td>
            <td>{{ $asset->ta_lintas_cluster }}</td>
            <td class="text-center"><a href="/tagging/{{ $asset->SITEID }}" class="badge px-3 py-2 text-white text-center links" style="background-color: #144272">Detail</a></td>
          </tr>  
          @endforeach
          
        </tbody>
    </table>
</div>

{{ $assets->links() }}
