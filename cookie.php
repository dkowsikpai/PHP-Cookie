<?php
// get items from post
    $items = $_POST["items"]; // ["laptop", "smartphone"]

// default items available
// init by unselecting all items
// values can be from database
    $cart_items = array(
        "smartphone"=>FALSE,
        "headphones"=>FALSE,
        "laptop"=>FALSE,
        "power bank"=>FALSE,
        "printer"=>FALSE,
        "keyboard"=>FALSE,
        "mouse"=>FALSE
    );

// if any items selected then length of items variable will be > 0
// make it true if item was selected
    if (count($items) > 0) {
        foreach($items as $item) {
            $cart_items[$item] = TRUE;
        }
    }

// Update Cookie
    setcookie('items', json_encode($cart_items));

// sending response back (Not mandatory)
    $json_data = array();
    $json_data["aa"] =  $cart_items;
    header("Content-Type: application/json");
    echo json_encode($json_data);
?>