var coursesGetAllAPI = 'http://localhost:8000/api/post';
var coursesCreateAPI = 'http://localhost:8000/api/admin/post';
var coursesUpdateAPI = 'http://localhost:8000/admin/post/';
var coursesDeleteAPI = 'http://localhost:8000/admin/post/';
var coursesGetIDAPI = 'http://localhost:8000/api/post/';

function start() {
    // getCourses(function(courses) {
    //     renderCourses(courses)
    // });
    handleCreateForm();
}
start();

// get all data
function getCourses(callback) {
    fetch(coursesGetAllAPI)
        .then(function(response) {
            return response.json();
        })
        .then(callback);
}

// get detail
function getCourseID(id) {
    fetch(coursesGetIDAPI + '/' + id)
        .then(function(response) {
            return response.json();
        })
        .then(callback);
}

// create new data



// delete data

function handleDeleteCourse(id) {
    var options = {
        method: 'DELETE',
    }
    fetch(coursesDeleteAPI + '/' + id, options)
        .then(function(response) {
            response.json
        })
        .then(function() {
            getCourses(renderCourses);
        });;
}

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


function createCourse(data, callback) {
    var options = {
        method: 'POST',
        body: JSON.stringify(data),
        // body: formData,
    }
    fetch(coursesCreateAPI, options)
        .then(function(response) {
            response.json
        })
        .then(callback);;
}
// handle form data

function handleCreateForm() {

    let createBtn = document.querySelector('#create');
    createBtn.onclick = function() {
        // var fullPath = document.getElementById('upload').value;
        // if (fullPath) {
        //     var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
        //     var filename = fullPath.substring(startIndex);
        //     if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
        //         filename = filename.substring(1);
        //     }
        // }

        var title = document.querySelector('input[name="title"]').value;
        var excerpt = document.querySelector('input[name="excerpt"]').value;
        var content = document.querySelector('textarea[name="content"]').value;
        // var content = document.querySelector('textarea[name="content"]').value;
        // var image = document.querySelector('input[name="image"]').value;
        var image = document.querySelector('input[type="file"]')
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
        window.location = ('http://localhost:8000/admin/postdashboard');
    }
}
