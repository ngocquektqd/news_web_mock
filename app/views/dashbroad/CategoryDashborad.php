<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBroad</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/mini.min.css">
    <link rel="stylesheet" href="../../font/css/all.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/index.css">
    <!--    --><?php //require_once dirname(__FILE__) . './../theme/header.php' ?>
</head>

<body>
<?php require_once dirname(__FILE__) . './../theme/navbar.php' ?>
<div class="row">
    <div class = "col-md-6">
        <h1>List Category</h1>
    </div>
    <div class = "col-md-6" >
        <a href="/admin/category" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i>Add Category
        </a>
    </div>
</div>
<?php echo $categories?>
<?php require_once dirname(__FILE__) . './../theme/footer_script.php' ?>
</body>

</html>