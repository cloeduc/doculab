<?php
	$option = get_option( 'rwpm_option' );
	if (isset( $_POST['submit-mp'] ))
	{
		$error = false;
		$status = array();

		// Check if total pm of current user exceed limit
		$role = $current_user->roles[0];
		$sender = $current_user->user_login;
		$total = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'pm WHERE `sender` = "' . $sender . '" OR `recipient` = "' . $sender . '"' );
		if ( ( $option[$role] != 0 ) && ( $total >= $option[$role] ) )
		{
			$error = true;
			$status[] = __( 'You have exceeded the limit of mailbox. Please delete some messages before sending another.', 'pm4wp' );
		}

		// Get input fields with no html tags and all are escaped
		$subject = strip_tags( $_POST['subject'] );
		$content = $_POST['content'] ;
		$recipient = $_POST['recipient'];
		// Allow to filter content
		$content = apply_filters( 'rwpm_content_send', $content );
		
		// Remove slash automatically in wp
		$subject = stripslashes( $subject );
		$content = stripslashes( $content );

		// Escape sql
		$subject = esc_sql( $subject );
		$content = esc_sql( $content );
		$recipient = esc_sql($recipient);
		// Check input fields
		if ( empty( $recipient ) )
		{
			$error = true;
			$status[] = __( 'Please enter username of recipient.', 'pm4wp' );
		}
		if ( empty( $subject ) )
		{
			$error = true;
			$status[] = __( 'Please enter subject of message.', 'pm4wp' );
		}
		if ( empty( $content ) )
		{
			$error = true;
			$status[] = __( 'Please enter content of message.', 'pm4wp' );
		}
		if ( !$error )
		{
			$numOK = $numError = 0;
			// get user_login field
			$rec = $wpdb->get_var( "SELECT user_login FROM $wpdb->users WHERE display_name = '$rec' LIMIT 1" );
			$new_message = array(
				'id'        => NULL,
				'subject'   => $subject,
				'content'   => $content,
				'sender'    => $sender,
				'recipient' => $rec,
				'date'      => current_time( 'mysql' ),
				'read'      => 0,
				'deleted'   => 0
			);
			// insert into database
			if ( $wpdb->insert( $wpdb->prefix . 'pm', $new_message, array( '%d', '%s', '%s', '%s', '%s', '%s', '%d', '%d' ) ) )
			{
				$numOK++;
				unset( $_REQUEST['recipient'], $_REQUEST['subject'], $_REQUEST['content'] );

				// send email to user
				if ( $option['email_enable'] )
				{
					$sender = $wpdb->get_var( "SELECT display_name FROM $wpdb->users WHERE user_login = '$sender' LIMIT 1" );

					// replace tags with values
					$tags = array( '%BLOG_NAME%', '%BLOG_ADDRESS%', '%SENDER%', '%INBOX_URL%' );
					$replacement = array( get_bloginfo( 'name' ), get_bloginfo( 'admin_email' ), $sender, admin_url( 'admin.php?page=rwpm_inbox' ) );

					$email_name = str_replace( $tags, $replacement, $option['email_name'] );
					$email_address = str_replace( $tags, $replacement, $option['email_address'] );
					$email_subject = str_replace( $tags, $replacement, $option['email_subject'] );
					$email_body = str_replace( $tags, $replacement, $option['email_body'] );

					// set default email from name and address if missed
					if ( empty( $email_name ) )
						$email_name = get_bloginfo( 'name' );

					if ( empty( $email_address ) )
						$email_address = get_bloginfo( 'admin_email' );

					$email_subject = strip_tags( $email_subject );
					if ( get_magic_quotes_gpc() )
					{
						$email_subject = stripslashes( $email_subject );
						$email_body = stripslashes( $email_body );
					}
					$email_body = nl2br( $email_body );

					$recipient_email = $wpdb->get_var( "SELECT user_email from $wpdb->users WHERE display_name = '$rec'" );
					$mailtext = "<html><head><title>$email_subject</title></head><body>$email_body</body></html>";

					// set headers to send html email
					$headers = "To: $recipient_email\r\n";
					$headers .= "From: $email_name <$email_address>\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= 'Content-Type: ' . get_bloginfo( 'html_type' ) . '; charset=' . get_bloginfo( 'charset' ) . "\r\n";

					wp_mail( $recipient_email, $email_subject, $mailtext, $headers );
				}
			}
			else
			{
				$numError++;
			}
			$status[] = sprintf( _n( '%d message sent.', '%d messages sent.', $numOK, 'pm4wp' ), $numOK ) . ' ' . sprintf( _n( '%d error.', '%d errors.', $numError, 'pm4wp' ), $numError );
		}

		echo '<div id="message" class="updated fade"><p>', implode( '</p><p>', $status ), '</p></div>';
	}