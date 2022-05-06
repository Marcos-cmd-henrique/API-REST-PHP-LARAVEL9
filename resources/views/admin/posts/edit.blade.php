<a href="{{ route('posts.index')}}">Ver Posts</a><br>

@extends('admin.layouts_post.app_post')
@section('title', 'Editar Posts ')
@section('content')

<h1>Editar o Post <strong>{{ $post->title}}</strong></h1>

<form action="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
    @method('put')
    @include('admin.posts._partials.form')
</form>

@endsection