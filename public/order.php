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

        $order_found = False;

        // update current orders quantity if same item
        if (!empty($_SESSION['orders']))
        {
            // search for item occurence
            $n = count($_SESSION['orders']);
            for ($i = 0; $i < $n; $i++)
            {
                // handle different sizes
                if (isset($_POST['size']))
                {
                    if ($_POST['item'] == $_SESSION['orders'][$i]['item'] && $_POST['size'] == $_SESSION['orders'][$i]['size'])
                    {
                        $_SESSION['orders'][$i]['quantity'] += $_POST['quantity'];
                        $order_found = True;
                    }
                }
                else
                {
                    if ($_POST['item'] == $_SESSION['orders'][$i]['item'])
                    {
                        $_SESSION['orders'][$i]['quantity'] += $_POST['quantity'];
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

        // store order in session
        if (!$order_found)
        {
            $_SESSION['orders'][] = $_POST;
        }

        // render page
        render('header', ['title' => 'Order']);
        render('order');
        render('footer');
    }

    var_dump($_SESSION['orders']);

?>
