<?php

    /**
     * helpers.php
     *
     * Computer Science E-75
     * Project0
     *
     * Helper functions.
     */

    /**
     * Renders template.
     */
    function render($template, $data = [])
    {
        $path = __DIR__ . '/../views/' . $template . '.php';
        if (file_exists($path))
        {
            extract($data);
            require('../views/templates/header.php');
            require($path);
            require('../views/templates/footer.php');
        }
    }   
     
?>
