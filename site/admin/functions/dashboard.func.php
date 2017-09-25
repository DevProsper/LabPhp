<?php

function inTable($table){
    global $db;

    $query = $db->query("SELECT COUNT(id) FROM $table");
    return $nombre = $query->fetch();
}


function get_colors($table,$colors){
    if (isset($colors[$table])) {
        return $colors[$table];
    }else{
        return 'orange';
    }
}


function get_comments(){
  global $db;

  $req = $db->query("
    SELECT comments.id,
           comments.name,
           comments.email,
           comments.date,
           comments.post_id,
           comments.comment,
           posts.title
    FROM comments
    JOIN posts
    ON comments.post_id = posts.id
    WHERE comments.seen = '0'
    ORDER BY date DESC
  ");

  $results = [];
  while ($rows = $req->fetchObject()) {
      $results[] = $rows;
  }

  return $results;
}
