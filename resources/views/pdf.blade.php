<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lovelyn">
</head>

<style>
    h1 {
        font-family: 'Lovelyn', cursive;
        color: #333;
        text-align: center;
        margin-top: 50px;
    }
</style>
<body>
    <div class="container mt-5">
        <h1>{{$user->name}}'s Data</h1>
        <br>
        <table class="table table-striped">
            <tr>
                <th>ID:</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Name:</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Country:</th>
                <td>{{ $user->country }}</td>
            </tr>
            <tr>
                <th>Phone Number:</th>
                <td>{{ $user->phone }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Address:</th>
                <td>{{ $user->address }}</td>
            </tr>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
