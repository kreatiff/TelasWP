<html>
<head>
    <style>
        div.step-wrapper {
            /* border: 1px solid; */
            margin-top: 10px;
        }
        h5.step-heading {
            /* border-bottom: 1px solid; */
            background: #8cb3e2;
            margin: 0px;
            width: 100%;
            display: inline-block;
            padding: 5px;
            text-align: center;
        }
        h6.performance-heading {
            padding: 20px;
            background: #c6d9f1;
            margin-top: 0px;
            text-align: center;
            width: 100%;
        }
        .question-wrapper {
            padding: 0px 10px 0px 20px;
            width: 100%;
        }
        .overall {
            padding: 0px 10px 0px 20px;
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .answered-value {
            text-transform: capitalize;
        }
        #summary-pdf-footer {
            text-align: center;
        }
    </style>
</head>

<body>
    <!--mpdf
    <htmlpageheader name='myheader'>
    <table width='100%'>
        <tr>
            <td width='100%' style='text-align: center'>
                <h1 style='font-weight: bold; font-family: sans-serif; font-weight: 400;'>TELAS FULL ASSESSMENT REPORT</h1>
                    <h3 style='font-family: sans-serif; font-weight: 400; font-style: italic;'>Enhancing the quality of online learning in tertiary education</h3>
            </td>
        </tr>
    </table>
    </htmlpageheader>

    <htmlpagefooter name='myfooter'>
        <div style='font-size: 9pt; text-align: center; padding-top: 3mm; '>
        Page {PAGENO} of {nb}
        </div>
    </htmlpagefooter>

    <sethtmlpageheader name='myheader' value='on' show-this-page='1' />
    <sethtmlpagefooter name='myfooter' value='on' />
    mpdf-->
    <div id="full-report-pdf-wrapper">
        <div id="course-meta">
            <div class="course-name">
                <span id="course-name">
                    <strong>Course Name:</strong> <?php echo get_the_title( get_post_meta( $assessment_id, 'assigned_course', true ) ); ?>
                </span>
            </div>
            <div class="completion-date">
                <span id="completion-date">
                    <strong>Date:</strong> <?php echo get_post_meta( get_post_meta( $assessment_id, 'assigned_course', true ), $reviewer_level. '_completion_date', true ); ?>
                </span>
            </div>
            <div class="assessment-level">
                <span style="text-transform: capitalize">
                    <strong>Assessment Level:</strong> <?php echo str_replace('_', ' ', $reviewer_level ); ?>
                </span>
            </div>
            <div class="reviewer-email">
                <span>
                    <strong>Reviewer E-mail: </strong><?php echo get_userdata(
                        get_post_meta( $assessment_id, 'assigned_reviewer_user_id', true )
                    )->user_email; ?>
                </span>
            </div>
        </div>
        <div id="assessment-details">
            <?php foreach( $standard_questions as $step_key => $step ) : ?>
                <div id="standard-<?php echo $step_key; ?>" class="step-wrapper">
                    <h5 class="step-heading"><?php echo $step->title; ?> - Standard description: <?php echo $step->subTitle; ?></h5>
                    <div class="performance-criteria">
                        <?php foreach( $step->content as $performance_criteria_key => $performance_criteria ) : ?>
                            <h6 class="performance-heading">Performance criteria: <?php echo $performance_criteria->heading; ?></h6>
                            <?php foreach( $performance_criteria->questions as $question_key => $questions ) : ?>
                                <div class="question-wrapper">
                                    <div>
                                        <h6 class="question-heading"><?php echo ($step_key+1) . '.' . ($performance_criteria_key+1) . '. ' . $questions->question; ?></h6>
                                    </div>
                                    <div class="answered-value">
                                        <?php echo ($step_key+1) . '.' . ($performance_criteria_key+1) . '.' . ($question_key+1) . '. ' .$this->get_answered_question_value( $assessment_id, $step_key, $performance_criteria_key, $question_key ); ?>
                                    </div>
                                </div>
                            <?php endforeach; // Performance ?>
                            <?php if ( ! empty( $this->get_answered_overall_value( $assessment_id, $step_key, $performance_criteria_key, $performance_criteria->domainScore ) ) ) : ?>
                                <div class="overall">
                                    Overall: <?php echo $this->get_answered_overall_value( $assessment_id, $step_key, $performance_criteria_key, $performance_criteria->domainScore ); ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; // content ?>
                    </div>
                    <?php //var_dump($step->content[0]); ?>
                    
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div id='summary-pdf-footer'>
        <div>
            TELAS<br/>
            Technology Enhanced Learning Accreditation Standards<br/>
            w: <a href='https://www.telas.edu.au'>www.telas.edu.au</a><br/>
            e: <a href='mailto:admin@telas.edu.au'>admin@telas.edu.au</a><br/>
            PO BOX 350, Tugun QLD 4224 Australia<br/>
            <span style='font-style: italic'>TELAS is a service of ASCILITE www.ascilite.org</span>
        </div>
    </div>
</body>
</html>