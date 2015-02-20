<?php

    /**
     * index.php
     *
     * Computer Science E-75
     * Project0
     *
     * Nelson Reitz
     * http://github.com/nelsonreitz/project0/
     *
     * Main controller.
     */

    // configuration
    require('../helpers/helpers.php');
    require('../models/model.php');

    // determine which page to render
    if (isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 'index';
    }

    // show page
    switch ($page)
    {
        case 'index':
            render('header');
            render('index');
            render('footer');
            break;

        case 'category':
            if (isset($_GET['cat']))
            {
                $cat   = $_GET['cat'];
                $items = query_items($cat);

                render('header', ['title' => $cat]);
                render('category', ['items' => $items]);
                render('footer');
            }
            break;
    }

?>
