<?php

    // configuration
    require('../helpers/helpers.php');
    require('../models/model.php');

    // render page
    render('header', ['title' => 'Shopping Cart']);

    if (empty($_SESSION['orders']))
    {
        // if cart is empty
        render('cartempty');
    }
    else
    {
        render('cart');
    }
    render('footer');

?>
