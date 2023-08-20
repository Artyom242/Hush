@extends('layouts.main')

@section('content')
    <div class="container">
        <div>
            name:
            <th scope="row">{{$user->name}}</th>
        </div>
        <p>Posts</p>
        <div>
            @foreach($posts as $post)
                <th scope="row">{{$post->text}}</th>
                @if($post->image)
                    <th scope="row"><img class="img-fluid " style="height: 60px;" src="profile_image/{{$post->image}}" alt="logo"></th>
                @endif
                <th scope="row">{{$post->user_id}}</th>
                @can('update', $post)
                    <a href="{{route('user.posts.edit', $post->id)}}">Обновить</a>
                @endcan
                @can('delete', $post)
                    <form action="{{route('user.posts.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Удалить</button>
                    </form>
                @endcan
                <br>
            @endforeach
        </div>

        <a href="{{ url()->previous() }}">Back</a>
    </div>
@endsection
