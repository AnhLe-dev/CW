<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cw.css">
    <title><?php echo $title; ?></title>
</head>
<body>
    <header><h1>Q&A</h1></header>
    <nav>
        <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="questions.php">Questions</a></li>
        <li><a href="authors.php">Authors</a></li>
        <li><a href="addauthor.php">Add an author</a></li>
        <li><a href="addcategory.php">Add a category</a></li>
        <li><a href="categories.php">Module</a></li>
        <li><a href="addquestion.php">Add a new question</a></li>
    </ul>
</nav>
        </ul>
    </nav>
    <main>
        <?php echo $output; ?>
    </main>
    <footer>&copy; By ĐỨC ANH</footer>
</body>
</html>