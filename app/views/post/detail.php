<?php
echo 'Đây là detail bài viết ';
?>
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
            <h1>Post Detail</h1>
        </div>
    </div>

    <div class="container_fluid__inside">
        <div class="right">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>article_id</th>
                    <th>title</th>
                    <th>excerpt</th>
                    <th>content</th>
                    <th>image</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>User</th>
                    <th>Category</th>
                </tr>
                </thead>
                <tbody id="postDetail">

                </tbody>

            </table>
        </div>
    </div>

</div>
<?php require_once dirname(__FILE__) . './../theme/footer_script.php' ?>
</body>

</html>
<script>
    let url = location.href;
    console.log(url);
    var postDetailApi = 'http://localhost:8000/api/post/detail/'+url.split('detail/')[1];
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

    function renderPosts(posts){
        // console.log(posts);
        var listPostsBlock =
            document.querySelector('#postDetail');
        console.log(listPostsBlock);
        var htmls =  `
            <tr>
            <td><span>${posts.article_id}</span></td>
            <td><span>${posts.title}</span></td>
            <td><span>${posts.excerpt}</span> </td>
            <td><span>${posts.content}</span> </td>
            <td><img src="${posts.image}"></img> </td>
            <td><span>${posts.created_at}</span></td>
            <td><span>${posts.updated_at}</span></td>
            <td><span>${posts.user_name}</span></td>
            <td><span>${posts.cate_name}</span></td>
            <td>
            </tr>            `
        listPostsBlock.innerHTML = htmls;
    }
</script>
