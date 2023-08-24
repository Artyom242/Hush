@extends('layouts.main')

@section('content')
    <div style="margin-top: 100px">
        <form class="" action="{{route('user.posts.story')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center text-white fs-4">
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="text" class="form-label">Text</label>
                        <textarea placeholder="О чем хотите рассказать?" type="text" name="text" class="form-control" style="height: 192px" id="text">{!! nl2br(e(old('text'))) !!}</textarea>
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
                    <button type="submit" class="btn btn-success"><span> Опубликовать</span></button>
                    <!--  -->
                </div>
            </div>
        </form>
    </div>
<!--
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
        </form>-->

@endsection
