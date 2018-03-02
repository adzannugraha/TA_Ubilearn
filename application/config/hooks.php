<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
<<<<<<< HEAD
$hook['post_controller_constructor'][] = [
    'class'    => 'EloquentHook',
    'function' => 'bootEloquent',
    'filename' => 'EloquentHook.php',
    'filepath' => 'hooks'
];
=======
 $hook['post_controller_constructor'][] = [
     'class'    => 'EloquentHook',
     'function' => 'bootEloquent',
     'filename' => 'EloquentHook.php',
     'filepath' => 'hooks'
 ];
>>>>>>> dd31d7aecf27bb38fac52995c84eaac8f1ea75a4

/* ----------------------------------------------------------------- */
/* | | Added as part of the usertracking library by Casey McLaughlin.
Please ensure | that you have the Usertracking.php file installed in your application/library folder! */
$hook['post_controller_constructor'][] = [
    'class' => 'Usertracking', 
    'function' => 'auto_track', 
    'filename' => 'Usertracking.php', 
    'filepath' => 'libraries'
];