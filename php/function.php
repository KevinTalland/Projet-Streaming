<?php
function getTitleFormat($nom){
    $format = str_replace(" ","", $nom);
    $format = str_replace(":","", $format);
    $format = str_replace("'","", $format);
    $format = str_replace("-","", $format);
    $format = str_replace("é","e", $format);
    $format = str_replace("à","a",$format);
    return $format;
}