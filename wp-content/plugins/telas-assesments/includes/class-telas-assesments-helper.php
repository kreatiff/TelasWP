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
	public static function get_email_body( $title = 'TELAS Notification', $header_image = '', $message_heading = '', $message_body = '', $signature = '', $has_aside = true, $button_link = '', $button_text = '' ) {
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
		$all_telas_admins       = get_users( array( 'role' => 'telas_telas_administrator' ) );
		foreach ( $all_telas_admins as $telas_admin ) {
			array_push( $all_telas_admin_emails, $telas_admin->user_email );
		}
		return $all_telas_admin_emails;
	}

	public static function send_new_user_welcome_email( $user_id ) {
		$new_user_welcome_email_options = get_option( 'new-user-welcome-email-template' );
		$subject                        = $new_user_welcome_email_options['subject'];
		$email_body                     = $new_user_welcome_email_options['emailBody'];
		$email_salutation               = $new_user_welcome_email_options['salutation'];
		$message_heading                = $subject;
		$button_link                    = 'https://app.telas.edu.au/login/';
		$button_text                    = 'Login';
		$message                        = self::get_email_body( $message_heading, $header_image, $message_heading, $email_body, $email_salutation, $has_aside = true, $button_link, $button_text );
		$blog_name                      = get_option( 'blogname' );
		$subject                        = "{$new_user_welcome_email_options['subject']}";
		$headers                        = array( 'Content-Type: text/html; charset=UTF-8' );
		$user                           = new WP_User( $user_id );
		$user_email                     = stripslashes( $user->user_email );
		$ta_emails = self::get_telas_admin_emails();
		foreach ( $ta_emails as $ta_email ) {
			array_push( $headers, 'Cc: ' . $ta_email );
		}
		wp_mail( $user_email, $subject, $message, $headers );
	}

	public static function send_profile_completion_notification_email( $user_id, $user_role ) {
		$profile_completion_email_options = get_option( 'profile-completion-notification-email-template' );
		$subject                          = $profile_completion_email_options['subject'];
		$email_body                       = $profile_completion_email_options['emailBody'];
		$email_salutation                 = $profile_completion_email_options['salutation'];
		$message_heading                  = $subject;
		$user_object                      = new WP_User( $user_id );
		$user_role                        = $user_role === 'telas_assessor' ? substr( get_user_meta( $user_object->ID, 'telas_assessor_level', true ), 0, -1 ) : substr( $user_role, 0, -1 );
		$user_role                        = ucfirst( str_replace( '_', ' ', $user_role ) );
		$replacement_array                = array(
			'first_name'          => $user_object->first_name,
			'last_name'           => $user_object->last_name,
			'email_address'       => $user_object->user_email,
			'position'            => get_user_meta( $user_id, 'position', true ),
			'faculty'             => get_user_meta( $user_id, 'faculty', true ),
			'institution_name'    => get_user_meta( $user_id, 'institution_name', true ),
			'institution_campus'  => get_user_meta( $user_id, 'institution_campus', true ),
			'institution_state'   => get_user_meta( $user_id, 'institution_state', true ),
			'institution_country' => get_user_meta( $user_id, 'institution_country', true ),
			'selected_role'       => $user_role,
		);
		$to_be_replaced                   = array(
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
		$email_body                       = str_replace( $to_be_replaced, $replacement_array, $email_body );
		$message                          = self::get_email_body( $message_heading, $header_image, $message_heading, $email_body, $email_salutation, false, $button_link, $button_text );
		$blog_name                        = get_option( 'blogname' );
		$subject                          = "{$profile_completion_email_options['subject']}";
		$headers                          = array( 'Content-Type: text/html; charset=UTF-8' );
		$user                             = new WP_User( $user_id );
		$user_email                       = stripslashes( $user->user_email );
		// echo $message;
		$ta_emails = self::get_telas_admin_emails();
		foreach ( $ta_emails as $ta_email ) {
			array_push( $headers, 'Cc: ' . $ta_email );
		}
		wp_mail( $user_email, $subject, $message, $headers );
	}

	public static function profile_approved_notification_email( $user, $user_role ) {
		$user_login = stripslashes( $user->user_login );
		$user_email = stripslashes( $user->user_email );
		if ( $user_role === 'telas_interim_reviewers' ) {
			$approved_email_object = get_option( 'interim-reviewer-approval-email-template' );
		} elseif ( $user_role === 'telas_course_submitters' ) {
			$approved_email_object = get_option( 'course-submitter-approval-email-template' );
		} else {
			return;
		}
		$subject          = $approved_email_object['subject'];
		$email_body       = $approved_email_object['emailBody'];
		$email_salutation = $approved_email_object['salutation'];
		$email_body       = str_replace( '{[first_name]}', $user->first_name, $email_body );
		$blog_name        = get_option( 'blogname' );
		$subject          = "{$approved_email_object['subject']}";
		$headers          = array( 'Content-Type: text/html; charset=UTF-8' );
		$to               = $user_email;
		$message_title    = $subject;
		$header_image     = '';
		$message_heading  = $subject;
		$message_body     = $email_body;
		$signature        = $email_salutation;
		$has_aside        = true;
		$button_link      = 'https://app.telas.edu.au/login';
		$button_text      = 'Login';
		$message          = self::get_email_body( $message_title, $header_image, $message_heading, $message_body, $signature, $has_aside = true, $button_link, $button_text );
		$ta_emails = self::get_telas_admin_emails();
		foreach ( $ta_emails as $ta_email ) {
			array_push( $headers, 'Cc: ' . $ta_email );
		}
		$mail_flag        = wp_mail( $to, $subject, $message, $headers );
	}

	public static function reviewer_assigned_notification( $user_id, $course_id, $assessment_id, $role ) {
		if ( 'telas_admin_reviewers' === $role ) {
			$role_string = "TELAS admin reviewer";
		} elseif ( 'first_reviewer' === $role ) {
			$role_string = "First reviewer";
		} elseif ( 'second_reviewer' === $role ) {
			$role_string = "Second reviewer";
		} else {
			$role_string = "Interim reviewer";
		}
		$header_image            = '';
		$course_title            = get_the_title( $course_id );
		$message_heading         = "You have been assigned {$course_title} to review as a {$role_string}.";
		$email_replacement_array = array(
			'firstname'                => get_user_meta( $user_id, 'first_name', true ),
			'date_of_course_submitted' => get_post_meta( $course_id, 'courseSubmissionDateString', true ),
			'package_name'             => get_post_meta( $course_id, 'coursePackageName', true ),
			'package_type'             => get_post_meta( $course_id, 'coursePackageType', true ),
			'package_identifier'       => get_post_meta( $course_id, 'coursePackageIdentifier', true ),
			'module_identifier'        => get_post_meta( $course_id, 'courseModuleIdentifier', true ),
			'study_level'              => get_post_meta( $course_id, 'studyLevel', true ),
			'course_level'             => get_post_meta( $course_id, 'courseLevel', true ),
			'institution_name'         => get_post_meta( $course_id, 'institutionName', true ),
			'faculty'                  => get_post_meta( $course_id, 'facultyDept', true ),
			'submit_for_accreditation' => get_post_meta( $course_id, 'submitForAccreditation', true ),
			'enroller_name' => get_post_meta( $course_id, 'enrollerName', true),
			'enroller_email' => get_post_meta( $course_id, 'enrollerEmail', true),
			'enroller_phone' => get_post_meta( $course_id, 'enrollerPhone', true),
		);
		$email_template_data     = self::prepare_course_assigned_email_data( $role, $email_replacement_array );

		$message_body = $email_template_data['email_body'];
		$signature    = $email_template_data['salutation'];
		$button_link  = 'https://app.telas.edu.au/assessment/' . $assessment_id;
		$button_text  = 'Start';
		$message      = self::get_email_body( $message_heading, $header_image, $message_heading, $message_body, $signature, $has_aside = true, $button_link, $button_text );
		$blog_name    = get_option( 'blogname' );
		$subject      = "{$email_template_data['subject']}";
		// $subject = sprintf( '[%s] You have been assigned a course to review.', $blog_name );
		$headers    = array( 'Content-Type: text/html; charset=UTF-8' );
		$user       = new WP_User( $user_id );
		$user_email = stripslashes( $user->user_email );
		$ta_emails = self::get_telas_admin_emails();
		foreach ( $ta_emails as $ta_email ) {
			array_push( $headers, 'Cc: ' . $ta_email );
		}
		wp_mail( $user_email, $subject, $message, $headers );
	}
	/**
	 *  function
	 *
	 * @param string $role
	 * @param array $replacement_array
	 * @return array $email_body, $subject, $salutation
	 */
	public static function prepare_course_assigned_email_data( $role = 'telas_admin_reviewers', $replacement_array = array() ) {
		if ( 'telas_admin_reviewers' === $role ) {
			$email_template = get_option( 'admin-reviewer-assigned-email-template' );
		} elseif ( 'first_reviewer' === $role ) {
			$email_template = get_option( 'first-reviewer-assigned-email-template' );
		} elseif ( 'second_reviewer' === $role ) {
			$email_template = get_option( 'second-reviewer-assigned-email-template' );
		} else {
			$email_template = get_option( 'interim-reviewer-assigned-email-template' );
		}
		$subject        = $email_template['subject'];
		$body           = $email_template['emailBody'];
		$salutation     = $email_template['salutation'];
		$to_be_replaced = array(
			'{[firstname]}',
			'{[date_of_course_submitted]}',
			'{[package_name]}',
			'{[package_type]}',
			'{[package_identifier]}',
			'{[module_identifier]}',
			'{[study_level]}',
			'{[course_level]}',
			'{[institution_name]}',
			'{[faculty]}',
			'{[submit_for_accreditation]}',
			'{[enroller_name]}',
			'{[enroller_email]}',
			'{[enroller_phone]}',
		);

		$new_body = str_replace( $to_be_replaced, $replacement_array, $body );
		return array(
			'email_body' => $new_body,
			'subject'    => $subject,
			'salutation' => $salutation,
		);
	}
	/**
	 * Undocumented function
	 *
	 * @param array $replacement_array array.
	 * @return array .
	 */
	public static function prepare_combined_reviewer_assigned_email( $replacement_array = array() ) {
		$email_template = get_option( 'combined-review-request-email-template' );
		$subject        = $email_template['subject'];
		$body           = $email_template['emailBody'];
		$salutation     = $email_template['salutation'];
		$to_be_replaced = array(
			'{[firstname]}',
			'{[get_course_name]}',
			'{[get_institution_name]}',
			'{[second_reviewer_firstname]}',
			'{[second_reviewer_lastname]}',
			'{[second_reviewer_position]}',
			'{[second_reviewer_faculty_name]}',
			'{[second_reviewer_institution_name]}',
			'{[second_reviewer_institution_country]}',
			'{[second_reviewer_email]}',
			'{[date_of_course_submitted]}',
			'{[package_name]}',
			'{[package_type]}',
			'{[package_identifier]}',
			'{[module_identifier]}',
			'{[study_level]}',
			'{[course_level]}',
			'{[institution_name]}',
			'{[faculty]}',
			'{[submit_for_accreditation]}',
			'{[enroller_name]}',
			'{[enroller_email]}',
			'{[enroller_phone]}'
		);
		$new_body = str_replace( $to_be_replaced, $replacement_array, $body );
		return array(
			'email_body' => $new_body,
			'subject'    => $subject,
			'salutation' => $salutation,
		);
	}

	public static function combined_reviewer_assigned_notification( $course_id ) {
		$report_id = get_post_meta( $course_id, 'report_post_id', true );
		$message_title           = 'TELAS Combined Review request.';
		$header_image            = '';
		$course_title            = get_the_title( $course_id );
		$first_reviewer_id = get_post_meta( $course_id, 'assigned_first_reviewer_user_id', true );
		$second_reviewer_id = get_post_meta( $course_id, 'assigned_second_reviewer_user_id', true );
		$first_reviewer_object       = new WP_User( $first_reviewer_id );
		$second_reviewer_object       = new WP_User( $second_reviewer_id );
		$first_reviewer_email = stripslashes( $first_reviewer_object->user_email );
		$second_reviewer_email = stripslashes( $second_reviewer_object->user_email );
		$second_reviewer_first_name = get_user_meta( $second_reviewer_id, 'first_name', true );
		$second_reviewer_last_name = get_user_meta( $second_reviewer_id, 'last_name', true );
		$second_reviewer_position = get_user_meta( $second_reviewer_id, 'position', true );
		$second_reviewer_faculty = get_user_meta( $second_reviewer_id, 'faculty', true );
		$second_reviewer_institution_name = get_user_meta( $second_reviewer_id, 'institution_name', true );
		$second_reviewer_institution_country = get_user_meta( $second_reviewer_id, 'institution_country', true );
		$date_of_course_submission = get_post_meta( $course_id, 'courseSubmissionDate', true );
		$course_package_name = get_post_meta( $course_id, 'coursePackageName', true );
		$course_package_type = get_post_meta( $course_id, 'coursePackageType', true );
		$course_package_identifier = get_post_meta( $course_id, 'coursePackageIdentifier', true );
		$course_module_identifier = get_post_meta( $course_id, 'courseModuleIdentifier', true );
		$course_study_level = get_post_meta( $course_id, 'studyLevel', true );
		$course_level = get_post_meta( $course_id, 'courseLevel', true );
		$course_faculty = get_post_meta( $course_id, 'facultyDept', true );
		$course_institution_name = get_post_meta( $course_id, 'institutionName', true );
		$submit_for_accreditation = get_post_meta( $course_id, 'submitForAccreditation', true);
		$enroller_name = get_post_meta( $course_id, 'enrollerName', true);
		$enroller_email = get_post_meta( $course_id, 'enrollerEmail', true);
		$enroller_phone = get_post_meta( $course_id, 'enrollerPhone', true);
		$first_reviewer_first_name = get_user_meta( $first_reviewer_id, 'first_name', true );
		$formatted_date_of_course_submission = new DateTimeImmutable( $date_of_course_submission );
		$email_replacement_array = array(
			'firstname' => $first_reviewer_first_name,
			'get_course_name' => $course_title,
			'get_institution_name' => $second_reviewer_institution_name,
			'second_reviewer_firstname' => $second_reviewer_first_name,
			'second_reviewer_lastname' => $second_reviewer_last_name,
			'second_reviewer_position' => $second_reviewer_position,
			'second_reviewer_faculty_name' => $second_reviewer_faculty,
			'second_reviewer_institution_name' => $second_reviewer_institution_name,
			'second_reviewer_institution_country' => $second_reviewer_institution_country,
			'second_reviewer_email' => $second_reviewer_email,
			'date_of_course_submitted' => $formatted_date_of_course_submission->format( get_option( 'date_format' ) ),
			'package_name' => $course_package_name,
			'package_type' => $course_package_type,
			'package_identifier' => $course_package_identifier,
			'module_identifier' => $course_module_identifier,
			'study_level' => $course_study_level,
			'course_level' => $course_study_level,
			'institution_name' => $course_institution_name,
			'faculty' => $course_faculty,
			'submit_for_accreditation' => $submit_for_accreditation,
			'enroller_name' => $enroller_name,
			'enroller_email' => $enroller_email,
			'enroller_phone' => $enroller_phone,
		);
		$email_template_data     = self::prepare_combined_reviewer_assigned_email( $email_replacement_array );

		$message_body = $email_template_data['email_body'];
		$signature    = $email_template_data['salutation'];
		$button_link  = 'https://app.telas.edu.au/dashboard/reports?tab=assigned';
		$button_text  = 'Start';
		$message_heading = 'TELAS Combined Review request.';
		$message      = self::get_email_body( $message_title, $header_image, $message_heading, $message_body, $signature, $has_aside = true, $button_link, $button_text );
		$blog_name    = get_option( 'blogname' );
		$subject      = "{$email_template_data['subject']}";
		$headers    = array( 'Content-Type: text/html; charset=UTF-8' );
		$ta_emails = self::get_telas_admin_emails();
		foreach ( $ta_emails as $ta_email ) {
			array_push( $headers, 'Cc: ' . $ta_email );
		}
		wp_mail( $first_reviewer_email, $subject, $message, $headers );
	}

	public static function accreditation_email( $course_id, $domain_entries, $eligible, $assessment_id ) {
		$course_submitter_first_name = get_post_meta( $course_id, 'courseSubmitterName', true );
		$course_submitter_user_id = get_post_meta( $course_id, 'courseSubmitterId', true );
		$course_submitter_user_data = get_userdata( $course_submitter_user_id );
		$course_submitter_user_email = $course_submitter_user_data->user_email;
		$course_name = get_post_meta( $course_id, 'coursePackageName', true );
		$course_package_type = get_post_meta( $course_id, 'coursePackageType', true );
		$course_package_identifier = get_post_meta( $course_id, 'coursePackageIdentifier', true );
		$course_module_identifier = get_post_meta( $course_id, 'courseModuleIdentifier', true );
		$study_level = get_post_meta( $course_id, 'studyLevel', true );
		$course_level = get_post_meta( $course_id, 'courseLevel', true );
		$institution_name = get_post_meta( $course_id, 'institutionName', true );
		$faculty = get_post_meta( $course_id, 'facultyDept', true );
		$submit_for_accreditation = get_post_meta( $course_id, 'submitForAccreditation', true);
		$enroller_name = get_post_meta( $course_id, 'enrollerName', true);
		$enroller_email = get_post_meta( $course_id, 'enrollerEmail', true);
		$enroller_phone = get_post_meta( $course_id, 'enrollerPhone', true);
		$combined_review_commencement_date = get_post_meta( $course_id, 'combined_review_commencement_date', true );
		$combined_review_completion_date = get_post_meta( $course_id, 'combined_review_completion_date', true );
		$submit_for_accreditation = get_post_meta( $course_id, 'submitForAccreditation', true );
		$email_replacement_array = array(
			'firstname' => $course_submitter_first_name,
			'course_name' => $course_name,
			'date_of_course_submission' => date( get_option( 'date_format' ), strtotime( get_post_meta( $course_id, 'courseSubmissionDate', true ) ) ),
			'course_package_name' => $course_name,
			'course_package_type' => $course_package_type,
			'course_package_identifier' => $course_package_identifier,
			'course_module_identifier' => $course_module_identifier,
			'study_level' => $study_level,
			'course_level' => $course_level,
			'institution_name' => $institution_name,
			'faculty' => $faculty,
			'submit_for_accreditation' => $submit_for_accreditation,
			'enroller_name' => $enroller_name,
			'enroller_email' => $enroller_email,
			'enroller_phone' => $enroller_phone,
			'bold' => '<strong>',
			'/bold'	=> '</strong>',
			'online_eligible_badge' => $domain_entries['first']['badge'],
			'learner_eligible_badge' => $domain_entries['second']['badge'],
			'learning_eligible_badge' => $domain_entries['third']['badge'],
			'learning_resources_eligible_badge' => $domain_entries['fourth']['badge'],
			'overall_eligible_badge' => $domain_entries['accreditation_badge'],
		);
		$assessment_pdf_data = array(
			'course_name' => $course_name,
			'course_package_type' => $course_package_type,
			'course_package_identifier' => $course_package_identifier,
			'course_module_identifier' => $course_module_identifier,
			'study_area' => $study_level,
			'course_level' => $course_level,
			'institution_name' => $institution_name,
			'faculty' => $faculty,
			'combined_review_start_date' => $combined_review_commencement_date,
			'combined_review_end_date' => $combined_review_completion_date,
			'domain_one_badge' => $domain_entries['first']['badge'],
			'domain_two_badge' => $domain_entries['second']['badge'],
			'domain_three_badge' => $domain_entries['third']['badge'],
			'domain_four_badge' => $domain_entries['fourth']['badge'],
            'overall_badge' => $domain_entries['accreditation_badge'],
			'submit_for_accreditation' => $submit_for_accreditation,
            'comments'=> serialize(get_post_meta( $assessment_id, 'comments', true )),
            'all_assessment_values' => get_post_meta( $assessment_id, 'assessment_data', true ),
            'assessment_id' => $assessment_id,
            'course_id' => $course_id,
		);
		$assessment_pdf_instance = new Telas_Generate_Pdf_Helper();
		$assessment_attachment = $assessment_pdf_instance->generate_assessment_summary_pdf( $assessment_pdf_data, $eligible, true );
		// $assessment_pdf_data = array(
		// 	'course_name' => $course_name,
		// 	'course_package_type' => $course_package_type,
		// 	'course_package_identifier' => $course_package_identifier,
		// 	'course_module_identifier' => $course_module_identifier,
		// 	'study_area' => $study_level,
		// 	'course_level' => $course_level,
		// 	'institution_name' => $institution_name,
		// 	'faculty' => $faculty,
		// 	'combined_review_start_date' => $combined_review_commencement_date,
		// 	'combined_review_end_date' => $combined_review_completion_date,
		// 	'domain_one_badge' => $domain_entries['first']['badge'],
		// 	'domain_two_badge' => $domain_entries['second']['badge'],
		// 	'domain_three_badge' => $domain_entries['third']['badge'],
		// 	'domain_four_badge' => $domain_entries['fourth']['badge'],
		// 	'submit_for_accreditation' => $submit_for_accreditation,
		// );
		$assessment_pdf_instance = new Telas_Generate_Pdf_Helper();
		$assessment_attachment = $assessment_pdf_instance->generate_assessment_summary_pdf( $assessment_pdf_data, $eligible );
		$email_template_data     = self::prepare_accreditation_application_email( $email_replacement_array, $eligible );
		$message_body = $email_template_data['email_body'];
		$signature    = $email_template_data['salutation'];
		$message_heading = $email_template_data['subject'];
		$message_title = $message_heading;
		$header_image = '';
		$has_aside = false;
		$button_link = '';
		$button_text = '';
		$message      = self::get_email_body( $message_title, $header_image, $message_heading, $message_body, $signature, $has_aside, $button_link, $button_text );
		$blog_name    = get_option( 'blogname' );
		$subject      = "{$email_template_data['subject']}";
		$headers    = array( 'Content-Type: text/html; charset=UTF-8' );
		$ta_emails = self::get_telas_admin_emails();
		$attachments = array($assessment_attachment);
		foreach ( $ta_emails as $ta_email ) {
			array_push( $headers, 'Cc: ' . $ta_email );
		}
		$mail_flag = wp_mail( $course_submitter_user_email, $subject, $message, $headers, $attachments );
		if ( $mail_flag ) {
			unlink( $assessment_attachment );
		}
		return $mail_flag;
	}

	public static function prepare_accreditation_application_email( $replacement_array = array(), $eligible = true ) {
		$course_accreditation_application_email_template = $eligible ? get_option( 'eligibility-for-course-accreditation-email-template' ) : get_option( 'non-eligible-for-course-accreditation-email-template' );
		$subject        = $course_accreditation_application_email_template['subject'];
		$body           = $course_accreditation_application_email_template['emailBody'];
		$salutation     = $course_accreditation_application_email_template['salutation'];
		$to_be_replaced = array(
			'{[firstname]}',
			'{[course_name]}',
			'{[date_of_course_submission]}',
			'{[course_package_name]}',
			'{[course_package_type]}',
			'{[course_package_identifier]}',
			'{[course_module_identifier]}',
			'{[study_level]}',
			'{[course_level]}',
			'{[institution_name]}',
			'{[faculty]}',
			'{[submit_for_accreditation]}',
			'{[enroller_name]}',
			'{[enroller_email]}',
			'{[enroller_phone]}',
			'{[bold]}',	
			'{[/bold]}',
			'{[online_eligible_badge]}',
			'{[learner_eligible_badge]}',
			'{[learning_eligible_badge]}',
			'{[learning_resources_eligible_badge]}',
			'{[overall_eligible_badge]}',
		);
		$new_body = str_replace( $to_be_replaced, $replacement_array, $body );
		return array(
			'email_body' => $new_body,
			'subject'    => $subject,
			'salutation' => $salutation,
		);
	}

	public static function send_role_changed_notification( $user_id, $user_role ) {
		$profile_completion_email_options = get_option( 'user-role-change-email-template' );
		$subject                          = $profile_completion_email_options['subject'];
		$email_body                       = $profile_completion_email_options['emailBody'];
		$email_salutation                 = $profile_completion_email_options['salutation'];
		$message_heading                  = $subject;
		$user_object                      = new WP_User( $user_id );
		$user_role                        = $user_role === 'telas_assessor' ? substr( get_user_meta( $user_object->ID, 'telas_assessor_level', true ), 0, -1 ) : substr( $user_role, 0, -1 );
		$user_role                        = ucfirst( str_replace( '_', ' ', $user_role ) );
		$replacement_array                = array(
			'first_name'          => $user_object->first_name,
			'last_name'           => $user_object->last_name,
			'email_address'       => $user_object->user_email,
			'position'            => get_user_meta( $user_id, 'position', true ),
			'faculty'             => get_user_meta( $user_id, 'faculty', true ),
			'institution_name'    => get_user_meta( $user_id, 'institution_name', true ),
			'institution_campus'  => get_user_meta( $user_id, 'institution_campus', true ),
			'institution_state'   => get_user_meta( $user_id, 'institution_state', true ),
			'institution_country' => get_user_meta( $user_id, 'institution_country', true ),
			'selected_role'       => $user_role,
		);
		$to_be_replaced                   = array(
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
		$email_body                       = str_replace( $to_be_replaced, $replacement_array, $email_body );
		$message                          = self::get_email_body( $message_heading, $header_image, $message_heading, $email_body, $email_salutation, false, $button_link, $button_text );
		$blog_name                        = get_option( 'blogname' );
		$subject                          = "{$profile_completion_email_options['subject']}";
		$headers                          = array( 'Content-Type: text/html; charset=UTF-8' );
		$user                             = new WP_User( $user_id );
		$user_email                       = stripslashes( $user->user_email );
		// echo $message;
		$ta_emails = self::get_telas_admin_emails();
		foreach ( $ta_emails as $ta_email ) {
			array_push( $headers, 'Cc: ' . $ta_email );
		}
		wp_mail( $user_email, $subject, $message, $headers );
	}

	public static function new_course_submitted_notification($course_id, $course_data) {
		$new_course_submitted = get_option( 'new-course-submitted-email-template' );
		$subject                          = $new_course_submitted['subject'];
		$email_body                       = $new_course_submitted['emailBody'];
		$email_salutation                 = $new_course_submitted['salutation'];
		$message_heading                  = $subject;
		$course_submitter_user_id = get_post_meta( $course_id, 'courseSubmitterId', true );
		$course_submitter_user_data = get_userdata( $course_submitter_user_id );
		$course_submitter_user_email = $course_submitter_user_data->user_email;
		$replacement_array                = array(
			'course_submitter_name'          => $course_data['courseSubmitterName'],
			'date_of_course_submitted'           => $course_data['courseSubmissionDateString'],
			'course_name'       => $course_data['coursePackageName'],
			'package_type'            =>  $course_data['coursePackageType'],
			'package_identifier'             => $course_data['coursePackageIdentifier'],
			'module_identifier'    => $course_data['courseModuleIdentifier'],
			'study_level'  => $course_data['studyLevel'],
			'course_level'   => $course_data['courseLevel'],
			'institution_name' => $course_data['institutionName'],
			'faculty'       => $course_data['facultyDept'],
			'submit_for_accreditation' => $course_data['submitForAccreditation'],
			'enroller_name' => $course_data['enrollerName'],
			'enroller_email' => $course_data['enrollerEmail'],
			'enroller_phone' => $course_data['enrollerPhone'],
		);
		$to_be_replaced       = array(
			'{[course_submitter_name]}',
			'{[date_of_course_submitted]}',
			'{[course_name]}',
			'{[package_type]}',
			'{[package_identifier]}',
			'{[module_identifier]}',
			'{[study_level]}',
			'{[course_level]}',
			'{[institution_name]}',
			'{[faculty]}',
			'{[submit_for_accreditation]}',
			'{[enroller_name]}',
			'{[enroller_email]}',
			'{[enroller_phone]}',
		);
		$email_body                       = str_replace( $to_be_replaced, $replacement_array, $email_body );
		$button_link  = "https://app.telas.edu.au/courses/{$course_id}";
		$button_text  = 'View Course';
		$message                          = self::get_email_body( $message_heading, $header_image, $message_heading, $email_body, $email_salutation, true, $button_link, $button_text );
		$blog_name                        = get_option( 'blogname' );
		$subject                          = "{$new_course_submitted['subject']}";
		$headers                          = array( 'Content-Type: text/html; charset=UTF-8' );
		$user                             = new WP_User( $user_id );
		$user_email                       = stripslashes( $user->user_email );
		// echo $message;
		$ta_emails = self::get_telas_admin_emails();
		wp_mail( $course_submitter_user_email, $subject, $message, $headers );
		foreach ( $ta_emails as $ta_email ) {
			wp_mail( $ta_email, $subject, $message, $headers );
		}
	}
}
