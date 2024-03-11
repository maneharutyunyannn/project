
@extends('layouts.app')
@section('content')
        <div class="users">
                <form action="{{ route('home.store') }}" name="peopleForm" method="POST" class="reg">
                    @csrf
                    <h1>Registration</h1>
                    <div class="info">
                        <input type="text" placeholder="Name" name="name"><br>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="tel" placeholder="Phone Number" name="phone"><br>
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="number" placeholder="Age" name="age"><br>
                        @error('age')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="submit" name="submit" class="submit">
                    </div>
                </form>
                <div class="people">
                    @foreach($users as $user)
                        <div class="name">
                            <a href="{{route('user.show', ['id' => $user->id])}} ">{{$user->name}}</a>
                        </div>
                        <form action="{{ route('user.delete', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete User</button>
                        </form>
                    @endforeach
                </div>
                <form method="post" action="{{ route('car.store') }} " method="POST" class="cars">
        @csrf
        <label for="user_id">User:</label>
        <select name="user_id" id="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        </br>
{{--                    fdjkh kjdhf d--}}
        <label for="car_model">Car Model:</label>
        <input type="text" name="car_model" required></br>
        <label for="plate">Car Plate:</label>
{{--                    test for gitcommit--}}
        <input type="text" name="plate" required></br>
        <button type="submit" class="submit2">Add Car</button>
    </form>

    <div>
        @foreach($posts as $post)
            <h1>Post's title: {{ $post->title }}</h1>
            <h2>Post's description: {{ $post->description }}</h2>
            <h2>Post's category: {{ $post->categories->name }} </h2>
            <ul>
                @foreach($post->tagsRelation as $tags)
                    <li>
                        <a href="{{ route('posts.tag', ['tag'=>$tags->tags->tag ]) }}"># {{ $tags->tags->tag }}</a>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>


@endsection


