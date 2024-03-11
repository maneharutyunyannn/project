<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0
        }
        body {
            background-color: darkgray;
        }
        form {
            background-color: gainsboro;
            border-radius: 8px;
            width: 500px;
            margin: 0 auto;
            padding: 10px 12px;
            text-align: center;
            position: relative;
            top: 100px;
        }
        input {
            border-radius: 5px;
            height: 30px;
            width: 250px;
            margin-top: 20px;
            padding: 2px 8px;
        }
        h1 {
            color: #2d3748;
        }
        a {
            color: #1a202c;
        }
        button {
            width: 150px;
            padding: 4px 12px;
            margin-top: 20px;
        }
        .alert {
            color: darkred;
        }
    </style>
</head>
<body>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $user->name }}"><br>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ $user->phone }}"><br>
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="age">Age:</label>
        <input type="number" name="age" value="{{ $user->age }}"><br>
        @error('age')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Update User</button>

    </form>

</body>
</html>


