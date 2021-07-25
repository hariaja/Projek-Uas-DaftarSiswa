<nav role="navigation" class="navbar navbar-custom">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand">{{ auth()->user()->level }}</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <!-- <li class="disabled"><a href="#">Link</a></li> -->
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">{{ auth()->user()->name }} <b class="caret"></b></a>
          <ul role="menu" class="dropdown-menu">
            <li class="dropdown-header">Action</li>
            <li>
              
              @if (auth()->user()->level == 'Guru')
                <a href="{{ url('lihat/' . optional( auth()->user()->guru)->id . '/profile-guru') }}"><i class="glyphicon glyphicon-user"></i>Profile</a>
              @elseif (auth()->user()->level == 'Siswa')
                <a href="{{ url('lihat/' . optional( auth()->user()->siswa)->id . '/profile-siswa') }}"><i class="glyphicon glyphicon-user"></i>Profile</a>
              @else
                <a href="{{ url('lihat/' . auth()->user()->id . '/profile-admin') }}"><i class="glyphicon glyphicon-user"></i>Profile</a>
              @endif
              <a href="{{ url('logout') }}" onclick="return confirm('Apakah Anda Yakin Akan Keluar Aplikasi?')"><i class="glyphicon glyphicon-off"></i>Logout</a>
            </li>
          </ul>
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>