<?php

namespace app\views\post;

?>

<?php require_once dirname(__FILE__) . '../../theme/header_script.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../output/font/css/all.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
<!--    <style>-->
<!--        .ck-editor__editable_inline {-->
<!--            min-height: 400px;-->
<!--        }-->
<!--    </style>-->
</head>

<body>
<?php require_once dirname(__FILE__) . './../theme/navbar.php' ?>
    <div class="card card-body bg-light mt-5">
        <h2>Add Article</h2>
        <p>Create a new article with this form</p>
        <form enctype="multipart/form-data">
            <div class="col-md-12">

                <div>
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                </div>

                <div>
                    <label>Excerpt</label>
                    <input type="text" class="form-control" name="excerpt">
                </div>

                <!--            <div>-->
                <!--                <label>Content</label>-->
                <!--                <textarea id="editor"  class="form-control" name="content"></textarea>-->
                <!--            </div>-->
                <div>
                    <label>Content</label>
                    <br>
                    <textarea type="text" name="content" style="width: 100%" rows="10"></textarea>
                </div>

                <div>
                    <label>Image</label>
                    <input type="text" class="form-control" name="image">
                </div>

                <div>
                    <label>User_id</label>
                    <input type="number" class="form-control" name="user_id">
                </div>

                <label for="cate_id">Chose Category</label>
                <select name="cate_id">
                    <?php
                    echo $categories;
                    ?>
                </select>

            </div>
        </form>

        <div>
            <button id="create" class="btn btn-primary">Create</button>
        </div>

    </div>

</body>
<!--<script>-->
<!--    ClassicEditor-->
<!--        .create(  document.querySelector( '#editor' ), {-->
<!--            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]-->
<!---->
<!--        } )-->
<!--        .then( editor => {-->
<!--            window.editor = editor;-->
<!--        } )-->
<!--        .catch( err => {-->
<!--            console.error( err.stack );-->
<!--        } );-->
<!--</script>-->
<script src="../../js/create.js"></script>

</html>