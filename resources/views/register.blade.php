<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="background-color: #fefefe">
<form action="{{ route('register_user') }}" method="POST" class="d-flex justify-content-center align-items-center" style="min-height: 90vh">
    @csrf
    @method('POST')
    <div class="d-flex flex-column w-25 justify-content-center shadow rounded-2 gap-4 p-5">
        <div>
            <h2 class="blockquote">Register Page</h2>
        </div>
        <div class="d-flex flex-column">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Your email...">
        </div>
        <div class="d-flex flex-column">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Name...">
        </div>
        <div class="d-flex flex-column">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="Username...">
        </div>
        <div class="d-flex flex-column">
            <label for="email">Password</label>
            <input class="form-control" type="password" id="password" name="password" placeholder="Password...">
        </div>
        <div class="d-flex flex-column">
            <label for="email">Confirm Password</label>
            <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password...">
        </div>
        <div class="d-flex flex-column">
            <input value="Register" type="submit" class="btn btn-primary">
        </div>
        <p class="lead text-center text-body-tertiary">Already have an account?<br><a href="{{ route('login') }}" class="link-offset-1-hover">Login</a></p>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
{{--        @foreach($errors as $error)--}}
{{--            <p>{{ $error }}</p>--}}
{{--        @endforeach--}}
{{--        {{$errors}}--}}
    </div>
</form>
</body>
</html>
