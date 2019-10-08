### Description
The plugin are used in WooCommerce disasters for seed the wp_post table from wp_post_meta table.

The plugin creates orders from post_meta table.

### Warning
- The plugin are used for disasters. To use this plug-in you must have technical knowledge of woocommerce. 

- Data loss is not guaranteed in any way and the plugin author cannot be held responsible for it.

### How To Use?
1- Create a new wp_posts table on phpmyadmin. Install and activate the plugin.

2- As a default, the plugin will create all orders as "processing" status. If you want to the other, you can change this  in **intense-create-orders-from-postmeta-table.php ** with **$new_status_for_all_orders variable **variable 

3- Then visit the **yoursiteurl/wp-admin/edit.php?post_type=shop_order&intense_create_orders_from_post_meta_table_for_disasters=true**

After the proceses, you will return the orders page. You can see the orders by created from the disaster recovery plugins.

4- As a last, you must deactivate the plugin.