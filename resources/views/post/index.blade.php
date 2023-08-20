@extends('layouts.main')

@section('content')

    @can('view', auth()->user())
        <a href="{{ route('user.posts.create') }}">
            <div class=" m-auto text-center w-75">
                <p>Создать пост</p>
            </div>
        </a>
    @endcan

    @foreach($posts as $post)

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article class="mb-5">
                        <!-- Post header-->
                        <header class="mb-4">
                            <a class="link-dark text-dark" href="{{route('main.user.index', $post->user_id)}}">
                                <div class="d-flex align-items-center mb-3">
                                    <img class="img-circle elevation-2" style="width: 50px"
                                         src="profile_image/{{\App\Models\User::find($post->user_id)->image}}" alt="logo">

                                    <h1 class="fw-bolder ml-2">{{\App\Models\User::find($post->user_id)->name}}</h1>
                                </div>
                            </a>

                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Выложено {{$post->created_at}}</div>
                        </header>
                        <!-- Preview image figure-->

                        @if ($post->image)
                            <figure class="mb-4"><img class="img-fluid rounded" src="profile_image/{{$post->image}}"
                                                      alt="..."/></figure>
                        @endif

                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">{{$post->text}}</p>
                        </section>
                    </article>
                </div>
            </div>
        </div>

        <tr>
            <th scope="row"><a href="{{route('main.user.index', $post->user_id)}}">{{$post->id}}</a></th>
            <th scope="row">{{$post->text}}</th>
            @if ($post->image)
                <th scope="row"><img class="img-fluid " style="height: 60px;" src="profile_image/{{$post->image}}"
                                     alt="logo"></th>
            @endif
            <th scope="row">{{$post->user_id}}</th>
        </tr>
        <br>
    @endforeach
    <div>
        {{$posts->links()}}
    </div>

@endsection
