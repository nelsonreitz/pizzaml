<?php

    // load menu.xml
    $xml = simplexml_load_file('../models/menu.xml');
    
    // select categories elements
    $categories = $xml->category;
    
    /**
     * Renders a list of items cointaned in a category.
     */
    function render_items($category)
    {
        global $xml;
        
        // select items of category
        $items = $xml->xpath("/menu/category[title='$category']/item");
        
        // for each items
        while (list( , $node) = each($items))
        {
            echo '<ul>';
            echo "<li>$node->name</li>";
            
            // render description if any
            if (isset($node->description))
            {
                echo "<li>$node->description</li>";
            }
            
            // for each prices
            foreach ($node->price as $price)
            {
                if (isset($price['size']))
                {
                    echo '<li>'. $price['size'] . ': $' . $price . '</li>';
                }
                else
                {
                    echo '<li>$' . $price . '</li>';
                }
            }
            echo '</ul>';
        }
    }

?>
