<ul class="nav">
  <li class="nav-item {{(strpos(\Request::route()->getName(),'company.index')!== false) ? 'active' :''}}">
    <a class="nav-link" href="{{route('company.index')}}">
      <i class="material-icons">dashboard</i>
      <p>Company</p>
    </a>
  </li>
  <li class="nav-item {{(strpos(\Request::route()->getName(),'employee.index')!== false) ? 'active' :''}}">
    <a class="nav-link" href="{{route('employee.index')}}">
      <i class="material-icons">school</i>
      <p>Employee</p>
    </a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
      <i class="material-icons">person</i>
      <p>Log Out</p>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </a>
  </li>
</ul>
