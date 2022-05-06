<a href="{{ route('posts.index')}}">Ver Posts</a><br>
<a href="{{ route('dashboard')}}">Voltar Dashboard</a><br>


@extends('admin.layouts_post.app_post')

@section('title', 'Envio de E-mail Mailtrap')

@section('content')

<h1>Temos vagas para programador jr</h1>
<p>Olá, a empresa {{ auth()->user()->name }} é a empresa que mais cresce no Brasil...</p> 

@endsection 