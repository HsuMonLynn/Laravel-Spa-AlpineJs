<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <title>CRUD Application</title>
</head>
<body>
    <div class="container mt-5">
        <div>
            <div class="row">
                <div class="col-6">
                    <div class="card p-3 mt-2">
                        <h3 class="text-center">Student Form</h3>               
                            <form action="{{ route('students.store')}}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Hobbies</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Badminton" name="selectHobbie[]">
                                        <label class="form-check-label" for="inlineCheckbox1">Badminton</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Football" name="selectHobbie[]">
                                        <label class="form-check-label" for="inlineCheckbox2">Football</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="BasketBall" name="selectHobbie[]">
                                        <label class="form-check-label" for="inlineCheckbox3">BasketBall</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                      </div>             
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <label class="input-group-text" for="inputGroupSelect01">Favourite</label>
                                    </div>
                                    <select class="selectpicker" multiple data-live-search="true" name="fav[]">
                                        <option value="Travel">Travel</option>
                                        <option value="Photo">Photo</option>
                                        <option value="Exercise">Exercise</option>
                                        <option value="Movie">Movie</option>
                                        <option value="Sing">Sing</option>
                                      </select> 
                                </div>    
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <label class="input-group-text" for="inputGroupSelect01">Matrial Status</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="matrial">
                                      <option selected>Choose...</option>
                                      <option value="Marriage">Marriage</option>
                                      <option value="Single">Single</option>
                                    </select>
                                </div>                      
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                    </div>
                </div>             
            </div>
        </div>
    </div>
</body>
</html>