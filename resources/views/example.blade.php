<!doctype html>
<html>
<body>
    <ul>
        @foreach($users as $user)

            <li>{{$user->name}}</li>
            @endforeach
    </ul>
</body>
</html>