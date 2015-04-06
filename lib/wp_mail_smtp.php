<?php
/**
 * This function will connect wp_mail to your authenticated
 * SMTP server. This improves reliability of wp_mail, and 
 * avoids many potential problems.
 *
 * Author:     Chad Butler
 * Author URI: http://butlerblog.com
 *
 * For more information and instructions, see:
 * http://b.utler.co/Y3
 */
add_action( 'phpmailer_init', 'send_smtp_email' );
function send_smtp_email( $phpmailer ) {

	// Define that we are sending with SMTP
	$phpmailer->isSMTP();

	// The hostname of the mail server
	$phpmailer->Host = "smtp-relay.gmail.com";

	// Use SMTP authentication (true|false)
	$phpmailer->SMTPAuth = false;

	// SMTP port number - likely to be 25, 465 or 587
	$phpmailer->Port = "25";

/*
	// Username to use for SMTP authentication
	$phpmailer->Username = "yourusername";

	// Password to use for SMTP authentication
	$phpmailer->Password = "yourpassword";
*/

	// Encryption system to use - ssl or tls
	$phpmailer->SMTPSecure = "tls";

	$phpmailer->From = "info@logicleague.com";
	$phpmailer->FromName = "Yazane";
}
