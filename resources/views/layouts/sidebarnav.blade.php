<!-- Search Widget -->
<div class="card my-4">
  <h5 class="card-header">Search</h5>
  <div class="card-body">
    <form action="{{route('search')}}" method="post">
      @csrf
      <div class="input-group">
        <input type="text" name="search" class="form-control" value="{{ (Session::has('search') ? Session::get('search') : '')  }}" placeholder="Search for...">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-secondary" type="button">Go!</button>
        </span>
      </div>
    </form>
  </div>
</div>

<!-- Side Widget -->
<div class="row">
  <div class="col-lg-12">
    <div class="card card-outline-inverse">
      <div class="card-header">
          <h4 class="m-b-0 text-white">Archieves</h4></div>
        <div class="card-body">
            <table class="table browser no-border">
                <tbody>
                  @foreach($archieves as $stat)
                    <tr>
                        <td><a href="/archieve/{{$stat['month']}}/{{$stat['year']}}" class="archieve_link">{{$stat['month']}} {{$stat['year']}}</a></td>
                        <td class="text-right"><span class="label label-light-info">{{$stat['published']}}</span></td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
