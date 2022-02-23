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
<!--    <link rel="stylesheet" href="../../output/font/css/all.css">-->
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
    <h2>Update Article</h2>
    <p>Update article with this form</p>
    <form enctype="multipart/form-data">
        <div class="col-md-12" id="editPost">

            <div>
                <label>Title</label>
                <input type="text" class="form-control" name="title">
            </div>

            <div>
                <label>Excerpt</label>
                <input type="text" class="form-control" name="excerpt" >
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
        <button id="updatePost" class="btn btn-primary">Update</button>
    </div>

</div>

</body>
</html>
<script>

    let url = location.href;
    var postDetailApi = 'http://localhost:8000/api/post/edit/'+url.split('edit/')[1];
    // var postDetailApi = 'http://localhost:8000/api/post/detail/'+url.split('detail/')[1]
    console.log(postDetailApi);
    function start() {
        getPosts();
    }
    start();

    function getPosts() {
        fetch(postDetailApi)
            .then(function(response) {
                return response.json();
            })
            .then(renderPosts);
    }

    function renderPosts(post){
        // console.log(posts);
        var listPostsBlock =
            document.querySelector('#editPost');
        console.log(listPostsBlock);
        var htmls =  `
            <div>
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="${post.title}">
            </div>

            <div>
                <label>Excerpt</label>
                <input type="text" class="form-control" name="excerpt" value="${post.excerpt}">
            </div>

            <!--            <div>-->
            <!--                <label>Content</label>-->
            <!--                <textarea id="editor"  class="form-control" name="content"></textarea>-->
            <!--            </div>-->
            <div>
                <label>Content</label>
                <br>
                <textarea type="text" name="content" style="width: 100%" rows="10" >${post.content}</textarea>
            </div>

            <div>
                <label>Image</label>
                <input type="text" class="form-control" name="image" value="${post.image}">
            </div>
            <label for="cate_id">Chose Category</label>
            <select name="cate_id">
                <?php echo $categories;?>
            </select>`
        console.log(htmls);
        listPostsBlock.innerHTML = htmls;
    }

    // Update event
    var postUpdate = 'http://localhost:8000/admin/post/';
    function updatePost(article_id, data) {
        var options = {
            method: 'PATCH',
            body: JSON.stringify(data)
        }
        fetch(coursesUpdateAPI + '/' + article_id, options)
            .then(function(response) {
                response.json
            })
    }

    function handleUpdatePost() {
        var updateBtn = document.querySelector('#updatePost');
        updateBtn.onclick = function() {
            var title = document.querySelector('input[name="title"]').value;
            var excerpt = document.querySelector('input[name="excerpt"]').value;
            var content = document.querySelector('textarea[name="content"]').value;
            var image = document.querySelector('input[name="image"]').value;
            var cate_id = document.querySelector('select[name="cate_id"]').value;
            // var category_name = document.querySelector('input[name="category_name"]').value;
            var formData = {
                title: title,
                excerpt: excerpt,
                content: content,
                image: image,
                cate_id: cate_id
            }
            updateCourse(article_id, formData)
            window.location = ('http://localhost:8000/admin');
        }
    }

</script>