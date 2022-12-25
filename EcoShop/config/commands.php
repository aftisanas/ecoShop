<?php

/************************ START CRUD *************************/

// add a new product
function AddProduct($name, $img, $price, $desc)
{
    if (require('connection.php')) {
        $response = $access->query(" INSERT INTO products (prod_name, image, price, description) VALUES ('$name', '$img', '$price', '$desc')");

        // $response->execute(array($name, $img, $price, $desc));
        // $response->closeCursor();
    }
}

// display products
function displayAllProducts()
{
    if (require('connection.php')) {
        $response = $access->prepare("SELECT * FROM products ORDER BY id desc");

        $response->execute();
        
        $data = $response->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }
}

// display a one product
function displayProduct($id)
{
    if (require('connection.php')) {
        $response = $access->prepare("SELECT * FROM products WHERE id = '$id'");

        $response->execute();
        
        $data = $response->fetch(PDO::FETCH_OBJ);

        return $data;
    }
}

// UPDATE product
function updateProduct($name, $img, $price, $desc, $id)
{
    if (require('connection.php')) {
        $response = $access->query("UPDATE  products SET prod_name = '$name', image = '$img', price = '$price', description = '$desc' WHERE id = '$id'");
;
    }
}

// delete product
function DeleteProduct($id)
{
    if (require('connection.php')) {
        $response = $access->query(" DELETE FROM products WHERE id = '$id'");

        // $response->execute(array($id));
        
    }
}

/*--------------------------------------------------------------*/


// ADMIN LOGIN

function getAdmin($email, $password)
{
    if (require('connection.php')) {
        $response = $access->query(" SELECT * FROM admin WHERE email = '$email' AND pass = '$password'");

        if ($response->rowCount() == 1) {
            $data = $response->fetch();
            return $data;
        }else {
            return false;
        }
        
    }
}

// USER register 

function addUser($fullName, $username, $email, $password)
{
    if (require('connection.php')) {
        $access->query(" INSERT INTO products (fullName, username, email, password, userType) VALUES ('$fullName', '$username', '$email', '$password', '0')");

        return true;
        
    }
}

function getUser($email, $password)
{
    if (require('connection.php')) {
        $response = $access->query(" SELECT * FROM user WHERE email = '$email' AND password = '$password'");

        if ($response->rowCount() == 1) {
            $data = $response->fetch();
            return $data;
        }else {
            return false;
        }
        
    }
}
?>