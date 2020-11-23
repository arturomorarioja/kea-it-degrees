<?php    
    /**
     * It generates the HTML content for a degree's web page based on the global data array
     * 
     * @param The name of the degree
     */
    function showData($degreeName) {
        require_once('read_data.php');

        $degreeKey = array_search($degreeName, array_column($data, 'name'));
        $degree = $data[$degreeKey];

        echo <<<DEGREE_HEADER
            <section id="breadcrumbs">
                {$degree['level']} / {$degree['name']}
            </section>
        </nav>
        <main id="main">
            <section>
                {$degree['description']}
            </section>
        DEGREE_HEADER;
        
        foreach ($degree['semesters'] as $semesters) {
            echo <<<SEMESTER
            <section class="semester">
                <header>Semester {$semesters['semester']}</header>
            SEMESTER;

            foreach ($semesters['subjects'] as $subject) {
                echo <<<SUBJECT
                <article class="subject">
                    <header>{$subject['name']}</header>
                    <main>{$subject['description']}</main>
                </article>
                SUBJECT;
            }

            echo <<<SEMESTER
                </section>
            SEMESTER;
        }
        echo '</main>';    
    }
?>