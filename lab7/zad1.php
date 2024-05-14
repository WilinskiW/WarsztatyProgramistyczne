<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zad1</title>
    <style>
        .makeBlue{
            color: blue;
        }
    </style>
</head>
<body>
<?php
$stolice=array("Italy"=>"Rome",
    "Luxembourg"=>"Luxembourg",
    "Belgium"=> "Brussels",
    "Denmark"=>"Copenhagen",
    "Finland"=>"Helsinki",
    "France" => "Paris",
    "Slovakia"=>"Bratislava",
    "Slovenia"=>"Ljubljana",
    "Germany" => "Berlin",
    "Greece" => "Athens",
    "Ireland"=>"Dublin",
    "Netherlands"=>"Amsterdam",
    "Portugal"=>"Lisbon",
    "Spain"=>"Madrid",
    "Sweden"=>"Stockholm",
    "United Kingdom"=>"London",
    "Cyprus"=>"Nicosia",
    "Lithuania"=>"Vilnius",
    "Czech Republic"=>"Prague",
    "Estonia"=>"Tallin",
    "Hungary"=>"Budapest",
    "Latvia"=>"Riga","Malta"=>"Valetta",
    "Austria" => "Vienna",
    "Poland"=>"Warsaw");
asort($stolice);
for($i=0; $i<4; $i++){
    print "Capital " . "<span class='makeBlue'> of </span>" . array_keys($stolice)[$i] . "<span class='makeBlue'> is </span>" . array_values($stolice)[$i] . "<br>";
}
?>
</body>
</html>