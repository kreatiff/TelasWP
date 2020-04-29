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
    function generate_assessment_summary_pdf($assessment_data) {
		$mpdf_instance = $this->get_mdpf_instance();
		// Write some HTML code:
		$html = $this->course_assessment_summary_pdf_generate($assessment_data);
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

	function course_assessment_summary_pdf_generate($assessment_data = array()) {
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
		include( plugin_dir_path( __FILE__ ) . 'pdf-htmls/assessment-summary-pdf.php' );
		$content = ob_get_clean();
		return $content;
	}
}