<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Create An Account</h2>
                <p>Please fill out this form to register with us</p>
<!--                    <div class="form-group">-->
<!--                        <label for="user_name">User name: <sup>*</sup></label>-->
<!--                        <input type="text" name="user_name" class="form-control form-control-lg">-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label for="password">Password: <sup>*</sup></label>-->
<!--                        <input type="password" name="password" class="form-control form-control-lg">-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <button id="registerBtn">Register</button>-->
<!--                        <div class="col">-->
<!--                            <a href="register.php" class="btn btn-light btn-block">Have an account? Login</a>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div>
                        <label for="user_name">User name:</label>
                        <input type="text" name="user_name" class="form-control form-control-lg">
                    </div>

                    <div>
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control form-control-lg">
                    </div>
                    <div>
                        <button id="registerBtn">Register</button>
                        <!--                        <div class="col">-->
                        <!--                            <a href="register.php" class="btn btn-light btn-block">Have an account? Login</a>-->
                        <!--                        </div>-->
                    </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script>
    var userRegisterApi = document.querySelector('#registerBtn');
    var userApi = 'http://localhost:8000/api/admin/register';
    function start(){
        handleCreateForm();
    }
    start();

    function register(data){
        var options={
            method: 'POST',
            body: JSON.stringify(data)
            };
        fetch(userApi, options)
            .then(function (response) {
                response.json();
            })
    }

    function handleCreateForm(){
        let registerBtn = document.querySelector('#registerBtn');
        registerBtn.onclick = function (){
            let user_name = document.querySelector('input[name = "user_name"]').value;
            console.log(user_name);
            let password = document.querySelector('input[name = "password"]').value;
            var formData ={
                user_name: user_name,
                password: password
            }
            register(formData);

        }

    }
</script>
</html>