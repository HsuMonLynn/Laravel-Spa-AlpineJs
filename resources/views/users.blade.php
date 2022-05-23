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
                        <h3 class="text-center" x-show="isCreate">Create User</h3>
                        <h3 class="text-center" x-show="!isCreate">Update User</h3>
                            <form @submit.prevent="addUser()" x-show="isCreate">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" x-model="form.name">
                                    <template x-if="errors.name">
                                        <p class="text-danger" x-text="errors.name[0]"></p>
                                    </template>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" x-model="form.email">
                                    <template x-if="errors.email">
                                        <p class="text-danger" x-text="errors.email[0]"></p>
                                    </template>
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                            <form @submit.prevent="updateUser()" x-show="!isCreate">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" x-model="form.name">
                                    <template x-if="errors.name">
                                        <p class="text-danger" x-text="errors.name[0]"></p>
                                    </template>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" x-model="form.email">
                                    <template x-if="errors.email">
                                        <p class="text-danger" x-text="errors.email[0]"></p>
                                    </template>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                    </div>
                </div>
                <div class="col-8">
                    <h2>Users List</h2>
                    <button @click="createUser()" class="btn btn-success m-3">Add User</button>
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
                                        <button @click="editUser(user)"
                                            class="btn btn-success">Edit</button>
                                        <button @click="deleteUser(user.id)"
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
                isCreate: true,
                init(){
                    this.getData()
                },
                form: {
                    name: '',
                    email: '',
                },
                users:[],
                errors:{ },
                async getData() {
                    try {
                       let response = await fetch('http://127.0.0.1:8000/api/users')
                        this.users = await response.json();
                    } catch (error) {
                        
                    }
                },
                async resetError(){
                    this.errors.email ='';
                    this.errors.name = ''
                },
                async resetForm(){
                    this.form.id = '';
                    this.form.name ='';
                    this.form.email ='';
                },
                async createUser(){
                    this.isCreate = true
                    this.resetForm();
                    this.resetError();                   
                },
                async addUser(){
                    try{
                        let response = await fetch('http://127.0.0.1:8000/api/users', {
                          method: 'POST',
                          headers: { 
                            'Content-Type': 'application/json' ,
                            'Accept': 'application/json',
                        },
                          body: JSON.stringify(this.form)                                                     
                        })
                        let res =  await response;
                        if(res.status !== 200) throw res.json()   
                        else this.getData();                            
                    }catch(e){
                     let res =  await e
                     this.errors = res.errors
                    }
                },
                async editUser(user){
                    this.isCreate = false
                    this.form.id = user.id;
                    this.form.name = user.name;
                    this.form.email = user.email;
                    this.resetError();                   
                },
                async updateUser(){
                    try{
                        this.form._method = 'PUT'
                        let response = await fetch(`http://127.0.0.1:8000/api/users/${this.form.id}`, {
                          method: 'POST',
                          headers: { 
                              'Content-Type': 'application/json',
                              'Accept': 'application/json',
                             },
                          body: JSON.stringify(this.form)                                                     
                        })
                        let res  =  await response;
                        if(res.status !== 200) throw res.json()   
                        else this.getData();                            
                    }catch(e){
                     let res =  await e
                     this.errors = res.errors
                    }
                },
                async deleteUser(id){
                    try{
                        let response = await fetch(`http://127.0.0.1:8000/api/users/${id}`, {
                          method: 'DELETE',                                                     
                        })
                        await response.json();
                        this.getData();
                    }
                    catch(error){

                    }
                }
            }
        }
    
    </script>
</body>
</html>