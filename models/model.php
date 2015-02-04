<?php

    // load menu.xml
    $xml = simplexml_load_file('../models/menu.xml');
    
    // select each categories elements
    $categories = $xml->category;
    
    /**
     * Returns a list of items contained in category.
     */
    function query_items($category)
    {
        global $xml;
        
        $items = $xml->xpath("/menu/category[title='$category']/item");
        
        return $items;
    }
    
?>
