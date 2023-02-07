<?php 
     if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
     if ( ! function_exists('ariary')) {
     function ariary($vola) {
        echo number_format($vola,0," "," ")."Ar";
     }
    }
?>