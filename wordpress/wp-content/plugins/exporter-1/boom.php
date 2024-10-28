<?php
/*
Plugin Name: User Export with Passwords
Description: A simple plugin to export users' details, including plaintext passwords (if available).
Version: 1.0
Author: Your Name
*/

// Prevent direct access to the file
if (!defined('ABSPATH')) {
    exit;
}

// Function to export users
function ue_export_users() {
    if (!current_user_can('manage_options')) {
        return;
    }

    // Get users
    global $wpdb;
    $users = $wpdb->get_results("SELECT ID, user_login, user_email, user_pass FROM $wpdb->users");

    // Prepare CSV output
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="users-export.csv"');

    $output = fopen('php://output', 'w');
    fputcsv($output, array('User ID', 'Username', 'Email', 'Password'));

    // Write user data
    foreach ($users as $user) {
        $plaintext_password = ''; // Implement your own logic to get plaintext passwords if necessary
        fputcsv($output, array($user->ID, $user->user_login, $user->user_email, $plaintext_password));
    }

    fclose($output);
    exit();
}

// Create admin menu item
function ue_add_admin_menu() {
    add_menu_page('User Export', 'User Export', 'manage_options', 'user-export', 'ue_export_users');
}

// Hook menu creation
add_action('admin_menu', 'ue_add_admin_menu');

