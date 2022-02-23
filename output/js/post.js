var listPostsApi = 'http://localhost:8000/api/post';
var PostDeleteAPI = 'http://localhost:8000/admin/post/';

function start() {
    getPosts(renderPosts);
    handleDeletePost(id);

}
start();

function getPosts(callback) {
    fetch(listPostsApi)
        .then(function(response) {
            return response.json();
        })
        .then(callback);
}

function renderPosts(posts){
    console.log(posts);
    var listPostsBlock =
        document.querySelector('#list-posts');
    var htmls = posts.map(function(post) {
        return `
            <tr>
            <td><span>${post.article_id}</span></td>
            <td><span>${post.title}</span></td>
            <td><span>${post.excerpt}</span> </td>
          
            <td><img src="${post.image}"></img> </td>
            <td><span>${post.created_at}</span></td>
            <td><span>${post.updated_at}</span></td>
            <td><span>${post.user_id}</span></td>
            <td><span>${post.cate_id}</span></td>
            <td>
            <a href="/admin/post/edit/${post.article_id}" class="btn btn-dark" style="width: 100px">Edit</a>
            <a type="button" class="btn btn-danger" id="btnDelete" style="width: 100px" onclick="handleDeletePost(${post.article_id})  ">Delelte</a>
            <a href="/admin/post/detail/${post.article_id}" type="button" class="btn btn-dark" style="width: 100px">Detail</a></td>
            </tr>
            `
    });
    listPostsBlock.innerHTML = htmls.join('');
}

function handleDeletePost(id) {
    var options = {
        method: 'DELETE',
    }
    fetch(PostDeleteAPI + '/' + id, options)
        .then(function(response) {
            response.json
        })
        .then(function() {
            getPosts(renderPosts);
        });;
}
