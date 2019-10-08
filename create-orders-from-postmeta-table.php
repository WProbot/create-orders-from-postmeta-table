<?php

/*
Plugin Name: Create Orders From wp_post_meta Table
Description: The plugin create orders in wp_posts table from orders (wp_post_meta table) for disaster situations. How to use? Please visit the url: <strong>yoursiteurl/wp-admin/edit.php?post_type=shop_order&intense_create_orders_from_post_meta_table_for_disasters=true</strong>  After the visit, please turn off the plugins.
Version: 1.0.0
Author: Mustafa Kapusuz
License: GPL2
*/


add_action('admin_init', 'intense_create_orders_from_post_meta_table_for_disasters_procesess');

function intense_create_orders_from_post_meta_table_for_disasters_procesess(){

    if(!isset($_GET['intense_create_orders_from_post_meta_table_for_disasters']) || $_GET['intense_create_orders_from_post_meta_table_for_disasters']!=true)
        return;

    /**
     *
     */
    $new_status_for_all_orders = 'wc-processing';


    global $wpdb;

    $postmeta_table = $wpdb->prefix . 'postmeta';

    $orders = $wpdb->get_results("SELECT * FROM $postmeta_table WHERE `meta_key`='_created_via'");

    foreach($orders as $result){

        $order_id = $result->post_id;

        $posts_table = $wpdb->prefix . 'posts';

        $insert_data = array(
            'ID'=>$order_id,
            'post_type'=>'shop_order',
            'post_status'=>$new_status_for_all_orders,
        );

        $wpdb->insert( $posts_table, $insert_data );


    }

    wp_redirect(get_admin_url().'edit.php?post_type=shop_order');

    exit;

}