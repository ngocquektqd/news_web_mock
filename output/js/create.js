var coursesGetAllAPI = 'http://localhost:8000/api/post';
var coursesCreateAPI = 'http://localhost:8000/api/admin/post';
var coursesUpdateAPI = 'http://localhost:8000/admin/post/';
var coursesDeleteAPI = 'http://localhost:8000/admin/post/';
var coursesGetIDAPI = 'http://localhost:8000/api/post/';

function start() {
    handleCreateForm();
}
start();

function createCourse(data, callback) {
    var options = {
        method: 'POST',
        body: JSON.stringify(data)
    }
    fetch(coursesCreateAPI, options)
        .then(function(response) {
            response.json
        })
        .then(callback);;
}
// handle form data

function handleCreateForm() {

    var createBtn = document.querySelector('#create');
    createBtn.onclick = function() {
        var title = document.querySelector('input[name="title"]').value;
        var excerpt = document.querySelector('input[name="excerpt"]').value;
        var content = document.querySelector('textarea[name="content"]').value;
        // var content = document.querySelector('textarea[name="content"]').value;
        // var image = document.querySelector('input[name="image"]').value;
        var image = document.querySelector('input[name="image"]').value;
        var user_id = document.querySelector('input[name="user_id"]').value;
        var cate_id = document.querySelector('select[name="cate_id"]').value;

        var formData = {
            title: title,
            excerpt: excerpt,
            content: content,
            image: image,
            user_id: user_id,
            cate_id: cate_id,
        }
        createCourse(formData, function (){
            getCourses(renderCourses)
        })
        window.location = ('http://localhost:8000/admin');
    }
}
