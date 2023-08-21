@extends('layouts.main')

@section('content')
    <div style="margin-top: 100px">
        <form action="{{route('user.profile.update', $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row justify-content-center text-white fs-4">
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="Name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
                        @error('email')
                        <p class=" fs-5 text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control " name="image" placeholder="Выбрать изображение" id="image">
                    </div>
                </div>
                <div class="text-center">
                    <a class="btn btn-danger" href="{{route('main.index')}}">Назад</a>
                    <button type="submit" class="btn btn-primary"><span>Сменить</span></button>
                    <!--  -->
                </div>
            </div>
        </form>
    </div>
@endsection
