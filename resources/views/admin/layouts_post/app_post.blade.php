<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')- {{ config('app.name')}}</title>
        <link rel="stylesheet" href="{{asset('site/style.css')}}">
        <script src="{{asset('site/jquery.js')}}"></script>
    </head>
    <body class="bg-gray-50" >
        <header>
            <a href="{{ route('posts.create')}}">Criar Post</a><br>
            <a href="{{ route('dashboard')}}">Voltar Dashboard</a><br>

            <a href="{{ route('logout') }}">Logout</a>
        </header>
        <hr>
        <dir class="container mx-auto py-8">
            @yield('content')
        </dir>
        <hr>
      <div class="rodape">
        <footer>
            <p> Testando conhecimento &copy; 2022</p>
        </footer>

     </div>   

        <!--css-->
        <script src="{{asset('site/jquery.js')}}"></script>
        <script src="{{asset('site/bootstrap.js')}}"></script>
        

    </body>
</html>
