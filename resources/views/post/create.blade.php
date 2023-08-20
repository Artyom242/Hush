@extends('layouts.main')

@section('content')

        <form action="{{route('user.posts.story')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="text" class="form-label">Text</label>
                <textarea type="text" name="text" class="form-control" id="text">{{old('text')}}</textarea>
                @error('text')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" placeholder="Выбрать изображение" id="image">
                @error('image')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <a href="{{route('main.index')}}">Назад</a>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>

@endsection
