<?php

    /**
     * helpers.php
     *
     * Computer Science E-75
     * Project0
     *
     * Helper functions.
     */

    // Maximum quantity of items in an order
    define('MAX_QUANT', 100);

    // enable sessions
    session_start();

    /**
     * Renders template.
     */
    function render($template, $data = [])
    {
        $path = __DIR__ . '/../views/' . $template . '.php';
        if (file_exists($path))
        {
            extract($data);
            require($path);
        }
    }

    /**
     * Renders an error message.
     */
    function error_message($message)
    {
        render('header', ['title' => 'Error']);
        render('error_message', ['message' => $message]);
        render('footer');
        exit;
    }

    /**
     * Finds total order price.
     **/
    function total()
    {
        // return early if no orders
        if (empty($_SESSION['orders']))
        {
            return;
        }

        $total = 0;

        foreach ($_SESSION['orders'] as $order)
        {
            // convert quantity to int to avoid float imprecision
            $price = $order['price'] * 100;

            // add order total price to total
            $total += $price * $order['quantity'];
        }

        return $total / 100;
    }

?>
