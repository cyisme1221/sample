<header class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <div class="col-md-offset-1 col-md-10">
      <a href="/" id="logo">Sample App</a>
      <nav>
        <ul class="nav navbar-nav navbar-right">
          @if (Auth::check())
            <li><a href="{{ route('users.index') }}">User List</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{ Auth::user()->name }} <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('users.show', Auth::user()->id) }}">Self Center</a></li>
                <li><a href="{{ route('users.edit', Auth::user()->id) }}">Edit Profile</a></li>
                <li class="divider"></li>
                <li>
                  <a id="logout" href="#">
                    <form action="{{ route('logout') }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                    </form>
                  </a>
                </li>
              </ul>
            </li>
          @else
            <li><a href="{{ route('help') }}">Help</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
          @endif
        </ul>
      </nav>
    </div>
  </div>
</header>