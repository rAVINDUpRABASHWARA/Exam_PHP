<?php


function countrylist()
{ 

    require_once('common.php');

    $dt_countries = selectqryexecute("SELECT * FROM mastercountry ORDER BY CountryOrder;");

    return $dt_countries;

}

function www()
{ 

    return "Ddd";

}

?>