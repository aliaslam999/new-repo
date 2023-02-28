<?php

$dbcon = mysqli_connect("localhost", "root", "12345678", "student_db");
if (!$dbcon) {
    die("Connection error" . mysqli_connect_error());
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PHP Form</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Student Time Schedule
                            <a href="https://student.test/search.php" class="btn btn-primary float-end">Search</a>

                        </h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Teacher Name</th>
                                    <th>Subject</th>
                                    <th>Time</th>

                                </tr>
                            </thead>
                            <?php

                         
                                $query = "SELECT * FROM  teacher_table
                                LEFT JOIN  student_table  
                                ON teacher_table.student_id = student_table.id;";
                                $query_run = mysqli_query($dbcon, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) { ?>

                            <tbody>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['student_name'] ?></td>
                                    <td><?= $row['teacher_name'] ?></td>
                                    <td><?= $row['subject'] ?></td>
                                    <td><?= $row['date'] ?></td>
                                </tr>
                            </tbody>
                            <?php
                                    }
                                }
                        
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>