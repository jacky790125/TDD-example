@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Post:</div>

                <div class="card-body">
                    @foreach ($posts as $post)
                    <div class="card">
                        <div class="card-header">{{ $post->user->name }}</div>

                        <div class="card-body">
                            {{ $post->content }}
                            <div class="card">
                                <div class="card-header">Comments:</div>

                                @foreach($post->comments as $comment)
                                    <div class="card-body">
                                        {{ $comment->user->name.': '.$comment->comment }}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <form method="post" action="/posts/comment">
                            @csrf
                            Leave a Comment:
                            <input type="text" size="30" name="comment">
                            <input type="hidden" name="post_id" value={{ $post->id }}>
                            <input type="submit" value="Send">
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
