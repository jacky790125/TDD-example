@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post</div>

                <div class="card-body">
                    <form method="post" action="/posts">
                        @csrf
                        <input type="text" size="50" name="content">
                        <input type="submit" value="送出貼文">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
