<a href="{{ route('posts.index')}}">Ver Posts</a><br>
<a href="{{ route('dashboard')}}">Voltar Dashboard</a><br>


@extends('admin.layouts_post.app_post')

@section('title', 'Cadastro Posts ')

@section('content')
    <h1 class="text-center text-3x1 upparcase font-black my-4">Cadastra Novo Post </h1>
    <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mx-auto">
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            @include('admin.posts._partials.form')
        </form>
    </div>

@endsection