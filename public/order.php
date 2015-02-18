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
            error_message('Please specify a quantity');
        }
        // quantity must be a positive integer
        else if (!preg_match('/^\d+$/', $_POST['quantity']))
        {
            error_message('Quantity must be a positive integer');
        }
        // validate quantity range
        else if ($_POST['quantity'] < 1 || $_POST['quantity'] > MAX_QUANT)
        {
            error_message('Quantity must be between 1 and ' . MAX_QUANT);
        }

        $order_found = False;

        // update current orders quantity if same item
        if (!empty($_SESSION['orders']))
        {
            // search through orders
            foreach ($_SESSION['orders'] as $id => $order)
            {
                // handle different sizes
                if (isset($_POST['size']))
                {
                    if ($_POST['item'] == $order['item'] && $_POST['size'] == $order['size'])
                    {
                        $_SESSION['orders'][$id]['quantity'] += $_POST['quantity'];
                        $order_found = True;
                    }
                }
                else
                {
                    if ($_POST['item'] == $order['item'])
                    {
                        $_SESSION['orders'][$id]['quantity'] += $_POST['quantity'];
                        $order_found = True;
                    }
                }
            }
        }

        // find correct price
        if (isset($_POST['small']) || isset($_POST['large']))
        {
            $_POST['price'] = $_POST[$_POST['size']];
        }

        // generate a unique id for the order
        $id = uniqid();

        // store order in session
        if (!$order_found)
        {
            $_SESSION['orders'][$id] = $_POST;
        }

        // render page
        render('header', ['title' => 'Order']);
        render('order');
        render('footer');
    }

?>
