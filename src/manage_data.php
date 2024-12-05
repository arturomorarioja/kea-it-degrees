<?php    

/**
 * It displays the HTML content for a degree's web page
 * 
 * @param The name of the degree
 */
function showData(string $degreeName): void {
    // Degree information is read from a JSON file
    $data = json_decode(file_get_contents('data/info.json'), true)['kea-it-degrees'];

    // The degree to display is searched in the retrieved data
    $degreeKey = array_search($degreeName, array_column($data, 'name'));
    $degree = $data[$degreeKey];

    // The information required is displayed
    echo <<<DEGREE_HEADER
    
        <nav id="breadcrumbs">
            <p>{$degree['level']} / {$degree['name']}</p>
        </nav>
        <main>
            <section>
                <p>{$degree['description']}</p>
            </section>
    DEGREE_HEADER;
    
    foreach ($degree['semesters'] as $semesters) {
        echo <<<SEMESTER
        <section class="semester">
            <header>
                <h1>Semester {$semesters['semester']}</h1>
            </header>
        SEMESTER;

        foreach ($semesters['subjects'] as $subject) {
            echo <<<SUBJECT
            <article class="subject">
                <header>
                    <h2>{$subject['name']}</h2>
                </header>
                <p>{$subject['description']}</p>
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