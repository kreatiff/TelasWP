<?php

class Telas_Generate_Pdf_Helper {
    public function __construct() {
    }
    function get_mdpf_instance() {
        $mpdf_config_array = array(
			'margin_left' => 20,
			'margin_right' => 15,
			'margin_top' => 40,
			'margin_bottom' => 10,
			'margin_header' => 10,
			'margin_footer' => 10,
			'mode' => 'utf-8',
			'format' => 'A4',
			'tempDir' => plugin_dir_path( __FILE__ ) . 'generated-pdfs',
			'debug' => true,
            'allow_output_buffering'    => true
		);
        $mpdf = new \Mpdf\Mpdf($mpdf_config_array);
        return $mpdf;
    }
    
    function generate_assessment_summary_pdf($assessment_data, $eligible, $return_file_url = false ) {
		$mpdf_instance = $this->get_mdpf_instance();
		// Write some HTML code:
		$html = $this->course_assessment_summary_pdf_generate($assessment_data, $eligible);
		$mpdf_instance->WriteHTML($html);
		$mpdf_instance->SetProtection(array('print'));
		$mpdf_instance->SetTitle("TELAS. - Assessment Summary");
		$mpdf_instance->SetAuthor("TELAS.");
		$mpdf_instance->SetWatermarkText("TELAS");
		$mpdf_instance->showWatermarkText = true;
		$mpdf_instance->watermark_font = 'DejaVuSansCondensed';
		$mpdf_instance->watermarkTextAlpha = 0.1;
        $mpdf_instance->SetDisplayMode('fullpage');
        $file_name = 'generated-pdfs/assessment-summary-of-' . $assessment_data['course_name'] . '.pdf';
        $mpdf_instance->Output(plugin_dir_path( __FILE__ ) . $file_name, 'F');
        if ( $return_file_url ) {
            return array( 'filePath' => $file_name, 'fileURL' => plugin_dir_url( __FILE__ ) . $file_name, 'fileName' => str_replace(' ', '-', $assessment_data['course_name'] ). '.pdf'  );
        } else {
            return plugin_dir_path( __FILE__ ) . $file_name; 
        }
    }
    
    function generate_assessment_pdf($assessment_data) {
        $mpdf_instance = $this->get_mdpf_instance();
		// Write some HTML code:
        $html = $this->assessment_pdf_generate($assessment_data);
		$mpdf_instance->WriteHTML($html);
		$mpdf_instance->SetProtection(array('print'));
		$mpdf_instance->SetTitle("TELAS. - Assessment Summary");
		$mpdf_instance->SetAuthor("TELAS.");
		$mpdf_instance->SetWatermarkText("TELAS");
		$mpdf_instance->showWatermarkText = true;
		$mpdf_instance->watermark_font = 'DejaVuSansCondensed';
		$mpdf_instance->watermarkTextAlpha = 0.1;
        $mpdf_instance->SetDisplayMode('fullpage');
        $file_name = 'generated-pdfs/assessment-' . str_replace(' ', '-', $assessment_data['assessment_title'] ). '.pdf';
        $mpdf_instance->Output(plugin_dir_path( __FILE__ ) . $file_name, 'F');
        return array( 'filePath' => $file_name, 'fileURL' => plugin_dir_url( __FILE__ ) . $file_name, 'fileName' => str_replace(' ', '-', $assessment_data['assessment_title'] ). '.pdf'  );
    }
    function get_question_answer_html_combined_review( $all_assessment_values = array(), $assessment_id ) {
        $questions = get_option( 'telas_admin_domain_answers' );
        $prev_step = -1;
        $prev_tab = -1;
        $question_answer_html = "";
        foreach(  $questions as $step_index => $step ) {
            foreach( $step['content'] as $tab_index => $tab ) {
                foreach( $tab['questions'] as $question_index => $question ) {
                    $question = $this->get_question_by_question_key($step_index, $tab_index, $question_index);
                    $actual_step_index = $step_index + 1;
                    $actual_tab_index = $tab_index + 1;
                    $actual_question_index = $question_index + 1;
                    $question_key = "question_${actual_step_index}_${actual_tab_index}_${actual_question_index}";
                    if ($all_assessment_values['admin_reviewer']['status'] === 'completed') {
                        if (
                            !empty($all_assessment_values['admin_reviewer']['review_data'][$question_key])
                        ) {
                            $admin_answer = $all_assessment_values['admin_reviewer']['review_data'][$question_key];
                        } else {
                            $admin_answer = '--';
                        }
                    }
                    if ($all_assessment_values['first_reviewer']['status'] === 'completed') {
                        if (
                            !empty($all_assessment_values['first_reviewer']['review_data'][$question_key])
                        ) {
                            $first_reviewer_answer = $all_assessment_values['first_reviewer']['review_data'][$question_key];
                        } else {
                            $first_reviewer_answer = '--';
                        }
                    }
                    // if ($all_assessment_values['second_reviewer']['status'] === 'completed') {
                    //     if (
                    //         !empty($all_assessment_values['second_reviewer']['review_data'][$question_key])
                    //     ) {
                    //         $second_reviewer_answer = $all_assessment_values['second_reviewer']['review_data'][$question_key];
                    //     } else {
                    //         $second_reviewer_answer = '--';
                    //     }
                    // }
                    $formatted_admin_answer = ucwords(join(' ', explode('_', $admin_answer)));
                    $combined_review_answer = $first_reviewer_answer === '--' ? $formatted_admin_answer : ucwords(join(' ', explode('_', $first_reviewer_answer)));
                    // $formatted_second_reviewer_answer = ucwords(join(' ', explode('_', $second_reviewer_answer)));

                    if ($step_index != $prev_step || $tab_index != $prev_tab) {
                        $standard_heading = $this->get_section_heading($step_index, $tab_index);
                        $question_answer_html .= "<tr class='pdf-subheading'>
                    <td colspan='4' style='width: 100%; border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: center;'>
                        ${standard_heading}
                    </td>
			    </tr>";
                    }
                    $prev_step = $step_index;
                    $prev_tab = $tab_index;
                    $question_answer_html .= "<tr>
                <td colspan='2' style='width: 50%; border: 1px solid #000;'>${actual_step_index}.${actual_tab_index}.${actual_question_index}. ${question}</td>
                <td colspan='2' style='width: 50%; border: 1px solid #000;'>Score:${combined_review_answer}
            </tr>";
                }
            }
        }
        return $question_answer_html;
    } 
    
    function get_question_answer_html( $assessment_answer_value, $all_assessment_values =  array(), $reviewer_level = '' ) {
        $actual_assessment_answers = unserialize( $assessment_answer_value );
        $question_answer_html = "";
        $prev_step = -1;
        $prev_tab = -1;
        $questions = get_option('telas_admin_domain_answers');
        foreach ($questions as $step_index => $step) {
            foreach ($step['content'] as $tab_index => $tab) {
                foreach ($tab['questions'] as $question_index => $question) {
                    $actual_step_index = $step_index + 1;
                    $actual_tab_index = $tab_index + 1;
                    $actual_question_index = $question_index + 1;
                    $question_key = "question_{$actual_step_index}_{$actual_tab_index}_{$actual_question_index}";
                    $admin_answer = '';
                    $first_reviewer_answer = '';
                    $second_reviewer_answer = '';
                    $question = $this->get_question_by_question_key( $step_index, $tab_index, $question_index );
                    if ( ! empty($all_assessment_values['admin_reviewer']) && $all_assessment_values['admin_reviewer']['status'] === 'completed' ) {
                        if ( !empty($all_assessment_values['admin_reviewer']['review_data'][$question_key] ) ) {
                            $admin_answer = $all_assessment_values['admin_reviewer']['review_data'][$question_key];
                        } else {
                            $admin_answer = '--';
                        }
                    }
                    if ( $reviewer_level !== 'interim_reviewer' ) {
                        if ( ! empty( $all_assessment_values['first_reviewer'] ) && $all_assessment_values['first_reviewer']['status'] === 'completed' ) {
                            if ( !empty( $all_assessment_values['first_reviewer']['review_data'][$question_key] ) ) {
                                $first_reviewer_answer = $all_assessment_values['first_reviewer']['review_data'][$question_key];
                            } else {
                                $first_reviewer_answer = '--';
                            }
                        }
                        if ( ! empty( $all_assessment_values['second_reviewer'] ) && $all_assessment_values['second_reviewer']['status'] === 'completed' ) {
                            if ( !empty( $all_assessment_values['second_reviewer']['review_data'][$question_key] ) ) {
                                $second_reviewer_answer = $all_assessment_values['second_reviewer']['review_data'][$question_key];
                            } else {
                                $second_reviewer_answer = '--';
                            }
                        }
                    } else {
                        if ( ! empty( $all_assessment_values['interim_reviewer'] ) && $all_assessment_values['interim_reviewer']['status'] === 'completed' ) {
                            if ( !empty( $all_assessment_values['interim_reviewer']['review_data'][$question_key] ) ) {
                                $interim_reviewer_answer = $all_assessment_values['interim_reviewer']['review_data'][$question_key];
                            } else {
                                $interim_reviewer_answer = '--';
                            }
                        }
                    }
                    $formatted_admin_answer = !empty( $admin_answer ) ? ucwords( join( ' ', explode('_', $admin_answer ) ) ) : '';
                    $formatted_first_reviewer_answer = ! empty( $first_reviewer_answer ) ? ucwords( join( ' ', explode('_', $first_reviewer_answer ) ) ) : '';
                    $formatted_second_reviewer_answer =! empty( $second_reviewer_answer ) ? ucwords( join( ' ', explode('_', $second_reviewer_answer ) ) ) : '';
                    $formatted_interim_reviewer_answer = ! empty( $interim_reviewer_answer ) ? ucwords(( join( ' ', explode( '_', $interim_reviewer_answer ) ) ) ) : '';
                   
                    
                    if ($step_index != $prev_step || $tab_index != $prev_tab) {
                        $standard_heading = $this->get_section_heading($step_index, $tab_index);
                        $question_answer_html .= "<tr class='pdf-subheading'>
                            <td colspan='4' style='width: 100%; border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: center;'>
                                ${standard_heading}
                            </td>
                        </tr>";
                    }
                    $prev_step = $step_index;
                    $prev_tab = $tab_index;
                    if ( $reviewer_level === 'interim_reviewer' ) {
                        $question_answer_html .= "<tr>
                        <td colspan='2' style='width: 50%; border: 1px solid #000;'>${actual_step_index}.${actual_tab_index}.${actual_question_index}. ${question}</td>
                        <td colspan='2' style='width: 50%; border: 1px solid #000;'>Admin Reviewer:${formatted_admin_answer} | Interim Reviewer:${formatted_interim_reviewer_answer}</td>
                    </tr>";
                    } else {
                        $question_answer_html .= "<tr>
                            <td colspan='2' style='width: 100%; border: 1px solid #000;'>${actual_step_index}.${actual_tab_index}.${actual_question_index}. ${question}</td>
                            <td colspan='2' style='width: 50%; border: 1px solid #000;'>Admin Reviewer:${formatted_admin_answer} | First Reviewer:${formatted_first_reviewer_answer} | Second Reviewer:${formatted_second_reviewer_answer}</td>
                        </tr>";
                    }
                }
            }
        }
        return $question_answer_html;
    }

    function get_comments_html( $comments, $previous_comments = array() ) {
        if ( empty( $comments ) ) {
            $comments = array();
        }
        $comment_html = "";
        if ( ! empty( $previous_comments ) ) {
            foreach( $previous_comments as $previous_comment_key => $previous_comment ) {
                if ( ! empty( $previous_comment ) ) {
                    $key_text = ucfirst( str_replace('_', ' ', $previous_comment_key) );
                    $comment_html .= "<tr class='comments pdf-subheading'>";
                    $comment_html .= "<td colspan='4' style='width: 100%; border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: center;'>";
                    $comment_html .= strtoupper($key_text) . " ";
                    $comment_html .= "</td>";
                    $comment_html .= $this->comment_actual_html( $previous_comment );
                }
            }
        } else {
            $comment_html .= $this->comment_actual_html( $comments );
        }
        return $comment_html;
    }

    function comment_actual_html( $comments ) {
        $comment_data = ! empty( $comments ) && ! is_array( $comments ) && is_string( $comments ) ? unserialize( $comments ) : $comments;
        $comments_actual_html = '';
        if ( is_string( $comments ) ) return '';
        foreach ($comment_data as $comment_key => $comment) {
            $comment_title_array = explode('_', $comment_key);
            $comment_number = (int)$comment_title_array[1] + 1;
            $comments_actual_html .= "<tr class='comments'>";
            $comments_actual_html .= "<td colspan='2' style='width: 50%; border: 1px solid #000; font-weight: 100;'>";
            $comments_actual_html .= strtoupper($comment_title_array[0]) . " ";
            $comments_actual_html .=  $comment_number . ":";
            $comments_actual_html .= "</td>";
            $comments_actual_html .= "<td colspan='2' style='width: 50%; border: 1px solid #000; font-weight: 100;'>${comment}</td>";
            $comments_actual_html .= "</tr>";
        }
        return $comments_actual_html;
    }

    function get_question_by_question_key($step_index, $tab_index, $question_index) {
        $questions = get_option( 'telas_admin_domain_answers' );
        return $questions[$step_index]['content'][$tab_index]['questions'][$question_index]['question'];
    }

    function get_section_heading( $step_index, $tab_index ) {
        $questions = get_option( 'telas_admin_domain_answers' );
        return $questions[$step_index]['content'][$tab_index]['heading'];
    }

    function get_standard_heading( $step_index, $tab_index  ) {
        $questions = get_option( 'telas_admin_domain_answers' );
        return $questions[$step_index]['content'][$tab_index]['heading'];
    }
    

    function assessment_pdf_generate($assessment_data = array()) {
        ob_start();
            $course_assessment_details = get_post_meta($assessment_data['assigned_course'][0], 'assessments', true );
            $course_id = $assessment_data['assigned_course'][0];
            $course_name = $assessment_data['course_name'];
            $assessment_title = $assessment_data['assessment_title'];
            $course_package_type = $assessment_data['course_package_type'];
            $course_package_identifier = $assessment_data['course_package_identifier'];
            $course_module_identifier = $assessment_data['course_module_identifier'];
            $study_area = $assessment_data['study_area'];
            $course_level = $assessment_data['course_level'];
            $faculty = $assessment_data['faculty'];
            $assessment_id = $assessment_data['assessment_id'];
            $question_answer_html = $this->get_question_answer_html( $assessment_data['assessment_answer_data'][0], $course_assessment_details );
            $assigned_user_level = $assessment_data['assessment_assigned_user_level'];
            if ( $assigned_user_level === 'interim_reviewer' ) {
                $admin_assessment_id =  get_post_meta($course_id, 'assigned_admin_reviewer_assessment', true);
                $admin_assessment_comment = $admin_assessment_id ? get_post_meta($admin_assessment_id, 'comment', true) : false;
                $admin_assessment_id =  get_post_meta($course_id, 'assigned_admin_reviewer_assessment', true);
                $comments = $assessment_data['comment'][0];
                $previous_comments = array(
                    'admin_reviewer_comment' => $admin_assessment_comment,
                    'interim_reviewer_comment' => is_serialized( $comments ) ? unserialize( $comments ) : $comments,
                );
                $comments_html = $this->get_comments_html( $comments, $previous_comments );
                $commencement_date = date(get_option('date_format'), strtotime($assessment_data['commencement_date']));
                $assigned_user_id = get_post_meta( $assessment_id, 'assigned_reviewer_user_id', true );
                $interim_review_data = get_post_meta( $course_id, 'assigned_interim_reviews_obj', true );
                
                $completion_date = $interim_review_data[$assigned_user_id]['completed_date'];
                $reviewer_name = get_user_meta( $assigned_user_id, 'nickname', true );
                $assessment_answer_data['interim_reviewer']['review_data'] = get_post_meta($assessment_id, 'assessment_answer_data', true );
                $assessment_answer_data['interim_reviewer']['status'] = 'completed';
                
                $assessment_answer_data['admin_reviewer'] = $course_assessment_details['admin_reviewer'];
                $question_answer_html = $this->get_question_answer_html( '', $assessment_answer_data, 'interim_reviewer' );
                include(  plugin_dir_path( __FILE__ ) . 'pdf-htmls/interim-assessment-pdf.php' );
                $content = ob_get_clean();
                return $content;
            }
            $admin_assessment_id =  get_post_meta($course_id, 'assigned_admin_reviewer_assessment', true);
            $admin_assessment_comment = $admin_assessment_id ? get_post_meta($admin_assessment_id, 'comment', true) : false;

            $first_assessment_id = get_post_meta($course_id, 'assigned_first_reviewer_assessment', true);
            $first_assessment_comment = $first_assessment_id ? get_post_meta($first_assessment_id, 'comment', true) : false;

            $second_assessment_id = get_post_meta($course_id, 'assigned_second_reviewer_assessment', true);
            $second_assessment_comment = $second_assessment_id ? get_post_meta($second_assessment_id, 'comment', true) : false;
            $previous_comments = array(
                'admin_reviewer_comment' => $admin_assessment_comment,
                'first_reviewer_comment' => $first_assessment_comment,
                'second_reviewer_comment' => $second_assessment_comment,
            );
            $comments = $assessment_data['comment'][0];
            $comments_html = $this->get_comments_html( $comments, $previous_comments );
            $commencement_date = date(get_option('date_format'), strtotime($assessment_data['commencement_date']));
            $completion_date =$assessment_data['completion_date'];
            include( plugin_dir_path( __FILE__ ) . 'pdf-htmls/assessment-pdf.php' );
		$content = ob_get_clean();
		return $content;
    } 

	function course_assessment_summary_pdf_generate($assessment_data = array(), $eligible) {
        ob_start();
        $course_name = $assessment_data['course_name'];
        $course_package_type = $assessment_data['course_package_type'];
        $course_package_identifier = $assessment_data['course_package_identifier'];
        $course_module_identifier = $assessment_data['course_module_identifier'];
        $study_area = $assessment_data['study_area'];
        $course_level = $assessment_data['course_level'];
        $faculty = $assessment_data['faculty'];
        $submit_for_accreditation = $assessment_data['submit_for_accreditation'];
        $combined_review_start_date = $assessment_data['combined_review_start_date'];
        $combined_review_end_date = $assessment_data['combined_review_end_date'];
        $domain_one_badge = $assessment_data['domain_one_badge'];
        $domain_two_badge = $assessment_data['domain_two_badge'];
        $domain_three_badge = $assessment_data['domain_three_badge'];
        $domain_four_badge = $assessment_data['domain_four_badge'];
        $overall_badge = $assessment_data['overall_badge'];
        $combined_review_end_date = $assessment_data['combined_review_end_date'];
        $submit_for_accreditation = $assessment_data['submit_for_accreditation'];
        $course_id = $assessment_data['course_id'];
        
        $assessment_id = $assessment_data['assessment_id'];
        $admin_assessment_id =  get_post_meta($course_id, 'assigned_admin_reviewer_assessment', true);
        $admin_assessment_comment = $admin_assessment_id ? get_post_meta($admin_assessment_id, 'comment', true) : array();

        $first_assessment_id = get_post_meta($course_id, 'assigned_first_reviewer_assessment', true);
        $first_assessment_comment = $first_assessment_id ? get_post_meta($first_assessment_id, 'comment', true) : array();

        $second_assessment_id = get_post_meta($course_id, 'assigned_second_reviewer_assessment', true);
        $second_assessment_comment = $second_assessment_id ? get_post_meta($second_assessment_id, 'comment', true) : array();
        $previous_comments = array();
        $PDF_sub_heading = 'Combined Assessment Report';
        if ( ! empty( $assessment_data['interim_reviewer_data'] ) ) {
            $interim_reviewer_comments = $assessment_data['interim_reviewer_data']['interim_reviewer_comments'];
            $admin_reviewer_comments = $assessment_data['interim_reviewer_data']['admin_reviewer_comments'];
            $previous_comments = array(
                'admin_reviewer_comment' => $admin_reviewer_comments,
                'interim_reviewer_comment' => is_serialized( $interim_reviewer_comments ) ? unserialize( $interim_reviewer_comments ) : $interim_reviewer_comments,
            );
            $PDF_sub_heading = 'Test Course Assessment';
            $interim_reviewer_id = $assessment_data['interim_reviewer_data']['interim_reviewer_id'];
            $interim_reviewer_name = get_userdata($interim_reviewer_id)->display_name;
            $interim_reviewer_table_row = "<tr>
                <td colspan='2' style='width: 50%; border-bottom: 1px solid #0000;'>Reviewer Name</td>
                <td colspan='2' style='width: 50%; border-bottom: 1px solid #0000;'>${interim_reviewer_name}</td>
            </tr>";
            $combined_review_start_date =
            $assessment_data['interim_reviewer_data']['interim_reviewer_commencement_date'];
            $combined_review_end_date =  $assessment_data['interim_reviewer_data']['interim_reviewer_completed_date'];
        }
        $comment_html = $this->get_comments_html($assessment_data['comments'], $previous_comments);
        $question_answer_html = $this->get_question_answer_html_combined_review($assessment_data['all_assessment_values'], $assessment_id);
        // var_dump( $question_answer_html );
        // return 'jhere';
        $eligibility_text = $eligible ? 'Eligible' : 'Not Eligible';
		include( plugin_dir_path( __FILE__ ) . 'pdf-htmls/assessment-summary-pdf.php' );
		$content = ob_get_clean();
		return $content;
    }

    function get_questions_json() {
        return get_option('telas_admin_domain_answers');
    }
    function prepare_assessment_report_pdf($assessment_id) {
        $reviewer_level = get_post_meta( $assessment_id, 'assessment_assigned_user_level', true );
        $standard_questions = get_option( 'telas_admin_domain_answers' );
        if ( empty( $standard_questions ) ) {
            update_option( 'telas_admin_domain_answers', $this->get_questions_json() );
            $standard_questions = get_option( 'telas_admin_domain_answers' );
        }
        ob_start();
        include( plugin_dir_path( __FILE__ ) . 'pdf-htmls/full-assessment-report-pdf.php' );
        $content = ob_get_clean();
        return $content;
    }

    function get_answered_question_value( $assessment_id = 859, $step_key, $performance_criteria_key, $question_key ) {
        $assessment_answer_values = get_post_meta( $assessment_id, 'assessment_answer_data', true );
        $assessment_answer_value = ! empty( $assessment_answer_values['question' . '_' . ($step_key+1) . '_' . ($performance_criteria_key+1) . '_' . ( $question_key+1 ) ] ) ? str_replace( '_', ' ', $assessment_answer_values['question' . '_' . ($step_key+1) . '_' . ($performance_criteria_key+1) . '_' . ( $question_key+1 ) ] ): '-';
        return $assessment_answer_value;
    }


    function get_answered_overall_value( $assessment_id = 859, $step_key, $performance_criteria_key, $domain_score ) {
        $assessment_answer_values = get_post_meta( $assessment_id, 'assessment_answer_data', true );
        $ovarall_value = ! empty( $assessment_answer_values[$this->get_domain_radio_name( ( $step_key+1 ), ( $performance_criteria_key+1 ) )] ) ? $assessment_answer_values[$this->get_domain_radio_name( ( $step_key+1 ), ( $performance_criteria_key+1 ) )] : '-';
        return $this->map_overall_value_with_key( $ovarall_value, $domain_score );
    }

    function map_overall_value_with_key( $domain_value, $domain_score ) {
        return ! empty( $domain_score->$domain_value ) ? $domain_score->$domain_value : false;
    }

    function get_domain($step) {
      $domain = 1;
      if ($step >= 1 && $step <= 2) {
        $domain = 1;
      } else if ($step > 2 && $step <= 4) {
        $domain = 2;
      } else if ($step === 5) {
        $domain = 3;
      } else if ($step > 5 && $step <=8 ) {
        $domain = 4;
      }
      return $domain;
    }
    function get_domain_radio_name($step, $performance_criteria_key) {
        $domainIndex = $this->get_domain($step);
        return "domain_${domainIndex}_${step}_{$performance_criteria_key}";
    }
    function generate_assessment_report_pdf($assessment_id) {
        $assessment_title = str_replace( ' ', '-', strtolower( get_the_title( $assessment_id ) ) );
        $mpdf_instance = $this->get_mdpf_instance();
		// Write some HTML code:
		$html = $this->prepare_assessment_report_pdf( $assessment_id );
		$mpdf_instance->WriteHTML($html);
		$mpdf_instance->SetProtection(array('print'));
		$mpdf_instance->SetTitle("TELAS. - FULL ASSESSMENT REPORT");
		$mpdf_instance->SetAuthor("TELAS.");
		$mpdf_instance->SetWatermarkText("TELAS");
		$mpdf_instance->showWatermarkText = true;
		$mpdf_instance->watermark_font = 'DejaVuSansCondensed';
		$mpdf_instance->watermarkTextAlpha = 0.1;
        $mpdf_instance->SetDisplayMode('fullpage');
        $file_name = 'generated-pdfs/full-assessment-report-of-' . $assessment_title . '.pdf';
        $mpdf_instance->Output(plugin_dir_path( __FILE__ ) . $file_name, 'F');
        return plugin_dir_path( __FILE__ ) . $file_name; 
    }
}
