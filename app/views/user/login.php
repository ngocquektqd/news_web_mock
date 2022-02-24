<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once dirname(__FILE__) . './../theme/header.php' ?>
    <title>Register</title>
</head>
<body>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Login</h2>
<!--            <p>Please fill out this form to register with us</p>-->
            <form>
                <div class="form-group">
                    <label for="user_name">User name: <sup>*</sup></label>
                    <input type="text" name="user_name" class="form-control form-control-lg" ">
                </div>

                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg" >
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="login" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="/admin/user/register" class="btn btn-light btn-block">No account? Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<?php require_once dirname(__FILE__) . './../theme/footer.php' ?>
</html>