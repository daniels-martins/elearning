<?php

use Illuminate\Support\Facades\Route;

/**
 * Get the Current Route Name or Base name of the current url
 */
function thisRoute()
{
   // $url =  str_replace('_', ' ', basename(url()->current()));
   $urlArray =  explode('.', Route::currentRouteName());
   $prepend = '';
   $append = '';
   // checking for a dynamic programming, by scanning the ending part
   if ($urlArray[1] == 'show')
      $append = ' information';

   if ($urlArray[1] == 'edit') {
      $prepend = 'Modify ';
      $append = ' information';
   }

   $url = strtolower($prepend . $urlArray[0] . $append);$url = strtolower($prepend . $urlArray[0] . $append);

   // $url = strtolower();
   switch ($url) {
      case 'dashboard':
         $name = 'Student Dashboard';
         break;
      case 'dashboard3':
         $name = 'Admin Dashboard';
         break;
      case 'dashboard2':
         $name = 'Company Dashboard';
         break;
      default:
         $name = $url;
         break;
   }

   return ucwords($name);
}



function normalizeKebab(string $stringToNormalize)
{
   return str_replace('_', ' ', $stringToNormalize);
}
