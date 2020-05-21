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
        return '
        [
            {
                "title": "Standard 1",
                "subTitle": "The design of the online learning environment supports a positive student experience.",
                "content": [
                    {
                        "heading": "The online learning environment is inclusive.",
                        "questions": [
                        {
                            "question": "Language used is consistently appropriate and inclusive (including consistent tone, voice, person)",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "There is evidence that diverse perspectives are respected",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": false,
                        "domainScore": {
                        "4.13": "Yes",
                        "2.75": "Yes But",
                        "1.38": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "The online environment is responsive across devices and platforms.",
                        "questions": [
                        {
                            "question": "The online environment is responsive across different contemporary devices (e.g. screen size adjusting automatically)",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "The online environment and integrated technology are compatible across multiple platforms and operating systems.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "The online environment and integrated technology are compatible with contemporary browsers.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        }
                        ],
                        "adminOnly": true,
                        "domainScore": {
                        "4.13": "Yes",
                        "2.75": "Yes But",
                        "1.38": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "Online learning elements meet appropriate accessibility standards.",
                        "questions": [
                        {
                            "question": "A contemporary set of accessibility standards/guidelines are applied",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "Site, content and all activities meet a contemporary set of accessibility standards/guidelines (e.g. accessible font, contrasting colour)",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "External tools and applications adhere to accessibility standards (e.g. Turnitin, VoiceThread, Echo360, SPSS, Padlet)",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "Files are appropriately optimized for screen readers and size, consistently named, then labelled by type and size",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "Alternate formats are made available for multimedia (e.g. images and alternate texts, subtitling for video or audio, transcripts for video and audio)",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        }
                        ],
                        "adminOnly": true,
                        "domainScore": {
                        "4.19": "Yes",
                        "2.79": "Yes But",
                        "1.4": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "Students have opportunities to provide feedback",
                        "questions": [
                        {
                            "question": "Students have opportunities to provide immediate feedback (e.g. thumbs up/down, stars, flagging)",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Students have opportunities to provide feedback at different points in time (e.g. surveys polls, signposting)",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Students are informed about how their feedback is going to be collected and used",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": false,
                        "domainScore": {
                        "3.93": "Yes",
                        "2.62": "Yes But",
                        "1.31": "No But",
                        "0": "No"
                        }
                    }
                ]
            },
            {
                "title": "Standard 2",
                "subTitle": "The online environment is designed to support learning",
                "content": [
                    {
                        "heading": "The design, layout and navigation of the online learning environment is consistent and intuitive.",
                        "questions": [
                        {
                            "question": "The navigation is useable and functional",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Instructions are provided on how to navigate the site and where to find learning components.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "There is a consistent style guide (e.g. heading hierarchies, bulleted or numbered lists are consistent and tables only used for data).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "All links and embedded content are functional (i.e. not dead).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "Students are guided/informed if they need to leave the online environment to access learning content.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "When students are directed to external content it opens in a new window/tab.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "The channel of communication for students is articulated (e.g. dates, notices, updates and reminders).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": true,
                        "domainScore": {
                        "4.27": "Yes",
                        "2.85": "Yes But",
                        "1.42": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "The online learning environment is logically sequenced and organised.",
                        "questions": [
                        {
                            "question": "A narrative is provided that gives an overview of the learning.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Sequence of learning ((i.e. order/flow) is logical",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Content is arranged into manageable segments that are appropriately labelled.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Content is structured to enhance ease of navigation.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": false,
                        "domainScore": {
                        "4.36": "Yes",
                        "2.91": "Yes But",
                        "1.45": "No But",
                        "0": "No"
                        }
                    }
                ]
            },
            {
                "title": "Standard 3",
                "subTitle": "The online environment includes administrative, technical and learning support details and information.",
                "content": [
                    {
                        "heading": "Links to relevant services, information and policies are provided.",
                        "questions": [
                        {
                            "question": "Links to academic support services and resources are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "Links to up-to-date relevant policies (e.g. academic integrity, copyright, student grievances, assessment procedures) are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "Links to up-to-date relevant institutional services e.g. library, student support are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        }
                        ],
                        "adminOnly": true,
                        "domainScore": {
                        "2.97": "Yes",
                        "1.98": "Yes But",
                        "0.99": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "There are instructions for how technical support resources can be accessed.",
                        "questions": [
                        {
                            "question": "Instructions for accessing technical support contacts are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "Instructions for accessing technical support services and resources are easily located.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        }
                        ],
                        "adminOnly": true,
                        "domainScore": {
                        "3.31": "Yes",
                        "2.21": "Yes But",
                        "1.1": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "Instructions/guides for using the technology are available, consistent and clear.",
                        "questions": [
                        {
                            "question": "Minimal technology required to be successful are specified.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Students are provided with information/help guides for the technologies they will be using.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Requirements for student participation in the online environment are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Expectations for communication in the online environment (e.g. Netiquette) are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": false,
                        "domainScore": {
                        "3.3": "Yes",
                        "2.2": "Yes But",
                        "1.1": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "Support and information to answer student questions is available.",
                        "questions": [
                        {
                            "question": "Answers to common questions (e.g. Q&A, FAQ), or a support focused discussion forum are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "All necessary contact details for the teaching and learning team (e.g. name, email, telephone, office location) are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "Information on availability of teacher is provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "Information on ways to communicate with staff is provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Service and response timeframe expectations are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": true,
                        "domainScore": {
                        "3.37": "Yes",
                        "2.25": "Yes But",
                        "1.12": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "Student analytics are available to learners.",
                        "questions": [
                        {
                            "question": "Students are able to access analytics (e.g. via a dashboard).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Students are able to track their own learning progress using analytics.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Instructions on how to interpret student analytics are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        }
                        ],
                        "adminOnly": false,
                        "domainScore": {
                        "2.76": "Yes",
                        "1.84": "Yes But",
                        "0.92": "No But",
                        "0": "No"
                        }
                    }
                ]
            },
            {
                "title": "Standard 4",
                "subTitle": "The online environment includes student and teacher interactions that are designed to support and progress learning.",
                "content": [
                    {
                        "heading": "Opportunities for student-to-student interaction are evident.",
                        "questions": [
                        {
                            "question": "There are opportunities and tools for synchronous and asynchronous communication between students.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "There are opportunities and tools for students to collaborate with each other.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Instructions provided define the intention of the student-to-student interaction (e.g. discussion forum - general or specific).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Student to student interaction expectations are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": false,
                        "domainScore": {
                        "3.1": "Yes",
                        "2.06": "Yes But",
                        "1.03": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "Opportunities for student-to-teacher interaction are evident.",
                        "questions": [
                        {
                            "question": "Instructions provided define the intention of the student to teacher interaction.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "There are opportunities for both public and private/direct communication between students and teaching staff.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Student-to-teacher interaction expectations are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "There are tools for synchronous and asynchronous communications between student(s) and teacher(s).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": false,
                        "domainScore": {
                        "3.31": "Yes",
                        "2.06": "Yes But",
                        "1.03": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "There are explicit activities to foster the learning community as well as establish relationships and connections.",
                        "questions": [
                        {
                            "question": "There is an activity requiring students to introduce themselves to the class (can be synchronous or asynchronous).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "There is a welcome message (e.g. text or video).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "Teaching team are introduced (e.g. bios, video, Q&A.).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        }
                        ],
                        "adminOnly": true,
                        "domainScore": {
                        "3.11": "Yes",
                        "2.07": "Yes But",
                        "1.04": "No But",
                        "0": "No"
                        }
                    }
                ]
            },
            {
                "title": "Standard 5",
                "subTitle": "Learning and assessment tasks engage students through planned experiences and opportunities for feedback are provided.",
                "content": [
                    {
                        "heading": "The aims, learning outcomes, assessment task details, schedule of learning and participation expectations are provided.",
                        "questions": [
                        {
                            "question": "Details of the aims, learning outcomes and assessment tasks are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "A schedule for learning is provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": false,
                        "domainScore": {
                        "3.84": "Yes",
                        "2.56": "Yes But",
                        "1.28": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "Details about assessment tasks, their requirements, assessment criteria and feedback are provided.",
                        "questions": [
                        {
                            "question": " Processes for assessment submission (method, mode, dates and times, linked to a specific time zone; as well as technical guidelines such as file upload format and size restrictions), handling, marking and feedback (including response times) are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Assessment criteria (e.g. rubrics) for all tasks are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "Instructions on how and when originality checking software will be used is provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "Assessment task examples are provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": true,
                        "domainScore": {
                        "3.93": "Yes",
                        "2.62": "Yes But",
                        "1.31": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "Expectations and outcomes for the learning and assessment tasks are provided.",
                        "questions": [
                        {
                            "question": "Learning and assessment task requirements are clearly explained, including the nature of the engagement (e.g. marked as essential or optional).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Expectations for learner engagement in learning and assessment tasks are clearly stated (e.g. number of hours, length/depth of discussion.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": false,
                        "domainScore": {
                        "3.89": "Yes",
                        "2.59": "Yes But",
                        "1.3": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "There are opportunities for students to actively engage in a variety of learning and assessment tasks.",
                        "questions": [
                        {
                            "question": "Information is provided to students to explain the connection between the learning task(s) and their learning.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "There are opportunities for students to engage in a variety of tasks (e.g. co-creation, quizzes).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "There are opportunities for students to engage independently and with others (e.g. independent work, pairs, groups).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "There are opportunities for students to respond in a variety of formats (e.g. presentation, written, audio, video).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "There are opportunities for students to observe the work of others (e.g. peers, teachers, industry leaders).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": false,
                        "domainScore": {
                        "3.48": "Yes",
                        "2.32": "Yes But",
                        "1.16": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "There are opportunities for students to receive feedback.",
                        "questions": [
                        {
                            "question": "Opportunities for students to receive feedback (e.g. timely, automated, self, peer, teacher) have been communicated.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Information about feedback is provided.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        }
                        ],
                        "adminOnly": true,
                        "domainScore": {
                        "3.34": "Yes",
                        "2.27": "Yes But",
                        "1.13": "No But",
                        "0": "No"
                        }
                    }
                ]
            },
            {
                "title": "Standard 6",
                "subTitle": "Learning and assessment tasks leverage the affordances of digital technologies and support the development of digital literacies.",
                "content": [
                    {
                        "heading": "Learning tasks are supported by relevant digital technology.",
                        "questions": [
                        {
                            "question": "Learning tasks make effective use of technology.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Students are provided with instructions on how to use the tools/technology for learning and assessment tasks.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Where specific technologies are required, relevant access or directions to access the technologies are provided (e.g. podcasting, blogs, graphics software).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": false,
                        "domainScore": {
                        "3.32": "Yes",
                        "2.21": "Yes But",
                        "1.11": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "Opportunities to develop and demonstrate digital literacies are provided.",
                        "questions": [
                        {
                            "question": "Opportunities to develop and demonstrate digital literacies are appropriately scaffolded.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Learning tasks are designed so that students with varying degrees of digital literacy can participate equitably.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": false,
                        "domainScore": {
                        "3.15": "Yes",
                        "2.1": "Yes But",
                        "1.05": "No But",
                        "0": "No"
                        }
                    }
                ]
            },
            {
                "title": "Standard 7",
                "subTitle": "Learning resources are inclusive, quality assured, available and functional.",
                "content": [
                    {
                        "heading": "Learning resources are available and functional.",
                        "questions": [
                        {
                            "question": "Learning resources are available.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Learning resources to be downloaded or streamed are appropriately sized [e.g. large files/formats optimized/compressed where/when applicable].",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "Learning resources are functional on contemporary devices.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "Learning resources enable user control.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Learning resources are fit for purpose (e.g. PDF form that students are required to fill out online is editable).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": true,
                        "domainScore": {
                        "5.6": "Yes",
                        "3.73": "Yes But",
                        "1.87": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "Learning resources are appropriately attributed and copyright compliant.",
                        "questions": [
                        {
                            "question": "Evidence is provided that copyright regulations have been observed.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": true
                        },
                        {
                            "question": "Relevant levels of referencing attribution are provided for learning resources (e.g. Scholarly citations Creative Commons).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": true,
                        "domainScore": {
                        "5.21": "Yes",
                        "3.47": "Yes But",
                        "1.74": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "Learning resources reflect diversity.",
                        "questions": [
                        {
                            "question": "Learning resources are culturally considerate (e.g. indigenous warning, inappropriate clothing/language not evident).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Learning resources reflect diversity including but not limited to gender, culture, demographic groups.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "Learning resources are contextualized to more than one global region.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": false,
                        "domainScore": {
                        "4.62": "Yes",
                        "3.08": "Yes But",
                        "1.54": "No But",
                        "0": "No"
                        }
                    }
                ]
            },
            {
                "title": "Standard 8",
                "subTitle": "Learning resources are relevant and promote student engagement.",
                "content": [
                    {
                        "heading": "Learning resources are relevant.",
                        "questions": [
                        {
                            "question": "Context is provided for the learning resource (i.e. what it actually is, why it is relevant and essential or recommended).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": false,
                        "domainScore": {
                        "5.01": "Yes",
                        "3.34": "Yes But",
                        "1.67": "No But",
                        "0": "No"
                        }
                    },
                    {
                        "heading": "Learning resources are provided in a range of modalities.",
                        "questions": [
                        {
                            "question": "Learning resources utilise digital technologies and media in purposeful ways (e.g. PDF, Video).",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        },
                        {
                            "question": "There is a variety of technologies used to present course content.",
                            "options": [
                                "Yes",
                                "Yes But",
                                "No But",
                                "No"
                            ],
                            "adminOnly": false
                        }
                        ],
                        "adminOnly": false,
                        "domainScore": {
                        "4.56": "Yes",
                        "3.04": "Yes But",
                        "1.52": "No But",
                        "0": "No"
                        }
                    }
                ]
            }
        ]';
    }
    function prepare_assessment_report_pdf($assessment_id) {
        $reviewer_level = get_post_meta( $assessment_id, 'assessment_assigned_user_level', true );
        $standard_questions = get_option( 'telas_admin_domain_answers' );
        if ( empty( $standard_questions ) ) {
            update_option( 'telas_admin_domain_answers', json_decode($this->get_questions_json()) );
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
