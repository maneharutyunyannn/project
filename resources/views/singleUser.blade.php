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
        div {
            background-color: gainsboro;
            border-radius: 8px;
            width: 500px;
            margin: 0 auto;
            padding: 15px 20px;
            text-align: center;
            position: relative;
            top: 100px;
        }
        a {
            text-decoration: none;
            color: #1a202c;
            font-size: 20px;
            padding: 2px 4px;
        }
        h2 {
            padding-bottom: 20px;
        }
        h3 {
            padding-top: 30px;
            font-size: 30px;
        }
        button {
            margin-top: 100px;
            margin-left: 690px;
            background-color: gainsboro;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div>
        <h2>Name: {{$user->name}}</h2>
        <h2>Phone Number: {{$user->phone}}</h2>
        <h2>Age: {{$user->age}}</h2>

        <h3>User's Cars:</h3>
        <ul>
            @foreach($user->carsList as $car)
                <li>{{$car->car_model}}</li>
            @endforeach
        </ul>
    </div>
    <button><a href="{{ route('user.edit', $user->id) }}">Edit User Data</a></button>
</body>
</html>
