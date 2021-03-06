<?php
/*
 * Plugin Name:       delete_format
 * Description:       delete contact foarms.
 * Version:           0.1
 * Author:            AhadoutMed & LouahOussama
 */

function customize_format(){
    // global $wpdb;
    // $sql = "SELECT option_name FROM wp_options WHERE option_value='enable'";
    // $get = $wpdb->get_results($sql);
    $full_name = get_option('full_name','disable');
    $email = get_option('email','disable');
    $phone = get_option('phone','disable');
    $adress = get_option('adress','disable');
    $subject = get_option('subject','disable');
    $message = get_option('message','disable');

    $content = '';
    $content .= '<h1>Contact us!</h1>';

    $content .= '<form method="post">';

    if($full_name == "enable"){
        $content .= '<label for="your_name">Name</label>';
        $content .= '<input type="text" name="name" placeholder="name">';
    }
    if($email == "enable"){
        $content .= '<label for="email">Email</label>';
        $content .= '<input type="text" name="email" placeholder="Email">';
    }
    if($phone == "enable"){
        $content .= '<label for="phone">Phone N°</label>';
        $content .= '<input type="text" name="phone" placeholder="Phone N°">';
    }
    if($adress == "enable"){
        $content .= '<label for="adress">Adress</label>';
        $content .= '<input type="text" name="adress" placeholder="Adress">';
    }
    if($subject == "enable"){
        $content .= '<label for="subject">Subject</label>';
        $content .= '<input type="text" name="subject" placeholder="Subject">';
    }
    if($message == "enable"){
        $content .= '<label for="message">Your message</label>';
        $content .= '<textarea type="text" name="message" placeholder="Message"></textarea>';
    }
    

    $content .= '<input type="submit" name="submit_button" value="Submit!">';

    $content .= '</form>';
    return $content;
}
add_shortcode('customize_format','customize_format');

add_action( 'admin_menu', 'wporg_options_page' );
function wporg_options_page() {
    add_menu_page(
        'customize_format',
        'customize_format Options',
        'manage_options',
        plugin_dir_path(__FILE__) . 'admin/view.php',

        null,
        'dashicons-admin-generic',
        20
    );
}