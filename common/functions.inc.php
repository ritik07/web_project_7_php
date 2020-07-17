<?php

function pr($arr){
    echo'<pre>';
    print_r($arr);
}

function prx($arr){
    echo'<pre>';
    print_r($arr);
    die();
}

function get_Safe_value($con, $str){
    if($str!=""){
        $str = trim($str);
        return mysqli_real_escape_string($con, $str);
    }
}


function query_list($qry, $con)
{
    $result = mysqli_query($con,$qry);
    $returnArray = array();
    $i=0;
    while ($row = mysqli_fetch_array($result))
    {
        if ($row)
        {
            $returnArray[$i++] = $row;
        }
    }
    return $returnArray;
}