<?php
include_once('database.php');
include_once('inc/header.php');
$sql = "SELECT * FROM estudiantes";
$result = mysqli_query($conn, $sql);

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

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        printf($body_html,
            $row['id'],
            $row['nombre'],
            $row['edad'],
            $row['promedio'],
            $row['imagen'],
            $row['id_seccion'],
            $row['fecha'],
            $row['id'],
            $row['id'],
        );
    }
} else {
    echo "0 results";
}

printf($footer_html);

include_once('inc/footer.php');