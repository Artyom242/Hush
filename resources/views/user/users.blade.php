@extends('layouts.main')

@section('content')
    <div class="container text-white">
        <div>
            <h1 class="font-weight-bold my-5">Пользователи:</h1>
            @foreach($users as $user)
                <div class="my-3 text-white" style="border-bottom: #a9a9a9 3px ridge">
                    <div class="row">
                        <a class="link-light text-decoration-none" href="{{route('main.user.index', $user->id)}}">
                            <div class=" py-2 mb-3" style="background: rgba(42,42,42,0.94); border-radius: 10px">
                                <div class=" d-flex align-items-center">
                                    <img class="img-circle elevation-2 mr-3" style="height: 80px; width: 80px; object-fit: cover;"
                                         src="images/profile_image/{{$user->image}}" alt="">
                                    <h2 class="fs-3 mb-0">{{$user->name}}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            {{$users->links()}}
        </div>
    </div>
@endsection
