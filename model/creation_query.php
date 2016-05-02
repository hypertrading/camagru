<?php
function query_get_user_creation($db, $id)
{
    $query = "SELECT `id` FROM `creation` WHERE id_user=$id ORDER BY date_creation DESC";
    $result = mysqli_query($db, $query);
    while ($tmp = mysqli_fetch_assoc($result))
    {
        $data[] = $tmp;
    }
    return $data;
}

function query_new_creation($db, $id_user)
{
    $query = "INSERT INTO `creation` (`id_user`) VALUE (".$id_user.")";
    mysqli_query($db, $query);
    $query = "SELECT `id` FROM `creation` ORDER BY date_creation DESC LIMIT 1";
    $result = mysqli_query($db, $query);
    $result = mysqli_fetch_assoc($result);
    return $result;
}

function query_rm_one_creation($db, $id)
{
    $query = "DELETE FROM `creation` WHERE id=".$id;
    mysqli_query($db, $query);
    return TRUE;
}

function query_count_creation($db)
{
    $query = "SELECT COUNT(id) FROM `creation`";
    $result = mysqli_query($db, $query);
    $result = mysqli_fetch_assoc($result);
    return $result;
}

function query_get_all_creation($db, $page)
{
    $offset = 5 * $page;
    $query = "SELECT `id`, `date_creation` FROM `creation` ORDER BY `date_creation` DESC LIMIT $offset, 5";
    $result = mysqli_query($db, $query);
    while ($tmp = mysqli_fetch_assoc($result))
    {
        $data[] = $tmp;
    }
    return $data;
}

function query_new_comment($db, $comment, $creation_id, $user_id)
{
    $query = "INSERT INTO `comments` (`comment`, `creation_id`, `user_id`) VALUE ('$comment', '$creation_id', '$user_id')";
    if (mysqli_query($db, $query) == FALSE)
        return FALSE;
    return TRUE;
}

function query_get_comment($db, $id)
{
    $query = "SELECT *
              FROM `comments` AS com
              LEFT JOIN `users` AS u
              ON u.id=com.user_id
              WHERE com.creation_id=$id ";
    $result = mysqli_query($db, $query);
    while ($tmp = mysqli_fetch_assoc($result))
    {
        $data[] = $tmp;
    }
    return $data;
}
?>