<?php
include 'include/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="add_category_code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Slug</label>
                            <input type="text" name='slug' placeholder="Enter Slug" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea rows="3" name="description" placeholder="Enter Description" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Upload Image</label>
                            <input type="file" name='image' class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Title</label>
                            <input type="text" name='meta_title' placeholder="Enter meta title" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Description</label>
                            <textarea rows="3" name="meta_description" placeholder="Enter meta_description" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Keywords</label>
                            <textarea rows="3" name="meta_keywords" placeholder="Enter meta_keywords" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">status</label>
                            <input type="checkbox" name='slug' >
                        </div>
                        <div class="col-md-6">
                            <label for="">Popular</label>
                            <input type="checkbox" name='popular' >
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'include/footer.php';
?>