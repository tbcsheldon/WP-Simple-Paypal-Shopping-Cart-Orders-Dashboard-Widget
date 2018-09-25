<?php
/**
 * This file could be used to catch submitted form data. When using a non-configuration
 * view to save form data, remember to use some kind of identifying field in your form.
 */
?>
<table>
<thead>
<tr>
	<td><strong>Order #</strong></td>
	<td><strong>Customer Name</strong></td>
	<td><strong>Total:</strong></td>
	<td>&nbsp;</td>
</tr>
</thead>
<tbody>
<?php
$type = 'wpsc_cart_orders';
$args = array( 'posts_per_page' => 10, 'post_type' => $type, 'order'=> 'DESC' );
$postslist = get_posts( $args );
foreach ( $postslist as $wpsc_cart_orders ) :
?> 
<?php 
$order_id = $wpsc_cart_orders->ID;
$first_name = get_post_meta( $wpsc_cart_orders->ID, 'wpsc_first_name', true );
$last_name = get_post_meta( $wpsc_cart_orders->ID, 'wpsc_last_name', true );
$email = get_post_meta( $wpsc_cart_orders->ID, 'wpsc_email_address', true );
$txn_id = get_post_meta( $wpsc_cart_orders->ID, 'wpsc_txn_id', true );
$ip_address = get_post_meta( $wpsc_cart_orders->ID, 'wpsc_ipaddress', true );
$total_amount = get_post_meta( $wpsc_cart_orders->ID, 'wpsc_total_amount', true );
$shipping_amount = get_post_meta( $wpsc_cart_orders->ID, 'wpsc_shipping_amount', true );
$address = get_post_meta( $wpsc_cart_orders->ID, 'wpsc_address', true );
$phone = get_post_meta( $wpsc_cart_orders->ID, 'wpspsc_phone', true );
$email_sent_value = get_post_meta( $wpsc_cart_orders->ID, 'wpsc_buyer_email_sent', true );
?>
<?php //echo $wpsc_cart_orders->ID ?>

<tr>
	<td>#<?php echo $order_id ?></td>
	<td><?php echo get_the_date("m/d/Y", $wpsc_cart_orders->ID); ?></td>
	<td><?php echo $first_name." ".$last_name ?></td>
	<td>$<?php echo $total_amount ?></td>
	<td><a href="<?php echo get_admin_url().'post.php?post='.$wpsc_cart_orders->ID.'&action=edit'; ?>">Manage Order</a></td>
</tr>
<?php
endforeach; 
wp_reset_postdata();

//echo $postslist;
?>
</tbody>
</table>