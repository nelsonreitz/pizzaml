<?php

    // configuration
    require('../helpers/helpers.php');
    require('../models/model.php');

    // if form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // if some remove checkboxes were checked
        if (isset($_POST['id']))
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
