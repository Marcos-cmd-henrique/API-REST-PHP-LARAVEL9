@extends('admin.layouts_post.app_post')

@section('title', 'Listagem dos Posts ')

@section('content')


    @if (session('message'))
    <div>
        {{session('message')}}
    </div>
    @endif

    <form action="{{ route('posts.search')}}" method="post">
        @csrf
        <input type="text"  name="search" placeholder="Filtrar:">
        <button type="submit">Filtrar</button>
    </form>

    <h1>Post</h1>


    <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titulo</th>
            <th scope="col">Conteúdo</th>
            <th scope="col">Usuário</th> 
            <th scope="col">Visualizar</th>
            <th scope="col">Editar</th>
          </tr>
        </thead>
        @foreach ($posts as $post)
        <tbody>
          <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>{{$post->user->name}}</td>
            <td> <a class="btn btn-info" href="{{ route('posts.show', $post->id) }}"> Ver</a> </td>
            <td> <a class="btn btn-warning" href="{{ route('posts.edit', $post->id)}}">Editar</a> </td>      
          </tr>
          @endforeach
        </tbody>
      </table>


    @if (isset($filter))
        {{ $posts->appends($filter)->links}}
    @else
        {{ $posts->links()}}    
    @endif


@endsection

