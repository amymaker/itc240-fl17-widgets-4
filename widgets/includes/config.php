<?php
/*
config.php

stores configuration information for our web application

*/

//prevents header already sent errors
ob_start();

define('DEBUG',TRUE); #we want to see all errors

//create config object
$config = new stdClass;

//prevents date errors.
date_default_timezone_set('America/Los_Angeles');


//add include references here:
include 'credentials.php';//database credentials here
include 'common.php';//favorite functions here


//find the current page URL:

//echo basename($_SERVER['PHP_SELF']);
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//START NEW THEME STUFF
$sub_folder = 'widgets';//change to 'widgets' or 'sprockets' etc.

//add subfolder, in this case 'fidgets' if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
$config->virtual_path = 'http://' . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;
$config->theme = 'BusinessCasual';//sub folder to themes

//END NEW THEME STUFF

//webpage defaults
$config->title = THIS_PAGE;
$config->banner = 'Widget Website';
$config->logo = 'Widget Website';

switch(THIS_PAGE)
{
    case 'index.php':
        $config->title = "Home Page";
        $config->banner = "Widgets Home Page";
        $config->logo = 'fa-home';
    break; 
    
    case 'appointment.php':
        $config->title = "Appointment Page";
         $config->banner = "Widgets Appointment Page";
        $config->logo = 'fa-calendar-check-o';
    break;
        
    case 'contact.php':
        $config->title = "Contact Page";
        $config->logo = 'fa-envelope';
    break;    
    
    case 'customers.php':
        $config->title = "Customers Page";
        $config->logo = 'fa-users';
    break;
        
    case 'daily.php':
        $config->title = "Daily Page";
        $config->logo = 'fa-clock-o';
    break;
        
    case 'instrument_list.php':
        $config->title = "Instrument Page";
        $config->logo = 'fa-music';
    break;
        
    case 'instrument_view.php':
        $config->title = "Instrument List Page";
        $config->logo = 'fa-music';
    break;
}

//START NEW THEME STUFF
//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . '/themes/' . $config->theme . '/';
//END NEW THEME STUFF


?>