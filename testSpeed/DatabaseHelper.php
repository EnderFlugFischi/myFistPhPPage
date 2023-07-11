<?php
function databaseFetch($quaryString)
{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels", "root", "1234");
    $stmt = $conn->prepare($quaryString);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function databaseFetchAll($quaryString)
{
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels", "root", "1234");
    $stmt = $conn->prepare($quaryString);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}