<?php
echo "<html>

<head>
    <style>
        table#pdf-table {
            border: 0.1px solid #000000;
            font-family: serif;
        }

        #pdf-table td {
            vertical-align: top;
        }
        #pdf-table th {
            font-size: 14pt;
        }

        #pdf-table td {
            border-left: 0.1px solid #000000;
            font-size: 12pt;
        }

        table#pdf-table thead td {
            background-color: #EEEEEE;
            text-align: center;
            border: 0.1px solid #000000;
        }
        #pdf-table th, td {
            padding: 5px;
        }
        #pdf-table .pdf-subheading {
            background-color: #c6d9f1;
        }
        #pdf-table .pdf-heading {
            background-color: #8cb3e2;
        }
        #pdf-table .pdf-subheading td {
            font-weight: bold;
        }
        .disclaimer {
            font-style: italic;
            margin-bottom: 15px;
            margin-top: 15px;
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
                <h1 style='font-weight: bold; font-family: sans-serif; font-weight: 400;'>TELAS COURSE ASSESSMENT SUMMARY</h1>
                    <h3 style='font-family: sans-serif; font-weight: 400; font-style: italic;'>Enhancing the quality of online learning in tertiary education</h3>
            </td>
        </tr>
    </table>
    </htmlpageheader>

    <htmlpagefooter name='myfooter'>
        <div style='border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; '>
        Page {PAGENO} of {nb}
        </div>
    </htmlpagefooter>

    <sethtmlpageheader name='myheader' value='on' show-this-page='1' />
    <sethtmlpagefooter name='myfooter' value='on' />
    mpdf-->
    <table class='items' width='100%' style='border-collapse: collapse;' id='pdf-table'>
        <thead>
            <tr>
                <th colspan='4' class='pdf-heading' style='border-bottom: 1px solid #000000;'>${assessment_title}</th>
            </tr>
        </thead>
        <tbody>
            <tr class='pdf-subheading'>
                <td colspan='4' style='width: 100%; border: 1px solid #000; text-align: center; '>
                    Course Details
                </td>
            </tr>
            <tr>
                <td style='width: 50%; border: 1px solid #000'>Course name</td>
                <td style='width: 50%; border: 1px solid #000;'>${course_name}</td>
            </tr>
            <tr>
                <td style='width: 50%; border: 1px solid #000;'>Course Package Type</td>
                <td style='width: 50%; border: 1px solid #000;'>${course_package_type}</td>
            </tr>
            <tr>
                <td style='width: 50%; border: 1px solid #000;'>Course Package Identifier</td>
                <td style='width: 50%; border: 1px solid #000;'>${course_package_identifier}</td>
            </tr>
            <tr>
                <td style='width: 50%; border: 1px solid #000;'>Course module Identifier</td>
                <td style='width: 50%; border: 1px solid #000;'>${course_module_identifier}</td>
            </tr>
            <tr>
                <td style='width: 50%; border: 1px solid #000;'>Study Area</td>
                <td style='width: 50%; border: 1px solid #000;'>${study_area}</td>
            </tr>
            <tr>
                <td style='width: 50%; border: 1px solid #000;'>Course Level</td>
                <td style='width: 50%; border: 1px solid #000;'>${course_level}</td>
            </tr>
            <tr>
                <td style='width: 50%; border: 1px solid #000;'>Faculty / Dept ( if applicable )</td>
                <td style='width: 50%; border: 1px solid #000;'>${faculty}</td>
            </tr>
            <tr>
                <td style='width: 50%; border: 1px solid #000;'>Review Commencement Date</td>
                <td style='width: 50%; border: 1px solid #000;'>${commencement_date}</td>
            </tr>
            <tr>
                <td style='width: 50%; border: 1px solid #000;'>Review Completion Date</td>
                <td style='width: 50%; border: 1px solid #000;'>${completion_date}</td>
            </tr>
            <tr>
                <td style='width: 50%; border: 1px solid #000;'>Reviewer Name</td>
                <td style='width: 50%; border: 1px solid #000;'>${reviewer_name}</td>
            </tr>
            <tr class='pdf-subheading'>
                <td colspan='4' style='width: 100%; border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: center;'>
                    Assessment Data
                </td>
			</tr>
			${question_answer_html}
            <tr class='pdf-subheading'>
                <td colspan='4' style='width: 100%; border-bottom: 1px solid #000; border-top: 1px solid #000; text-align: center;'>
                    Comments
                </td>
			</tr>
            ${comments_html}
        </tbody>
    </table>
    
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


</html>";
