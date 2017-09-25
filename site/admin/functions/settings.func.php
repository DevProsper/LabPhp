<?php
function email_taken($email){
    global $db;

    $a = [
        'email' => $email
    ];

    $sql = "SELECT * FROM admins WHERE email=:email ";
    $req = $db->prepare($sql);
    $req->execute($a);
    $free = $req->rowCount($sql);

    return $free;
}

function token($lenght){
    $chars = "jldnhqdnqnbkjqKLJOSCBJVBSMDJIEIO183NIU3Y3289290X0HJkykB";
    return substr(str_shuffle(str_repeat($chars,$lenght)),0,$lenght);
}
