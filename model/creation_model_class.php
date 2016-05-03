<?php
include 'model_class.php';
class Creation_model_class extends Model_class {
    function get_user_creation($id)
    {
        $query = "SELECT `id` FROM `creation` WHERE id_user=$id ORDER BY date_creation DESC";
        $result = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function new_creation($id_user)
    {
        $query = "INSERT INTO `creation` (`id_user`) VALUE (".$id_user.")";
        $this->db->exec($query);
        $query = "SELECT `id` FROM `creation` ORDER BY date_creation DESC LIMIT 1";
        $result = $this->db->query($query)->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function rm_one_creation($id)
    {
        $query = "DELETE FROM `creation` WHERE id=".$id;
        $this->db->exec($query);
        $query = "DELETE FROM `likes` WHERE creation_id=".$id;
        $this->db->exec($query);
        $query = "DELETE FROM `comments` WHERE creation_id=".$id;
        $this->db->exec($query);
        return TRUE;
    }

    function count_creation()
    {
        $query = "SELECT COUNT(id) FROM `creation`";
        $result = $this->db->query($query)->fetch();
        return $result;
    }

    function get_all_creation($page)
    {
        $offset = 5 * $page;
        $query = "SELECT c.id, c.date_creation, u.login
                  FROM `creation` c
                  LEFT JOIN `users` u
                  ON  u.id=c.id_user
                  ORDER BY c.date_creation DESC
                  LIMIT $offset, 5";
        $result = $this->db->query($query);
        while ($tmp = $result->fetch(PDO::FETCH_ASSOC))
        {

            $query = "SELECT count(id) AS nbr_likes FROM LIKES WHERE creation_id = ".$tmp['id'];
            $like = $this->db->query($query)->fetch(PDO::FETCH_ASSOC);
            $tmp['nbr_likes'] = $like['nbr_likes'];
            $data[] = $tmp;
        }
        return $data;
    }

    function new_comment($comment, $creation_id, $user_id)
    {
        $query = "INSERT INTO `comments` (`comment`, `creation_id`, `user_id`) VALUE ('$comment', '$creation_id', '$user_id')";
        if ($this->db->query($query) == FALSE)
            return FALSE;
        return TRUE;
    }

    function get_comment($id)
    {
        $query = "SELECT *
                  FROM `comments` AS com
                  LEFT JOIN `users` AS u
                  ON u.id=com.user_id
                  WHERE com.creation_id=$id ";
        $result = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function liked($creation_id, $user_id)
    {
        $query = "INSERT INTO `likes` (`creation_id`, `user_id`) VALUES ('$creation_id', '$user_id')";
        if ($this->db->exec($query) == FALSE)
            return FALSE;
        return TRUE;
    }

    function already_like($creation_id, $user_id)
    {
        $query = "SELECT count(id) AS nbr FROM `likes` WHERE user_id=$user_id AND creation_id=$creation_id";
        $nbr = $this->db->query($query)->fetch();
        if($nbr['nbr'] > 0)
            return TRUE;
        else
            return FALSE;
    }

    function unlike($creation_id, $user_id)
    {
        $query = "DELETE FROM `likes` WHERE user_id=$user_id AND creation_id=$creation_id";
        if ($this->db->query($query) == FALSE)
            return FALSE;
        return TRUE;
    }
}
?>