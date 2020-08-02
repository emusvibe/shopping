<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <a class="navbar-brand" href="{{route('test.index')}}"><strong>Order Tests</strong></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">
      <li><a href="{{route('test.shoppingCart')}}"><i class="fa fa-shopping-cart"></i> Test-Cart  <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> User Management <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @if(Auth::check())
            <li><a href="{{route('users.profile')}}">User Profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{route('users.logout')}}">Logout</a></li>
            @else
            <li><a href="{{route('users.signup')}}">Register</a></li>
            <li><a href="{{route('users.signin')}}">Login</a></li>            
            @endif         
            </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>