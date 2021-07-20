<?php
//  Initial list of items if COOKIEE NOT set
// Can be from database if database is available
// TRUE means item is selected, FALSE means item is not selected
    $cart_items = array(
        "smartphone"=>FALSE, 
        "headphones"=>FALSE,
        "laptop"=>FALSE,
        "power bank"=>FALSE,
        "printer"=>FALSE,
        "keyboard"=>FALSE,
        "mouse"=>FALSE
    );

// Check if cookiee available. If available update the cart with items in cookiee
    if (isset($_COOKIE["items"])) {
        $cart_items = json_decode($_COOKIE["items"]);
    }

// Setting the items as list which will be appended to html later.
    $select_items = "<ul id='items_list' class='cart_listing'>";
    foreach($cart_items as $items=>$select) {
        $checked = ($select)?"checked":"";
        $select_items .= "<li>
                            <span>
                                <input type='checkbox' class='items' id='item_$items'
                                     name='$items' value='$items' $checked/>
                                <label for='item_$items'>$items</label>
                            </span>
                        </li>"; 
    }
    $select_items .= "</ul>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | Assignment</title>
    <!-- Load bootstrap for CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style type="text/css">
        .cart_listing {
            list-style: none;
        }
    </style>
</head>
<body>
<!-- Main container div -->
    <div class="container mt-5">
    <!-- Title -->
        <h2>My Shop</h2>
        <div class="cart row col-12">
        <!-- Items Div populated by php -->
            <div class="cart-unselected col-lg-6 col-md-6 col-sm-12">
                <h4>Store</h4>
                <!-- Populate items with PHP -->
                <?php
                    echo $select_items;
                ?>
            </div>
            <!-- Items selected populated by JavaScript -->
            <div class="cart-selected col-lg-6 col-md-6 col-sm-12" >
                <h4>Your Cart</h4>
                <div id="my_cart"></div>
            </div>
        </div>
        <!-- Button to trigger function in php via jquery ajax -->
        <button onclick="set_cookie()" class="btn btn-primary mt-5">Update Cookie</button>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- Javascript for button actions -->
    <script type="text/javascript" src="./js/script.js"></script>
</body>
</html>