<?php

    // load menu.xml
    $xml = simplexml_load_file('../models/menu.xml');
    
    // select categories elements
    $categories = $xml->category;
    
    /**
     * Renders a list of items contained in a category.
     */
    function render_items($category)
    {
        global $xml;
        
        // select items of category
        $items = $xml->xpath("/menu/category[title='$category']/item");
        
        // for each items
        foreach ($items as $node)
        {
            echo '<ul>';
            echo   "<li>$node->name</li>";
            
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
            echo '<form action="order.php" method="post">';
            echo   '<input type="number" name="quantity" value="1" min="1" max="100" />';
            
            if (isset($node->price[0]['size']))
            {
                echo '<select name="size">';
                
                foreach ($node->price as $price)
                {
                    echo '<option value="' . $price['size'] . '">' . $price['size'] . '</option>';
                }
                
                echo '</select>';              
            }
            
            echo   '<button type="submit">Order</button>';
            echo '</form>';
        }
    }

?>
