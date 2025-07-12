<?php
include 'includes/DatabaseConnection.php';

function query($pdo, $sql,$parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function totalQuestion($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM question');
    $row = $query->fetch();
    return $row[0];
}

function allquestions($pdo) {
    $questions = query($pdo, 'SELECT question.id, questiontext, questiondate, image, author.name as auname, category.name as catename, email FROM question
                         INNER JOIN author ON authorid = author.id
                         INNER JOIN category ON categoryid = category.id');
    return $questions->fetchAll();
}

function insertquestion($pdo, $questiontext, $authorid, $categoryid) {
    $query = 'INSERT INTO question (questiontext, questiondate, authorid, categoryid)
              VALUES (:questiontext, CURDATE(), :authorid, :categoryid)';
    $parameters = [':questiontext' => $questiontext, ':authorid' => $authorid, ':categoryid' => $categoryid];
    query($pdo, $query, $parameters);
}

function updatequestion($pdo, $questionId, $questiontext, $authorid, $categoryid) {
    $query = 'UPDATE question 
              SET questiontext = :questiontext, 
                  authorid = :authorid, 
                  categoryid = :categoryid 
              WHERE id = :id';
    $parameters = [':questiontext' => $questiontext,':authorid' => $authorid,':categoryid' => $categoryid,':id' => $questionId];
    query($pdo, $query, $parameters);
}

function getquestion($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM question WHERE id = :id', $parameters);
    return $query->fetch();
}

function deletequestion($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM question WHERE id = :id', $parameters);
}

function totalAuthor($pdo) {
    $query = $pdo->prepare('SELECT COUNT(*) FROM author');
    $query->execute();
    $row = $query->fetch();
    return $row[0];
}

function allAuthors($pdo) {
    $authors = query($pdo, 'SELECT * FROM author');
    return $authors->fetchAll();
}

function insertAuthor($pdo, $name, $email) {
    $sql = 'INSERT INTO author SET name = :name, email = :email';
    $parameters = [
        ':name' => $name,
        ':email' => $email
    ];
    query($pdo, $sql, $parameters);
}

function updateAuthor($pdo, $id, $name, $email) {
    $sql = 'UPDATE author SET name = :name, email = :email WHERE id = :id';
    $parameters = [
        ':name' => $name,
        ':email' => $email,
        ':id' => $id
    ];
    query($pdo, $sql, $parameters);
}

function getAuthor($pdo, $id) {
    $sql = 'SELECT * FROM author WHERE id = :id';
    $parameters = [':id' => $id];
    return query($pdo, $sql, $parameters)->fetch();
}

function deleteAuthor($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM author WHERE id = :id', $parameters);
}

function totalCategory($pdo) {
    $query = $pdo->prepare('SELECT COUNT(*) FROM category');
    $query->execute();
    $row = $query->fetch();
    return $row[0];
}

function allCategories($pdo) {
    $categories = query($pdo, 'SELECT * FROM category');
    return $categories->fetchAll();
}

function insertCategory($pdo, $name) {
    $sql = 'INSERT INTO category SET name = :name';
    $parameters = [':name' => $name];
    query($pdo, $sql, $parameters);
}


function updateCategory($pdo, $id, $name) {
    $sql = 'UPDATE category SET name = :name WHERE id = :id';
    $parameters = [
        ':name' => $name,
        ':id' => $id
    ];
    query($pdo, $sql, $parameters);
}
function getCategory($pdo, $id) {
    $sql = 'SELECT * FROM category WHERE id = :id';
    $parameters = [':id' => $id];
    return query($pdo, $sql, $parameters)->fetch();
}

function deleteCategory($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM category WHERE id = :id', $parameters);
}


