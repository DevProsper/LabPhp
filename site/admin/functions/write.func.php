<?php
function post($title,$content,$posted){
    global $db;

    $p = [
        'title'   => $title,
        'content' => $content,
        'writter'  => $_SESSION['admin'],
        'posted'  => $posted
    ];

    $sql = "INSERT INTO posts(title,content,writter,date,posted)
            VALUES(:title,:content,:writter,NOW(),:posted)";
    $req = $db->prepare($sql);
    $req->execute($p);
}


function post_img($tmp_name,$extension){
    global $db;
    $id = $db->lastInsertId();
    $i = [
        'id'      => $id,
        'image'   => $id.$extension
    ];

    $sql = "UPDATE posts SET image= :image WHERE id= :id";
    $req = $db->prepare($sql);
    $req->execute($i);
    move_uploaded_file($tmp_name,"../img/posts/".$id.$extension);
    header("Location:index.php?page=post&id=".$id);
}
