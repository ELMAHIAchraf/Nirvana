<?php
    $colors=simplexml_load_file("colors.xml");
    function fetch($search){
        global $colors;
        for($i=0; $i<count($colors->color); $i++){
            if($colors->color[$i]->id_color==$search){
                return $colors->color[$i]->color_code;                   
            }
        }
    }
?>