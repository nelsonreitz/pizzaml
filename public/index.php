<?php

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
            render('index', ['categories' => $categories]); 
            break;

        case 'category':
            if (isset($_GET['cat']))
            {
                render('category',
                    [
                        'cat' => $_GET['cat'],
                        'title' => $_GET['cat']
                    ]
                );
            }
            break;
    }   

?>
