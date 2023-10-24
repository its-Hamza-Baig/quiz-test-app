<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $data['tittle'] }}</title>
</head>
<body>

    <table>
        <tr>
            <th>User Name</th>
            <th>{{ $data['username'] }}</th>
        </tr>
        <tr>
            <th>Email</th>
            <th>{{ $data['email'] }}</th>
        </tr>
        <tr>
            <th>Password</th>
            <th>{{ $data['password'] }}</th>
        </tr>
    </table>
    <h6>you have been added in this class {{ $data['class'] }}</h6>

    <a href="{{ $data['url'] }}">Click Here To Login</a>
    
</body>
</html>