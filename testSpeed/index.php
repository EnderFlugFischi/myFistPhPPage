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
    <title>Liste</title>
</head>
<body class="container">
<?php
if (isset($_GET["message"])) {
    echo "<h3>" . $_GET["message"] . "</h3>";
    Header("Refresh: 2; index.php");

}
?>
<h1>Mitarbeiter</h1>
<a href="show.php" role="button" style="margin-left: 10px" class="btn btn-primary">ADD</a>
<a href="compare.php" role="button" style="margin-left: 10px" class="btn btn-primary">COMPARE</a>
<table class="table table-hover">
    <thead>
    <tr>
        <td>Name</td>
        <td>Erweiterung</td>
        <td>E-mail</td>
        <td>Stadt</td>
        <td>attresse1</td>
        <td>attresse2</td>
        <td>Land</td>
        <td>Land2</td>
        <td>Bereich</td>
        <td>Boss</td>
        <td>Job Titel</td>
        <td>Link</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $data = databaseFetchAll("SELECT concat(e1.lastName, ' ', e1.firstName) as empName, e1.extension, e1.email, offices.city, offices.addressLine1,
                                    offices.addressLine2, offices.state, offices.country, offices.territory, concat(e2.lastName, ' ', e2.firstName) AS boss,
                                    e1.jobTitle, e1.employeeNumber
                                    FROM employees AS e1 INNER JOIN offices ON offices.officeCode = e1.officeCode 
                                    LEFT JOIN employees AS e2 ON e2.employeeNumber = e1.reportsTo
                                    ORDER BY concat(e1.lastName, ' ', e1.firstName)");
    foreach ($data as $row) {
        echo "<tr>";
        foreach ($row as $key => $item) {
            if ($key == "employeeNumber") {
                echo "<td><a href='show.php?id=$item' class='btn btn-secondary btn-sm' role='button'>update</a></td>";
                continue;

            }
            echo "<td>" . (isset($item) ? $item : "-") . "</td>";
        }
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
</body>
</html>

