@extends('layouts.app')
@section('content')
    <div>
        @if(request()->tag) tag: {{request()->tag}}  @endif
        @foreach($posts as $post)
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
            <hr>
        @endforeach
    </div>
@endsection
