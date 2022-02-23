
<?php require_once dirname(__FILE__) . '../../theme/header.php' ?>
<!--    <a href="" class="btn btn-light"> Back</a>-->
    <div class="row">
        <div class = "col-md-6">
            <button onclick="history.back()">Go Back</button>
        </div>
    </div>
    <div class="card card-body bg-light mt-5">
        <h2>Add Categories</h2>
        <p>Create a category with this form</p>
        <form>

            <div class="form-group">
                <label>Category Name <sup>*</sup></label>
                <input type="text" name="cate_name" class="form-control form-control-lg">
            </div>

            <label>Chose Parent Category</label>
            <select name="parent_id">
                <?php
                echo $categories;
                ?>
            </select>

            <br/>

            <div>
                <button id="create" class="btn btn-primary">Create</button>
            </div>

            <br/>
        </form>

    </div>
<?php //require ('../theme/footer.php');?>
    <?php require_once dirname(__FILE__) . '../../theme/footer.php' ?>
<script>
    var categoriesCreateAPI = 'http://localhost:8000/api/admin/category';

    function start() {
        handleCreateForm();
    }
    start();

    function createCategory(data) {
        var options = {
            method: 'POST',
            body: JSON.stringify(data)
        }
        fetch(categoriesCreateAPI, options)
            .then(function(response) {
                response.json
            })
    }

    function handleCreateForm() {
        var createBtn = document.querySelector('#create');
        createBtn.onclick = function() {
            var cate_name = document.querySelector('input[name="cate_name"]').value;
            // console.log(cate_name);
            var parent_id = document.querySelector('select[name="parent_id"]').value;
            // console.log(parent_id);
            var formData = {
                cate_name: cate_name,
                parent_id:parent_id
            }
            createCategory(formData);
            window.location = ('http://localhost:8000/admin/categorydashboard');
        }
    }
</script>
