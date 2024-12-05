<?php     

include 'header.php';    

$page = $_GET['edu'] ?? '';
if ($page === '') {
    include 'home.php';
} else {
    require_once('src/manage_data.php');

    $educations = [
        'cs' => 'Computer Science',
        'its' => 'IT-sikkerhed',
        'sd' => 'Software Development',
        'wd' => 'Web Development'
    ];

    showData($educations[$page]);
}

include 'footer.php';