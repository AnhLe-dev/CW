<?php
try {
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php'; // ✅ THÊM dòng này

    $sql = 'SELECT questions.id, questionstitle, questionsdate, image, 
                   author.name AS auname, 
                   category.name AS catename, 
            FROM question
            INNER JOIN author ON authorid = author.id
            INNER JOIN category ON categoryid = category.id';

    $questions = $pdo->query($sql);
    $title = 'question List';

    $totalquestions = totalquestions($pdo); 

    ob_start();
    include 'templates/questions.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
