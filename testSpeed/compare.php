<!DOCTYPE html>
<?php
include "DatabaseHelper.php";
?>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Show</title>
</head>
<body class="container">
<h1>Mitarbeiter</h1>
<form action="" method="post" class="d-flex flex-column">
    <div class="d-flex flex-row">
        <div class="mb-3 flex-fill">
            <label for="c1" class="form-label">C1</label>
            <select name="c1" class="form-select">
                <option value="">None</option>
                <?php
                $data = databaseFetch("SELECT employeeNumber, lastName FROM employees");
                foreach ($data as $row) {
                    echo "<option value='" . $row["employeeNumber"] . "'>" . $row["lastName"] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3 flex-fill">
            <label for="c2" class="form-label">C2</label>
            <select name="c2" class="form-select">
                <option value="">None</option>
                <?php
                    $data = databaseFetch("SELECT employeeNumber, lastName FROM employees");
                    foreach ($data as $row) {
                        echo "<option value='" . $row["employeeNumber"] . "'>" . $row["lastName"] . "</option>";
                    }
                ?>
            </select>
        </div>
    </div>

    <input type="submit" name="submit" class="btn btn-primary">
</form>
<div class="d-flex flex-row">
    <div class="flex-fill">
        <table class="table table-hover">
            <thead>
            <tr>
                <td>C1</td>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($_POST['c1']) && $_POST['c1'] != null) {
                $data = databaseFetch("SELECT * FROM employees WHERE employeeNumber = " . $_POST["c1"]);
                foreach ($data as $row) {
                    echo "<tr> <td>" . (isset($row) ? $row : "-") . "</td> <td> </tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="flex-fill">
        <table class="table table-hover">
            <thead>
            <tr>
                <td>C2</td>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($_POST['c2']) && $_POST['c2'] != null) {
                $data = databaseFetch("SELECT * FROM employees WHERE employeeNumber = " . $_POST["c2"]);
                foreach ($data as $row) {
                        echo "<tr> <td>" . (isset($row) ? $row : "-") . "</td> <td> </tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>