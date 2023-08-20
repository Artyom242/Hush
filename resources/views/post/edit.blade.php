@extends('layouts.main')

@section('content')

    <div class="container">
        <form action="{{route('user.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="text" class="form-label">Text</label>
                <textarea type="text" name="text" class="form-control" id="text">{{$post->text}}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" placeholder="Выбрать изображение" id="image">
            </div>

            <button type="submit" class="btn btn-primary">Обновить</button>
            <a href="{{route('main.index')}}">Назад</a>
        </form>
    </div>

@endsection
