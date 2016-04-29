<?php
function query_get_user_creation($db, $id)
{
    $query = "SELECT `id` FROM `creation` WHERE id_user=".$id." ORDER BY date_creation DESC";
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
?>