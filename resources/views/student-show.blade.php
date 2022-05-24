<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div>
            @if($message = Session::get('success'))
                <div class="alert alert-info">
                    {{$message}}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <h2>Students List</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Hobbies</th>
                                <th>Gender</th>
                                <th>Favourite</th>
                                <th>Matrial Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td >{{ $name }}</td>
                                <td >
                                    @if(is_array($hobbies))
                                        @foreach ($hobbies as $hobbie)
                                        {{ $hobbie }} <br>
                                        @endforeach
                                    @endif
                                </td>
                                <td >{{ $gender }}</td>
                                <td > 
                                    @if(is_array($favs))
                                        @foreach ($favs as $fav)
                                            {{ $fav }} <br>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    {{ $matrial }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>
</body>
</html>