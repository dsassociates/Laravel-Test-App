<!-- Navbar -->
<nav class="navbar navbar-expand-lg  navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p class="d-lg-none d-md-block">
              Account
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            @if(!empty(Auth::user()->role) && Auth::user()->role =='admin')
            <a class="dropdown-item" href="{{route('admin.profile')}}">Profile</a>
            @endif
            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Log out</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
