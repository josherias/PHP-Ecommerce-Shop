<?php

require_once('./Database.php');

$db  = new Database();

echo $db->isConnected() ? "DB connected" : "Not coonected";

/* 
$db->query("SELECT * FROM tbl_oop_test");
$db->execute();

echo $db->rowCount();
 */

/* db->query("SELECT * FROM tbl_oop_posts WHERE id = :id ");

$db->bind(':id', 1);

$ne = $db->resultset();

var_dump($ne);*/
$db->query("INSERT INTO tbl_oop_test (id, name) VALUES (':id',':name')");

$db->bind(':id', 3);
$db->bind(':name', 'jonah');

$db->execute();
