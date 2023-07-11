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
<?php
$employeeNumber = null;
$lastName = null;
$firstName = null;
$extension = null;
$email = null;
$jobTitle = null;
$officeCode = null;
$reportsTo = null;
$id = null;
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $data = databaseFetch("SELECT * FROM employees WHERE employeeNumber = " . $_GET["id"]);
    $employeeNumber = $data["employeeNumber"];
    $lastName = $data["lastName"];
    $firstName = $data["firstName"];
    $extension = $data["extension"];
    $email = $data["email"];
    $jobTitle = $data["jobTitle"];
    $officeCode = $data["officeCode"];
    $reportsTo = $data["reportsTo"];
    $id = $_GET["id"];
}
?>
<h1>Mitarbeiter</h1>
<form action="save.php<?php echo(isset($id) ? "?id=$id" : "") ?>" method="post">
    <?php
    echo "<div class='mb-3'><label for='employeeNumber' class='form-label' " . (isset($id) ? "hidden" : "") . " >MaNr</label> <input value='$employeeNumber' type='number' class='form-control' name='employeeNumber'></div>";
    ?>
    <div class="mb-3">
        <label for="lastName" class="form-label">Nachname</label>
        <input value="<?php echo $lastName ?>" class="form-control" type="text" name="lastName" required>
    </div>
    <div class="mb-3">
        <label for="firstName" class="form-label">Vorname</label>
        <input value="<?php echo $firstName ?>" class="form-control" type="text" name="firstName" required>
    </div>
    <div class="mb-3">
        <label for="extension" class="form-label">Erweiterung</label>
        <input value="<?php echo $extension ?>" class="form-control" type="text" name="extension" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input value="<?php echo $email ?>" class="form-control" type="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="jobTitle" class="form-label">Arbeit</label>
        <input value="<?php echo $jobTitle ?>" class="form-control" type="text" name="jobTitle" required>
    </div>
    <div class="mb-3">
        <label for="officeCode" class="form-label">Büro</label>
        <select name="officeCode" class="form-select">
            <option value="">None</option>
            <?php
            $data = databaseFetchAll("SELECT officeCode, city FROM offices");
            foreach ($data as $row) {
                echo "<option value='" . $row["officeCode"] . "' " . ($officeCode == $row["officeCode"] ? "selected" : "") . ">" . $row["city"] . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="reportsTo" class="form-label">Boss</label>
        <select name="reportsTo" class="form-select">
            <option value="">None</option>
            <?php
            $data = databaseFetchAll("SELECT employeeNumber, lastName FROM employees");
            foreach ($data as $row) {
                echo "<option value='" . $row["employeeNumber"] . "' " . ($reportsTo == $row["employeeNumber"] ? "selected" : "") . ">" . $row["lastName"] . "</option>";
            }
            ?>
        </select>
    </div>
    <input type="submit" class="btn btn-primary">
</form>
</body>
</html>