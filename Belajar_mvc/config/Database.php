<?php
function getDBConnection()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=dbmvc', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;  
    }
}


function getAllData($users)
{
    $db = getDBConnection();
    $stmt = $db->prepare("SELECT * FROM $users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function deleteDataById($users, $id)
{
    $db = getDBConnection();
    $stmt = $db->prepare("DELETE FROM $users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute(['id' => $id]);
}


function updateDataById($users, $data, $id)
{
    $db = getDBConnection();
    $fields = '';
    foreach ($data as $key => $value) {
        $fields .= "$key = :$key, ";
    }
    $fields = rtrim($fields, ', ');
    $sql = "UPDATE $users SET $fields WHERE id = :id";
    
    $stmt = $db->prepare($sql);
    foreach ($data as $key => &$value) {
        $stmt->bindParam(":$key", $value);
    }
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}
function addData($users, $data)
{
    $db = getDBConnection();
    $fields = implode(", ", array_keys($data));
    $placeholders = ":" . implode(", :", array_keys($data));

    $sql = "INSERT INTO $users ($fields) VALUES ($placeholders)";
    $stmt = $db->prepare($sql);

    foreach ($data as $key => &$value) {
        $stmt->bindParam(":$key", $value);
    }

    return $stmt->execute();
}

?>
