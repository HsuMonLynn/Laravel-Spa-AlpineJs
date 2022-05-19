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
    <title>CRUD Application with Alpine.js</title>
</head>
<body>
    <div class="container mt-5">
        <div x-data="retrieveUsers()">
            <div class="row">
                <div class="col-4">
                    <div class="card p-3 mt-2">
                        <h3 class="text-center">Create User</h3>
                            <form>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" x-model="user.name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" x-model="user.email">
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                    </div>
                </div>
                <div class="col-8">
                    <h2>Users List</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <template x-for="user in users" :key="user.id">
                            <tr>
                                <td x-text="user.id"></td>
                                <td x-text="user.name"></td>
                                <td x-text="user.email"></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button 
                                            class="btn btn-success">Edit</button>
                                        <button 
                                            class="btn btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>

    <script>
        const retrieveUsers = function() {
            return {
                init(){
                    this.getData()
                },
                users:[],
                async getData() {
                    try {
                       let res = await fetch('http://127.0.0.1:8000/api/users')
                        this.users = await res.json();
                    } catch (error) {
                        
                    }
                }
            }
        }
    </script>
</body>
</html>