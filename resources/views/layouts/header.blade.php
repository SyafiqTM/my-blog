<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{route('home')}}">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
      <ul class="navbar-nav mr-auto">
        <!-- <li class="nav-item active">
          <a class="nav-link" >Home <span class="sr-only">(current)</span></a>
        </li> -->
      </ul>

      <!-- if authenthicate display name -->

      @guest
      <div class="my-2 my-md-0">
        <div class="dropdown">
          <span class="dropbtn">Account<i class="fa fa-caret-down" style="margin-left:10px"></i></span>
          <div class="dropdown-content">
            <a href="{{url('user/login')}}">Login</a>
            <a href="{{url('user/register')}}">Register</a>
          </div>
        </div>
      </div>
      @else
      <div class="my-2 my-md-0">
        <div class="dropdown">
          <span class="dropbtn">Hi, {{auth()->user()->name }}  <i class="fa fa-caret-down" style="margin-left:10px"></i></span>
          <div class="dropdown-content">
            <a href="{{route('user.profile')}}"><i class="fa fa-user-o p-r-20"></i>Profile</a>
            <a href="{{route('posts.list', auth()->user()->id) }}"><i class="fa  fa-clipboard p-r-20"></i>My Post</a>
            <a href="{{route('posts.create')}}" class="border-bottom"><i class="fa fa-edit p-r-20"></i>New Post</a>
            <a href="{{route('user.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off p-r-20"></i> Logout</a>
          </div>
        </div>
      </div>

      <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: one;">
          {{ csrf_field() }}
      </form>
      @endguest

    </div>
  </div>
</nav>
