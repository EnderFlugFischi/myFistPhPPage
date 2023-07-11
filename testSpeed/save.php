<?php
include "DatabaseHelper.php";

$quary = "INSERT INTO employees (employeeNumber, lastName, firstName, extension, email, officeCode, reportsTo, jobTitle) VALUES (:employeeNumber, :lastName, :firstName, :extension, :email, :officeCode, :reportsTo, :jobTitle)";
$message = "Erfolgreich Gespeichert!";
$_POST = cleanInput($_POST);
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $data = databaseFetch("SELECT employeeNumber FROM employees WHERE employeeNumber = " . $_GET["id"]);
    if ($data) {
        $quary = "UPDATE employees SET employeeNumber=:employeeNumber, lastName=:lastName, firstName=:firstName, extension=:extension, email=:email, officeCode=:officeCode, reportsTo=:reportsTo, jobTitle=:jobTitle WHERE employeeNumber = " . $_GET["id"];
    }
} elseif (isset($_GET["id"]) && !is_numeric($_GET["id"])) {
    $message = "Fehler Beim Speichern des Datensatzes!";
    Header("Location: index.php?message=$message");
}
if (!isset($_GET["id"])) {
    $data = databaseFetch("SELECT employeeNumber FROM employees WHERE employeeNumber = " . $_POST["employeeNumber"]);
    if ($data) {
        $message = "Mitarbeiter Nummer existiert bereits!!";
        Header("Location: index.php?message=$message");

    }
}
$data = databaseFetch($quary);
Header("Location: index.php?message=$message");

function cleanInput($data)
{
    foreach ($data as $key => $item) {
        if (empty($item)) {
            $data[$key] = null;
        }
    }
    return $data;
}
