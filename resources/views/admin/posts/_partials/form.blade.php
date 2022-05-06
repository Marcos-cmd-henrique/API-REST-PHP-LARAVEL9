@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>
@endif


@csrf
<div class="mb-3">
    <label for="title" class="form-label" >Titulo</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Titulo" value="{{$post->title ?? old('title')}}">
    <input type="file" id="image" name="image" class="from-control-file"> 
</div>

<div class="mb-3">
    <label for="conentent" class="form-label">Conteúdo</label>
    <textarea name="content" class="form-control" id="content" cols="30" rows="6" placehilder="Conteudo">{{$post->content ?? old('content')}}</textarea>
</div>
    <button type="submit" class="btn btn-lg btn-success btn-lg btn-block" >Salvar</button> 
  