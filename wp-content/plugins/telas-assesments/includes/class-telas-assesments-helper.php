<?php

/**
 * The helper functionality of the plugin.
 *
 * @link       www.telas.edu.au 
 * @since      1.0.0
 *
 * @package    Telas_Assesments
 * @subpackage Telas_Assesments/includes
 */

/**
 * The helper functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the helper stylesheet and JavaScript.
 *
 * @package    Telas_Assesments
 * @subpackage Telas_Assesments/admin
 * @author     TELAS <telas@contactus.com>
 */
class Telas_Assesments_Helper {
    public static function get_email_body( $title = 'TELAS Notification' , $header_image = '', $message_heading = '', $message_body = '', $signature = '', $has_aside = true, $button_link = '', $button_text = '' ) {
        ob_start();
		?>
		<!doctype html>
		<html lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width">
			<title><?php echo $title; ?></title>
			<style type="text/css">@media only screen and (max-width: 599px) {table.body .container {width: 95% !important;}.header {padding: 15px 15px 12px 15px !important;}.header img {width: 200px !important;height: auto !important;}.content, .aside {padding: 30px 40px 20px 40px !important;}}</style>
		</head>
		<body style="height: 100% !important; width: 100% !important; min-width: 100%; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; -webkit-font-smoothing: antialiased !important; -moz-osx-font-smoothing: grayscale !important; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #444; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: normal; padding: 0; margin: 0; Margin: 0; font-size: 14px; mso-line-height-rule: exactly; line-height: 140%; background-color: #f1f1f1; text-align: center;">
		<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" class="body" style="border-collapse: collapse; border-spacing: 0; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; height: 100% !important; width: 100% !important; min-width: 100%; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; -webkit-font-smoothing: antialiased !important; -moz-osx-font-smoothing: grayscale !important; background-color: #f1f1f1; color: #444; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: normal; padding: 0; margin: 0; Margin: 0; text-align: left; font-size: 14px; mso-line-height-rule: exactly; line-height: 140%;">
			<tr style="padding: 0; vertical-align: top; text-align: left;">
				<td align="center" valign="top" class="body-inner wp-mail-smtp" style="word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #444; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: normal; padding: 0; margin: 0; Margin: 0; font-size: 14px; mso-line-height-rule: exactly; line-height: 140%; text-align: center;">
					<!-- Container -->
					<table border="0" cellpadding="0" cellspacing="0" class="container" style="border-collapse: collapse; border-spacing: 0; padding: 0; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; width: 600px; margin: 0 auto 0 auto; Margin: 0 auto 0 auto; text-align: inherit;">
						<!-- Header -->
                        <?php if ( ! empty( $header_image ) ) : ?>
                            <tr style="padding: 0; vertical-align: top; text-align: left;">
                                <td align="center" valign="middle" class="header" style="word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #444; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: normal; margin: 0; Margin: 0; font-size: 14px; mso-line-height-rule: exactly; line-height: 140%; text-align: center; padding: 30px 30px 22px 30px;">
                                    <img src="<?php echo esc_url( $header_image ); ?>" width="250" alt="WP Mail SMTP Logo" style="outline: none; text-decoration: none; max-width: 100%; clear: both; -ms-interpolation-mode: bicubic; display: inline-block !important; width: 250px;">
                                </td>
                            </tr>
                        <?php endif; ?>
						<!-- Content -->
						<tr style="padding: 0; vertical-align: top; text-align: left;">
							<td align="left" valign="top" class="content" style="word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #444; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: normal; margin: 0; Margin: 0; text-align: left; font-size: 14px; mso-line-height-rule: exactly; line-height: 140%; background-color: #ffffff; padding: 60px 75px 45px 75px; border-right: 1px solid #ddd; border-bottom: 1px solid #ddd; border-left: 1px solid #ddd; border-top: 3px solid #809eb0;">
								<div class="success" style="text-align: center;">
									<?php if ( ! empty( $message_heading ) ) : ?>
									<p class="text-extra-large text-center congrats" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #444; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: normal; padding: 0; mso-line-height-rule: exactly; line-height: 140%; font-size: 20px; text-align: center; margin: 0 0 20px 0; Margin: 0 0 20px 0;">
										<?php echo $message_heading; ?>
									</p>
                                    <?php endif; if ( ! empty( $message_body ) ) : ?>
                                        <p class="text-large" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #444; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: normal; padding: 0; text-align: left; mso-line-height-rule: exactly; line-height: 140%; margin: 0 0 15px 0; Margin: 0 0 15px 0; font-size: 16px;">
                                            <?php echo $message_body; ?>
                                        </p>
										<?php if ( ! empty( $signature ) ) : ?>
											<p class="signature" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #444; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: normal; padding: 0; font-size: 14px; mso-line-height-rule: exactly; line-height: 140%; text-align: left; margin: 20px 0 0 0; Margin: 20px 0 0 0;">
											</p>
											<p style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #444; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: normal; padding: 0; text-align: left; font-size: 14px; mso-line-height-rule: exactly; line-height: 140%; margin: 0 0 15px 0; Margin: 0 0 15px 0;">
												<?php echo $signature; ?>
											</p>
										<?php endif; ?>
                                    <?php endif; ?>
								</div>
							</td>
						</tr>
						<!-- Aside -->
						<?php if ( $has_aside ) : ?>
							<tr style="padding: 0; vertical-align: top; text-align: left;">
								<td align="left" valign="top" class="aside upsell-mi" style="word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #444; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: normal; margin: 0; Margin: 0; font-size: 14px; mso-line-height-rule: exactly; line-height: 140%; background-color: #f8f8f8; border-top: 1px solid #dddddd; border-right: 1px solid #dddddd; border-bottom: 1px solid #dddddd; border-left: 1px solid #dddddd; text-align: center !important; padding: 30px 75px 25px 75px;">
									<center style="width: 100%;">
										<table class="button large expanded orange" style="border-collapse: collapse; border-spacing: 0; padding: 0; vertical-align: top; text-align: left; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #e27730; width: 100% !important;">
											<tr style="padding: 0; vertical-align: top; text-align: left;">
												<td class="button-inner" style="word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #444; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: normal; margin: 0; Margin: 0; text-align: left; font-size: 14px; mso-line-height-rule: exactly; line-height: 100%; padding: 20px 0 20px 0;">
													<table style="border-collapse: collapse; border-spacing: 0; padding: 0; vertical-align: top; text-align: left; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; width: 100% !important;">
														<tr style="padding: 0; vertical-align: top; text-align: left;">
															<td style="word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: normal; padding: 0; margin: 0; Margin: 0; font-size: 14px; text-align: center; color: #ffffff; background: #e27730; border: 1px solid #c45e1b; border-bottom: 3px solid #c45e1b; mso-line-height-rule: exactly; line-height: 100%;">
																<a href="<?php echo esc_url( $button_link ); ?>" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; margin: 0; Margin: 0; font-family: Helvetica, Arial, sans-serif; font-weight: bold; color: #ffffff; text-decoration: none; display: inline-block; border: 0 solid #c45e1b; mso-line-height-rule: exactly; line-height: 100%; padding: 14px 20px 12px 20px; font-size: 20px; text-align: center; width: 100%; padding-left: 0; padding-right: 0;">
																	<?php echo $button_text; ?>
																</a>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</center>
								</td>
							</tr>
						<?php endif; ?>
					</table>
				</td>
			</tr>
		</table>
		</body>
		</html>

		<?php
		$message = ob_get_clean();

		return $message;
	}
	
	public static function get_telas_admin_emails() {
		$all_telas_admin_emails = array();
		$all_telas_admins = get_users( array( 'role' => 'telas_telas_administrator' ) );
		foreach( $all_telas_admins as $telas_admin ) {
			array_push( $all_telas_admin_emails, $telas_admin->user_email );
		}
		return $all_telas_admin_emails;
  	}
  
  	public static function send_new_user_welcome_email( $user_id ) {
    	$new_user_welcome_email_options = get_option( 'new-user-welcome-email-template' );
    	$subject = $new_user_welcome_email_options['subject'];
    	$email_body = $new_user_welcome_email_options['emailBody'];
    	$email_salutation = $new_user_welcome_email_options['salutation'];
		$message_heading = $subject;
		$button_link = 'https://app.telas.edu.au/login/';
		$button_text = 'Login';
		$message = Telas_Assesments_Helper::get_email_body( $message_heading, $header_image, $message_heading, $email_body, $email_salutation, $has_aside = true, $button_link, $button_text );
   		$blog_name = get_option('blogname');
    	$subject = "[{$blog_name}] {$subject}";
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$user = new WP_User( $user_id );
		$user_email = stripslashes( $user->user_email );
		wp_mail( $user_email, $subject, $message, $headers );
	}

	public static function send_profile_completion_notification_email( $user_id ) {
		$profile_completion_email_options = get_option( 'profile-completion-notification-email-template' );
		$subject = $profile_completion_email_options['subject'];
		$email_body = $profile_completion_email_options['emailBody'];
		$email_salutation = $profile_completion_email_options['salutation'];
		$message_heading = $subject;
		$user_object = new WP_User( $user_id );
		$replacement_array = array(
			'first_name' =>  $user_object->first_name,
			'last_name' =>  $user_object->last_name,
			'email_address' =>  $user_object->user_email,
			'position' =>  get_user_meta( $user_id, 'position', true ),
			'faculty' =>  get_user_meta( $user_id, 'faculty', true ),
			'institution_name' =>  get_user_meta( $user_id, 'institution_name', true ),
			'institution_campus' =>  get_user_meta( $user_id, 'institution_campus', true ),
			'institution_state' =>  get_user_meta( $user_id, 'institution_state', true ),
			'institution_country' =>  get_user_meta( $user_id, 'institution_country', true ),
			'selected_role' =>  reset($user_object->roles),
		);
		$to_be_replaced = array(
			'{[first_name]}',
			'{[last_name]}',
			'{[email_address]}',
			'{[position]}',
			'{[faculty]}',
			'{[institution_name]}',
			'{[institution_campus]}',
			'{[institution_state]}',
			'{[institution_country]}',
			'{[selected_role]}',
    	);
		$email_body = str_replace( $to_be_replaced, $replacement_array, $email_body );
		$message = Telas_Assesments_Helper::get_email_body( $message_heading, $header_image, $message_heading, $email_body, $email_salutation, false, $button_link, $button_text );
		$blog_name = get_option('blogname');
    	$subject = "[{$blog_name}] {$subject}";
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$user = new WP_User( $user_id );
		$user_email = stripslashes( $user->user_email );
		wp_mail( $user_email, $subject, $message, $headers );
	}

	function profile_approved_notification_email( $user, $user_role ) {
		$user_login = stripslashes( $user->user_login );
		$user_email = stripslashes( $user->user_email );
		if ( $user_role === 'telas_interim_reviewers' ) {
			$approved_email_object = get_option( 'interim-reviewer-approval-email-template' );
		} elseif ( $user_role === 'telas_course_submitters' ) {
			$approved_email_object = get_option( 'course-submitter-approval-email-template' );
		} else {
			return;
		}
		$subject = $approved_email_object['subject'];
		$email_body = $approved_email_object['emailBody'];
		$email_salutation = $approved_email_object['salutation'];
		$email_body = str_replace( '{[first_name]}', $user->first_name, $email_body );
		$blog_name = get_option('blogname');
		$subject = "[{$blog_name}] {$subject}";
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$to = $user_email;
		$message_title = $subject;
		$header_image = '';
		$message_heading = $subject;
		$message_body = $email_body;
		$signature = $email_salutation;
		$has_aside = true;
		$button_link = 'https://app.telas.edu.au/login';
		$button_text = 'Login';
		$message = Telas_Assesments_Helper::get_email_body( $message_title, $header_image, $message_heading, $message_body, $signature, $has_aside = true, $button_link, $button_text );
		$mail_flag = wp_mail( $to, $subject, $message, $headers );
	}
}