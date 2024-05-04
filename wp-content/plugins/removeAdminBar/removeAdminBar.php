<?php
/*
Plugin Name: removeAdminbar
Description: this plugin to remove the admin bar  
Version: 1.0
Author: hamza aboras
*/

add_filter('show_admin_bar','__return_false');