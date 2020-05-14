<?php


if (!function_exists('page_name')) {

    function page_name()
    {
        if (Request::is('/')) {
            return 'Home';
        }

        if (Request::is('user*')) {
            return 'User';
        }

        if (Request::is('listing*')) {
            return 'Listing';
        }
    }           
}

if(!function_exists('get_day_type')){

    function get_day_type(){

        $time = date("H");
        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");
        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $dayType = Lang::get('Good morning');
        } elseif /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        ($time >= "12" && $time < "17") {
            $dayType = Lang::get('Good afternoon');
        } elseif /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        ($time >= "17" && $time < "19") {
            $dayType = Lang::get('Good evening');
        } elseif /* Finally, show good night if the time is greater than or equal to 1900 hours */
        ($time >= "19") {
            $dayType = Lang::get('Good night');
        }

        return $dayType;
        
    }
}