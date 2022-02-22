    var listPostsApi = 'http://localhost:8000/api/post';
    var coursesCreateAPI = 'http://localhost/project/admin/post';
    var coursesUpdateAPI = 'http://localhost:8000/admin/post/';
    var coursesDeleteAPI = 'http://localhost:8000/admin/post/';
    var coursesGetIDAPI = 'http://localhost:8000/api/post/';

    function start() {
        getPosts(renderPosts);

    }
    start();

    //Function

    // get all Post
    function getPosts(callback) {
        fetch(listPostsApi)
            .then(function(response) {
                return response.json();
            })
            .then(callback);
    }

    function renderPosts(posts){
        var listPostsBlock =
            document.querySelector('#list-posts');
        var htmls = posts.map(function(post) {
            return `
            <tr>
            <td><span>${post.article_id}</span></td>
            <td><span>${post.title}</span></td>
            <td><span>${post.excerpt}</span> </td>
            <td><span>${post.content}</span> </td>
            <td><img src="${post.image}"></img> </td>
            <td><span>${post.created_at}</span></td>
            <td><span>${post.updated_at}</span></td>
            <td><span>${post.user_id}</span></td>
            <td><span>${post.cate_id}</span></td>
            <td>
            <a href="./post/${post.article_id}" class="btn btn-dark">Edit</a>
            <a type="button" class="btn btn-danger" id="btnDelete" onclick="handleDeleteCourse(${post.article_id}) ">Delelte</a>
            <a href="admin/post/${post.article_id}" type="button" class="btn btn-dark">Details</a></td>
            </tr> 
            `
        });
        listPostsBlock.innerHTML = htmls.join('');
    }

    // get detail 
    // function getCourseID(id) {
    //     fetch(coursesGetIDAPI + '/' + id)
    //         .then(function(response) {
    //             return response.json();
    //         })
    //         .then(callback);
    // }

    // create new data

    // function createCourse(data, callback) {
    //     var options = {
    //         method: 'POST',
    //         body: JSON.stringify(data)
    //     }
    //     fetch(coursesCreateAPI, options)
    //         .then(function(response) {
    //             response.json
    //         })
    //         .then(callback);;
    // }

    // delete data

    // function handleDeleteCourse(id) {
    //     var options = {
    //         method: 'DELETE',
    //     }
    //     fetch(coursesDeleteAPI + '/' + id, options)
    //         .then(function(response) {
    //             response.json
    //         })
    //         .then(function() {
    //             getCourses(renderCourses);
    //         });;
    // }
    //
    // function updateCourse(id, data) {
    //     var options = {
    //         method: 'PATCH',
    //         body: JSON.stringify(data)
    //     }
    //     fetch(coursesUpdateAPI + '/' + id, options)
    //         .then(function(response) {
    //             response.json
    //         })
    //         .then(function() {
    //             getCourses(renderCourses);
    //         });;
    // }

    // render all

    // function renderCourses(courses) {
    //     var listCourseBlock =
    //         document.querySelector('#list-posts');
    //     var htmls = courses.map(function(course) {
    //         return `
    //         <tr>
    //         <td><span>${course.article_id}</span></td>
    //         <td><span>${course.title}</span></td>
    //         <td><span>${course.excerpt}</span> </td>
    //         <td><span>${course.content}</span> </td>
    //         <td><img src="${course.image}"></img> </td>
    //         <td><span>${course.created_at}</span></td>
    //         <td><span>${course.updated_at}</span></td>
    //         <td><span>${course.user_id}</span></td>
    //         <td><span>${course.cate_id}</span></td>
    //         <td>
    //         <a href="./post/${course.id}" class="btn btn-dark">Edit</a>
    //         <a type="button" class="btn btn-danger" id="btnDelete" onclick="handleDeleteCourse(${course.id}) ">Delelte</a>
    //         <a href="/post/${course.id}" type="button" class="btn btn-dark">Details</a></td>
    //         </tr>
    //         `
    //     });
    //     listCourseBlock.innerHTML = htmls.join('');
    // }

    // handle form data

    function handleCreateForm() {
        var createBtn = document.querySelector('#create');
        createBtn.onclick = function() {
            var title = document.querySelector('input[name="title"]').value;
            var body = document.querySelector('input[name="body"]').value;
            var author = document.querySelector('input[name="author"]').value;
            var category_id = document.querySelector('input[name="category_id"]').value;
            var formData = {
                title: title,
                body: body,
                author: author,
                category_id: category_id,
            }
            createCourse(formData, function() {
                getCourses(renderCourses);
            })
        }
    }


    // function handleUpdateCourse() {
    //     var createBtn = document.querySelector('#btnUpdate');
    //     createBtn.onclick = function() {
    //         var title = document.querySelector('input[name="title"]').value;
    //         var body = document.querySelector('input[name="body"]').value;
    //         var author = document.querySelector('input[name="author"]').value;
    //         var category_id = document.querySelector('input[name="category_id"]').value;
    //         // var category_name = document.querySelector('input[name="category_name"]').value;
    //         var formData = {
    //             title: title,
    //             body: body,
    //             author: author,
    //             category_id: category_id,
    //         }
    //         updateCourse(id, formData, function() {
    //             getCourses(renderCourses);
    //         })
    //     }
    // }