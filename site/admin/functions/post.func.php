<?php

function get_post(){
    global $db;

    $req = $db->query("
      SELECT posts.id,
             posts.title,
             posts.image,
             posts.date,
             posts.content,
             posts.posted,
             admins.name
      FROM posts
      JOIN admins
      ON posts.writter = admins.email
      WHERE posts.id='{$_GET['id']}'
    ");

    $results = $req->fetchObject();
    return $results;
}


function edit($title,$content,$posted,$id){
    global $db;

    $e = [
        'title'   => $title,
        'content' => $content,
        'posted'  => $posted,
        'id'      => $id
    ];

    $sql = "UPDATE posts SET title=:title, content=:content, date=NOW(), posted=:posted WHERE id=:id";
    $req = $db->prepare($sql);
    $req->execute($e);
}
