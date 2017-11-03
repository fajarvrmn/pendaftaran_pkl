@include('layouts._flash')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/jquery.dataTables.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.min.js" rel="stylesheet">
</head>
<body class="home">
    
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                  <a class="navbar-brand js-scroll-trigger navbar-brand left" href="/">Pendaftaran PKL</a>
                  
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    @role('admin')              
							<li><a href="{{route('sekolah.index')}}">Pendaftaran Sekolah</a></li>
                            <li><a href="{{route('siswa.index')}}">Pendafataran Siswa</a></li>
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                    @endrole
                    @if (Auth::guest())
        			</button>
                    <li><a href="{{ url('/sekolahs') }}">Pendafataran Sekolah</a></li>
                    <li><a href="{{ url('/siswas') }}">Pendafataran Siswa</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    <!-- /.navbar -->
    
    @yield('content')
    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrep.min.js"></script>
</body>
@yield('scripts')
</html>