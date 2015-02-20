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

        // quantities inputs
        foreach ($_POST as $key => $quantity)
        {
            // except remove checkboxes and submits
            if ($key != 'remove' && $key != 'checkout' && $key != 'update')
            {
                // validate submission
                if (empty($_POST[$key]))
                {
                    error_message('please specify a quantity');
                }
                // quantity must be a positive integer
                else if (!preg_match('/^\d+$/', $quantity))
                {
                    error_message('quantity must be a positive integer');
                }
                // validate quantity range
                else if ($quantity < 1 || $quantity > MAX_QUANT)
                {
                    error_message('quantity must be between 1 and ' . MAX_QUANT);
                }
            }

            // retrieve order id in input name
            $id = str_replace('_qty', '', $key);

            // compare orders ids
            if (array_key_exists($id, $_SESSION['orders']))
            {
                // update quantity
                $_SESSION['orders'][$id]['quantity'] = $quantity;
            }
        }

        // checkout
        if (isset($_POST['checkout']))
        {
            // remember total
            $total = total();

            // unset session variables
            $_SESSION = [];

            // clear cookie
            if (!empty($_COOKIE[session_name()]))
            {
                setcookie(session_name(), '', time() - 42000);
            }

            session_destroy();

            // render checkout page
            render('header', ['title' => 'Checkout']);
            render('checkout', ['total' => $total]);
            render('footer');
            exit;
        }

        // redirect to self to avoid form resubmission
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
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
