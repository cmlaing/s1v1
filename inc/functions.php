<?php
function get_item_html($id,$item) {
    $output = "<li><a href='details.php?id="
        . $id . "'><img src='" 
        . $item["img"] . "' alt='" 
        . $item["title"] . "' />" 
        . "<p>View Details</p>"
        . "</a></li>";
    return $output;
}

function array_category($catalog, $category) {
         #if section=null on index.php, nothing shows up on page. Let's fix that.
        #if ($category == null) {
         #   return array_keys($catalog);}
         #will move this to foreach below

        $output = array();
        foreach ($catalog as $id => $item) {
             if (($category == null) OR strtolower($category) == strtolower($item["category"])) {
                #strtolower makes "Books" and "books" the same for example

                #now we can sort by title
                $sort = $item["title"];
                #trim off a, the, from the beg of title
                $sort = ltrim($sort, "The "); #need the space to avoid cutting off words like theme
                $sort = ltrim($sort, "A ");
                $sort = ltrim($sort, "An ");

                $output[$id] = $sort; #assign the value to sort
                
            }
        }
        asort($output); #sorts the array
        return array_keys($output); #return only the keys

}