<?php

function get_posts(){
    global $db;

    $req = $db->query("
        SELECT posts.id,
               posts.title,
               posts.image,
               posts.date,
               posts.content,
               admins.name
        FROM posts
        JOIN admins
        ON posts.writter = admins.email
        WHERE posted= '1'
        ORDER BY date DESC
        LIMIT 0,2
    ");

    $resultats = [];

    while ($rows = $req->fetchObject()) {
        $resultats [] = $rows;
    }

    return $resultats;
}
