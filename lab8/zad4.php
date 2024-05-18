<?php
$input = readline("Wprowadź ciąg znaków:");
$input = strtolower($input);
$samogloski = "aeiou";

foreach (count_chars($input, 1) as $i => $val) {
    if(strpos($samogloski, chr($i)) !== false){
        echo "Litera ".chr($i)." występuje ".$val;
        if($val==1)
            echo " raz.\n";
        else
            echo " razy.\n";
    }
}