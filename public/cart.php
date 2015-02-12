<?php

    // configuration
    require('../helpers/helpers.php');
    require('../models/model.php');

    // if form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // if some remove checkboxes were checked
        if (!empty($_POST['id']))
        {
            // search through orders
            foreach ($_SESSION['orders'] as $id => $order)
            {
                if (in_array($id, $_POST['id']))
                {
                    // remove order
                    unset($_SESSION['orders'][$id]);
                }
            }
        }

        // sanitize quantity input
        

        //
        foreach ($_POST as $id => $quantity)
        {
            if (array_key_exists($id, $_SESSION['orders']))
            {
                // update quantity
                $_SESSION['orders'][$id]['quantity'] = $quantity;
            }
        }
    }

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
