<?php


    $sql = "SELECT * FROM articles";
    $query = mysqli_query($db, $sql);

    //CREATE
    if (isset($_REQUEST["new_post"])) {
        $title = $_REQUEST["title"];
        $content = $_REQUEST["content"];

        $sql = "INSERT INTO articles (title, content) VALUES ('$title', '$content')";
        mysqli_query($db, $sql);

        header("Location: news.php?info=added");
        exit();
    }

    //READ
    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        $sql = "SELECT * FROM articles WHERE id = $id";
        $query = mysqli_query($db, $sql);
    }

    //UPDATE
    if (isset($_REQUEST['update'])) {
        $id = $_REQUEST['id'];
        $title = $_REQUEST["title"];
        $content = $_REQUEST["content"];

        $sql = "UPDATE articles SET title = '$title', content = '$content' WHERE id = $id";
        mysqli_query($db, $sql);

        header("Location: news.php?info=updated");
        exit();
    }

    //DELETE
    if (isset($_REQUEST['delete'])) {
        $id = $_REQUEST['id'];

        $sql = "DELETE FROM articles WHERE id = $id";
        $query = mysqli_query($db, $sql);

        header("Location: news.php?info=deleted");
        exit();
    }
?>