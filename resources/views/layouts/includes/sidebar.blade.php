<ul class="list-group panel">
  <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i><b>Sidebar Control Panel</b></li>

  @if (auth()->user()->level == 'Admin')

    <li class="list-group-item"><a href="{{ url('dashboard') }}"><i class="glyphicon glyphicon-home"></i>Dashboard</a></li>
    <li class="list-group-item"><a href="{{ url('siswa') }}"><i class="glyphicon glyphicon-user"></i>Data Siswa</a></li>
    <li class="list-group-item"><a href="{{ url('guru') }}"><i class="glyphicon glyphicon-arrow-right"></i>Data Guru</a></li>
    <li class="list-group-item"><a href="{{ url('kelas') }}"><i class="glyphicon glyphicon-book"></i>Data Kelas</a></li>
    <li class="list-group-item"><a href="{{ url('mapel') }}"><i class="fa fa-folder-open"></i>Data Mata Pelajaran</a></li>
    <li class="list-group-item"><a href="{{ url('posts') }}"><i class="fa fa-pencil"></i>Posts</a></li>


  @elseif(auth()->user()->level == 'Guru')

    <li class="list-group-item"><a href="{{ url('dashboard') }}"><i class="glyphicon glyphicon-home"></i>Dashboard</a></li>
    <li class="list-group-item"><a href="{{ url('siswa') }}"><i class="glyphicon glyphicon-user"></i>Data Siswa</a></li>
    <li class="list-group-item"><a href="{{ url('kelas') }}"><i class="glyphicon glyphicon-book"></i>Data Kelas</a></li>
    <li class="list-group-item"><a href="{{ url('mapel') }}"><i class="fa fa-folder-open"></i>Data Mata Pelajaran</a></li>

  @else

    <li class="list-group-item"><a href="{{ url('dashboard') }}"><i class="glyphicon glyphicon-home"></i>Dashboard</a></li>
    <li class="list-group-item"><a href="{{ url('kelas') }}"><i class="glyphicon glyphicon-book"></i>Data Kelas</a></li>
    <li class="list-group-item"><a href="{{ url('mapel') }}"><i class="fa fa-folder-open"></i>Data Mata Pelajaran</a></li>
    
  @endif

  <li>
    <a href="#demo4" class="list-group-item " data-toggle="collapse">Action  <span class="glyphicon glyphicon-chevron-right"></span></a>
      <li class="collapse" id="demo4">
        <a href="{{ url('logout') }}" class="list-group-item" onclick="return confirm('Apakah Anda Yakin Akan keluar Aplikasi?')"><i class="glyphicon glyphicon-off"></i>Keluar Aplikasi</a>
      </li>
  </li>
</ul>