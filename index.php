<?php
include_once('database.php');
include_once('inc/header.php');

$head_html = '
    <div class="container">
        <div class="row my-1">
            <div class="col-lg-6 mx-auto">
                <div class="d-grid">
                    <a href="http://localhost:8080/fg/miniCRUD/addform.php" class="btn btn-primary ">ADD</a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-10 mx-auto">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>YEAR</th>
                            <th>AVERAGE</th>
                            <th>IMAGE</th>
                            <th>SECTION</th>
                            <th>DATE</th>
                            <th>OPTION</th>
                        </tr>
                    </thead>
                    <tbody>
';
$body_html = '
        <tr>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>
                <a href="http://localhost:8080/fg/miniCRUD/delete.php/?id=%s" class="btn btn-danger">DELETE</a>
                <a href="http://localhost:8080/fg/miniCRUD/updateform.php/?id=%s" class="btn btn-success">UPDATE</a>
            </td>
        </tr>
';
$footer_html = '
                </tbody>
            </table>
        </div>
    </div>
</div>
';
printf($head_html);

$db->select($body_html);

printf($footer_html);

include_once('inc/footer.php');