<?php

    /**
     * helpers.php
     *
     * Computer Science E-75
     * Project0
     *
     * Helper functions.
     */

    require('../models/model.php');

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
     * Renders the navigation menu.
     */
    function render_nav()
    {
        global $categories;

        // remember current url
        $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        foreach ($categories as $category)
        {
            // relative paths
            if (strpos($host, $_SERVER['SERVER_NAME'] . '/category/') !== False)
            {
                $category->url = $category->title;
            }
            else
            {
                $category->url = 'category/' . $category->title;
            }
        }

        render('nav', ['categories' => $categories]);
    }

    /**
     * Returns a list of items contained in category.
     */
    function query_items($category)
    {
        global $xml;

        $items = $xml->xpath("/menu/category[title='$category']/item");
        return $items;
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
     */
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
            // convert price to int to avoid float imprecision
            $price = $order['price'] * 100;

            // add order total price to total
            $total += $price * $order['quantity'];
        }

        return $total / 100;
    }

?>
