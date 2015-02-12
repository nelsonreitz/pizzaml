<?php

    // configuration
    require('../helpers/helpers.php');
    require('../models/model.php');

    // if form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // if some remove checkboxes were checked
        if (!empty($_POST['remove']))
        {
            // search through orders
            foreach ($_SESSION['orders'] as $id => $order)
            {
                if (in_array($id, $_POST['remove']))
                {
                    // remove order
                    unset($_SESSION['orders'][$id]);
                }
            }
        }

        // sanitize quantity input
        

        // quantities
        foreach ($_POST as $key => $quantity)
        {
            // retrieve order id in input name
            $id = str_replace('_qty', '', $key);

            // compare orders ids
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
