@extends('layouts.main')

@section('content')

    @can('view', auth()->user())
        <a class="align-items-center" href="{{ route('user.posts.create') }}">
            <div type="button" class="btn bg-white fs-5 text-center font-weight-bold w-100 py-3 shadow dropdown-hover">
                Опубликовать
            </div>
        </a>
    @endcan
    <!-- -------------------------------------------->
    @foreach($posts as $post)

        <div class="my-5 text-white" style="border-bottom: #a9a9a9 3px ridge">
            <div class="row">
                <div class=" py-2 mb-5" style="background: rgba(42,42,42,0.94); border-radius: 10px">
                    <!-- Post content-->
                    <article class="">
                        <!-- Post header-->
                        <header class="my-2 d-flex">
                            <a class="link-light text-white text-decoration-none"
                               href="{{route('main.user.index', $post->user_id)}}">
                                <div class="d-flex align-items-center mb-3">
                                    <img class="img-circle elevation-2" style="height: 65px; width: 65px; object-fit: cover;"
                                         src="images/profile_image/{{\App\Models\User::find($post->user_id)->image}}"
                                         alt="logo">

                                    <h2 class="fs-3 ml-2 mb-0">{{\App\Models\User::find($post->user_id)->name}}</h2>
                                </div>
                            </a>
                        </header>
                        <!-- Preview image figure-->

                        @if ($post->image)
                            <figure class="mb-4 text-center"><img
                                    class="img-fluid rounded object-fit-cover" data-toggle="modal"
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

                        <!-- Post content-->
                        <section class="mb-4 px-2">
                            <p class="fs-5 lh-sm">{!!nl2br(e($post->text))!!}</p>
                        </section>

                        <div class="text-gray fst-italic">Выложено {{$post->created_at}}</div>
                    </article>
                </div>
            </div>
        </div>


        <!-- ----------------------------
        <tr>
            <th scope="row"><a href="{{route('main.user.index', $post->user_id)}}">{{$post->id}}</a></th>
            <th scope="row">{{$post->text}}</th>
            @if ($post->image)
            <th scope="row"><img class="img-fluid " style="height: 60px;" src="profile_image/{{$post->image}}"
                                     alt="logo"></th>


        @endif
        <th scope="row">{{$post->user_id}}</th>
        </tr>
        <br>---------------->
    @endforeach
    <div>
        {{$posts->links()}}
    </div>

@endsection
