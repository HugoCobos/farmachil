<?php
function is_negative_number($number=0){

    if( is_numeric($number) AND ($number<0) ){
        return true;
    }else{
        return false;
    }

}
?>