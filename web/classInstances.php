<?php

/* require database class */
require_once('./Database/Database.php');

/* require Product class */
require_once('./Database/Product.php');


/* require Cart class */
require_once('./Database/Cart.php');


/* require User class */
require_once('./Database/User.php');


/* require User class */
require_once('./Database/Category.php');




/* creating database object */
$db = new Database();

/* create product object */
$product = new Product($db);



/* create cart object */
$cart = new Cart($db);

/* create user object */
$user = new User($db);


$category = new Category($db);
