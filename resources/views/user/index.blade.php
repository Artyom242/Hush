@extends('layouts.main')

@section('content')
    <div class="container text-white">
        <div class="py-4 px-2 mb-5 d-flex position-relative" style="background: #1f1f1f">
            <div class="d-flex flex-column align-items-center m-auto">
                <img class="img-circle elevation-2 mb-3" style="width: 90%; max-height: 75vh; object-fit: cover"
                     src="images/profile_image/{{$user->image}}" alt="">
                <h1 class="fs-2 font-weight-bold">{{$user->name}}</h1>
            </div>

            @can('update', $user)
                <div class="nav-item position-absolute" style="right: 20px">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                             class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                            <path
                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right {" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"  href="{{route('user.profile.edit', $user->id)}}">Сменить фото</a>
                        <a class="dropdown-item" href="{{route('user.profile.edit', $user->id)}}">Изменить имя</a>
                    </div>
                </div>
            @endcan
        </div>
        <div>
            @can('update', $user)
                <a class="align-items-center" href="{{ route('user.posts.create') }}">
                    <div type="button"
                         class="btn bg-white fs-5 text-center font-weight-bold w-100 py-3 shadow dropdown-hover">
                        Опубликовать
                    </div>
                </a>
            @endcan

            @foreach($posts as $post)
                <div class="my-5 text-white" style="border-bottom: #a9a9a9 3px ridge">
                    <div class="row">
                        <div class=" py-2 mb-5" style="background: rgba(42,42,42,0.94); border-radius: 10px">
                            <!-- Post content-->
                            <article class="">
                                <!-- Post header-->
                                <header class="mb-3 d-flex justify-content-between">
                                    <a class="link-light text-white text-decoration-none"
                                       href="{{route('main.user.index', $post->user_id)}}">
                                        <div class="d-flex align-items-center">
                                            <img class="img-circle elevation-2" style="height: 65px; width: 65px; object-fit: cover;"
                                                 src="images/profile_image/{{\App\Models\User::find($post->user_id)->image}}"
                                                 alt="logo">

                                            <h2 class="fs-3 ml-2 mb-0">{{\App\Models\User::find($post->user_id)->name}}</h2>
                                        </div>
                                    </a>

                                    <div class="d-flex gap-3 align-items-center">
                                        @can('update', $post)
                                            <a class="fs-4 text-white" href="{{route('user.posts.edit', $post->id)}}">&#10000;</a>
                                        @endcan
                                        @can('delete', $post)
                                            <form action="{{route('user.posts.destroy', $post->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">&#10006;</button>
                                            </form>
                                        @endcan
                                    </div>
                                </header>

                                <!-- Preview image figure-->
                                @if ($post->image)
                                    <figure class="mb-4 text-center"><img
                                            class="img-fluid rounded" data-toggle="modal"
                                            data-target="#imageModal"
                                            src="images/posts/{{$post->image}}"
                                            alt="..."/></figure>

                                    <div id="imageModal" class="modal modal-fullscreen fade" tabindex="-1" role="dialog"
                                         aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content bg-dark ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel">Изображение</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img id="modalImage" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Post text-->
                                <section class="mb-4 px-2">
                                    <p class="fs-5 lh-sm">{!!nl2br(e($post->text))!!}</p>
                                </section>

                                <div class="text-gray fst-italic">Выложено {{$post->created_at}}</div>
                            </article>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            {{$posts->links()}}
        </div>
    </div>
@endsection
