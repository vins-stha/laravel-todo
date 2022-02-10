<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="{{asset('assets/styles/styles.css')}}" rel="stylesheet">

</head>

<body>
<nav class="header">
    <div class="header__logo" aria-label="logo" role="banner">
        <a href="/" aria-label="Home">
            <h3>To Do App</h3>
        </a>

    </div>
    <div id="nav-menus" class="header__navMenus" role="navigation" aria-label="nav menus">

        @if(Auth::user())
            <a>Hi {{Auth::user()->name}}!</a>
            <a href="{{url ('/api/v1/tasks')}}">Tasks</a>
            <a href="{{url ('/api/v1/tasks/create')}}">Add Tasks</a>
            <a href="{{url ('/api/v1/changePassword')}}">Change password</a>
            <a href="{{url('/api/v1/logout')}}">Logout</a>
        @else
            <a href="{{url('/api/v1/login')}}">Login</a>
            <a href="{{url('/api/v1/signup')}}">Signup</a>
        @endif
    </div>
</nav>
@yield('content')

</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="{{asset('assets/scripts/scripts.js')}}"></script>
