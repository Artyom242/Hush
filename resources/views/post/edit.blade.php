@extends('layouts.main')

@section('content')
    <div style="margin-top: 100px">
        <form class="" action="{{route('user.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row justify-content-center text-white fs-4">
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="text" class="form-label">Text</label>
                        <textarea placeholder="О чем хотите рассказать?" type="text" name="text" style="height: 192px" class="form-control"id="text">{!! e($post->text) !!}</textarea>
                        @error('text')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control " name="image" placeholder="Выбрать изображение" id="image">
                        @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <a class="btn btn-danger" href="{{route('main.index')}}">Назад</a>
                    <button type="submit" class="btn btn-primary"><span>Обновить</span></button>
                    <!--  -->
                </div>
            </div>
        </form>
    </div>
@endsection
