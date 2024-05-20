<?php

const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

function createDBConnection(): mysqli {
  $connect = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
  if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }
  //echo "Connected successfully<br>";
  return $connect;
}

function closeDBConnection(mysqli $connect): void {
  $connect->close();
}

function getPostsFromDB(mysqli $connect): mysqli_result {
    $sql_query = "SELECT * FROM post";
    return $connect -> query($sql_query);
}

function uploadPostToDB(mysqli $connect, $postContent) {
    $sql_query = "INSERT INTO post (title, subtitle, author, post_alt, author_url, publish_date, image_url, content, image_content, featured) VALUES ('$postContent[title]','$postContent[subtitle]','$postContent[author]','$postContent[post_alt]','$postContent[author_url]','$postContent[publish_date]','$postContent[image_url]','$postContent[content]','$postContent[image_content]','$postContent[featured]' )";
    $connect->query($sql_query);
    }

?>