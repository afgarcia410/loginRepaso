<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>laravel - dwes - {{ $table ?? 'Users'}}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="{{ url('') }}">Users</a>
            <ul class="navbar-nav">
                <li><a class="nav-link" href="{{url('/')}}">Post</a></li>
            </ul>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <!--
                    <li class="nav-item {{$activeHome ?? ''}}">
                        <a class="nav-link" href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="nav-item {{$activeUser ?? ''}}">
                        <a class="nav-link" href="{{ url('user') }}">User</a>
                    </li>
                    -->
                    @yield('navItems')
                </ul>
                <ul class="navbar-nav ml-auto">
                    @if(Auth::check())
                    <li><a href="{{ url('home') }}"  class="nav-link">{{auth()->user()->name}}</a></li>
                    @else
                    <li><a href="{{ url('login') }}"  class="nav-link">Log in</a></li>
                    <li><a href="{{ url('register') }}"  class="nav-link">Register</a></li>
                    @endif
                </ul>
            </div>
        </nav>
        @yield('modalContent')
        <main role="main">
            <div class="jumbotron">
                <div class="container">
                    <h4 class="display-4">{{ $title ?? 'Users' }}</h4>
                </div>
            </div>
            <div class="container">
                @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                @yield('content')
                <hr>
            </div>
        </main>
        <footer class="container">
            <p>&copy; IZV 2023</p>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @yield('script')
    </body>
</html>