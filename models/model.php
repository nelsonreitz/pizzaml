<?php

    // load menu.xml
    $xml = simplexml_load_file('../models/menu.xml');

    // select each categories elements
    $categories = $xml->category;

?>
