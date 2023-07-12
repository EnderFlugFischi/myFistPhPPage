# Here a list of the most importand things

The databese Connection
```
$conn = new PDO("mysql:host=localhost;dbname=classicmodels", "root", "1234");
    $stmt = $conn->prepare($quaryString);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
```
The Table
```
<table class="table table-hover">
    <thead>
    <tr>
        <td>Name</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $data = databaseFetchAll("");
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
```
The Bootstrap
```
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Liste</title>
</head>
```
