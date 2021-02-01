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
		);
        $mpdf = new \Mpdf\Mpdf($mpdf_config_array);
        return $mpdf;
    }
    
    function generate_assessment_summary_pdf($assessment_data, $eligible) {
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
        return plugin_dir_path( __FILE__ ) . $file_name; 
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

    function get_question_answer_html( $assessment_answer_value ) {
        $actual_assessment_answers = unserialize( $assessment_answer_value );
        $question_answer_html = "";
        foreach ( $actual_assessment_answers as $question_key => $answer ) {
            $exploded_question_key = explode('_', $question_key );
            $step_index = $exploded_question_key[1] - 1;
            $tab_index = $exploded_question_key[2] - 1;
            $question_index = $exploded_question_key[3] - 1;
            $question = $this->get_question_by_question_key( $step_index, $tab_index, $question_index );
            $formatted_answer = ucwords( join( ' ', explode('_', $answer ) ) );
            $actual_step_index = $step_index + 1;
            $actual_tab_index = $tab_index + 1;
            $actual_question_index = $question_index + 1;
            $question_answer_html .= "<tr>
                <td style='width: 50%; border: 1px solid #000;'>${actual_step_index}.${actual_tab_index}.${actual_question_index}. ${question}</td>
                <td style='width: 50%; border: 1px solid #000;'>${formatted_answer}</td>
            </tr>";
        }
        return $question_answer_html;
    }

    function get_question_by_question_key($step_index, $tab_index, $question_index) {
        $questions = get_option( 'telas_admin_domain_answers' );
        return $questions[$step_index]['content'][$tab_index]['questions'][$question_index]['question'];
    }

    function assessment_pdf_generate($assessment_data = array()) {
        ob_start();
            $course_name = $assessment_data['course_name'];
            $assessment_title = $assessment_data['assessment_title'];
            $course_package_type = $assessment_data['course_package_type'];
            $course_package_identifier = $assessment_data['course_package_identifier'];
            $course_module_identifier = $assessment_data['course_module_identifier'];
            $study_area = $assessment_data['study_area'];
            $course_level = $assessment_data['course_level'];
            $faculty = $assessment_data['faculty'];
            $question_answer_html = $this->get_question_answer_html( $assessment_data['assessment_answer_data'][0] );
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
        $combined_review_end_date = $assessment_data['combined_review_end_date'];
        $submit_for_accreditation = $assessment_data['submit_for_accreditation'];
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
