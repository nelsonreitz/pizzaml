<?php

    // configuration
    require('../helpers/helpers.php');
    require('../models/model.php');

    // if form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // validate submission
        if (empty($_POST['quantity']))
        {
            // error message
            echo 'error';
        }
        else
        {
            // cast quantity to int
            $quantity = (int) $_POST['quantity'];
        }

        // validate submission
        if ($quantity < 1 || $quantity > 50)
        {
            // error message
            echo 'error';
        }

        // find correct price
        if (isset($_POST['small']) || isset($_POST['large']))
        {
            $_POST['price'] = $_POST[$_POST['size']];
        }

        // store order in session
        $_SESSION['orders'][] = $_POST;

        // render page
        render('header', ['title' => 'Order']);
        render('order');
        render('footer');
    }

    var_dump($_SESSION['orders']);

?>
