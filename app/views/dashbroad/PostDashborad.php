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
    <div class="continer-fluid">

        <div class="row">
            <div class = "col-md-6">
                <h1>List Posts</h1>
            </div>
            <div class = "col-md-6" >
                <a href="/admin/post" class="btn btn-primary pull-right">
                    <i class="fa fa-pencil"></i>Add Post
                </a>
            </div>
        </div>

        <div class="container_fluid__inside" >
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead >
                        <trc>
                            <th>Article_id</th>
                            <th>Title</th>
                            <th>Excerpt</th>
<!--                            <th>content</th>-->
                            <th>Image</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>User</th>
                            <th>Category</th>
                            <th>Action</th>
                        </trc>
                    </thead>
                    <tbody id="list-posts">

                    </tbody>

                </table>
            </div>
        </div>

    </div>
    <script src="../../js/post.js"></script>
    <?php require_once dirname(__FILE__) . './../theme/footer_script.php' ?>
</body>

</html>