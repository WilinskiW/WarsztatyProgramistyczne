<?php
function pangram($input) {
    $input = strtolower(str_replace(' ', '', $input));
    $bool = true;
    for ($i = 97; $i <= 122; $i++) {
        $char = chr($i);
        if (strpos($input, $char) === false) {
            $bool = false;
            break;
        }
    }

    if($bool === false){
        echo "\nNie jest to pangram";
    }
    else{
        echo "\nJest to pangram";
    }
}

pangram("The quick brown fox jumps over the lazy dog.");
pangram("wyrewolwerowany rewolwerowiec");
?>