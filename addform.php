<?php
include_once('database.php');
include_once('inc/header.php');

printf('
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>add</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="name">NAME</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="year">YEAR</label>
                                <input type="text" name="year" id="year" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="average">AVERAGE</label>
                                <input type="text" name="average" id="average" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="image">IMAGE</label>
                                <input type="text" name="image" id="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="section">SECTION</label>
                                <input type="text" name="section" id="section" class="form-control">
                            </div>
                            <button class="btn btn-info">SAVE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
');
if(isset($_POST['name']) && isset($_POST['year']) && isset($_POST['average']) && isset($_POST['image']) && isset($_POST['section']) ){
    $name = $_POST['name'];
    $year = $_POST['year'];
    $average = $_POST['average'];
    $image = $_POST['image'];
    $section = $_POST['section'];
    
    $db->insert($name,$year,$average,$image,$section);
}
include_once('inc/footer.php');