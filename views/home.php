<?php
include "header.php";
include "../controllers/home_class.php";
$home = new home();
$nb_page = $home->pagination();
if (!isset($_GET['page']))
    $creations = $home->get_all_creation(0);
else
    $creations = $home->get_all_creation($_GET['page']);

echo "<h2>All pictures</h2>";

if (isset($creations))
{
    echo "<div class='creations-box'>";
        foreach ($creations as $creation) {
            $comments = $home->get_comment($creation['id']);
            echo "<div class='creation float-left'>
                        <img src='../assets/img/user_creations/".$creation['id'].".png'>
                        <p>
                            <small>".$creation['date_creation']." by </small>
                            <small>".$creation['login']."</small>
                            <span class='likes'> ".$creation['nbr_likes']."</span>";
            if(isset($_SESSION['user']) && $home->already_like($creation['id'], $_SESSION['user']['id']) == FALSE)
            {
               echo "
                            <form method='post' action='../controllers/like_it.php'>
                            <input type='number' name='creation_id' value='" . $creation['id'] . "' hidden>
                            <input type='number' name='user_id' value='" . $_SESSION['user']['id'] . "' hidden>
                            <input type='submit' value='Like' class=\"button\"></form>";
            }
            else if (isset($_SESSION['user']) && $home->already_like($creation['id'], $_SESSION['user']['id']) == TRUE)
            {
                echo "
                            <form method='post' action='../controllers/unlike.php'>
                            <input type='number' name='creation_id' value='" . $creation['id'] . "' hidden>
                            <input type='number' name='user_id' value='" . $_SESSION['user']['id'] . "' hidden>
                            <input type='submit' value='Unlike' class=\"button\"></form>";
            }
            echo "</p></div>";

            echo "<div class='comments-box float-left'>";
            if (isset($_SESSION['user']))
            {
                echo "<form method='post' action='../controllers/add_comment.php'>
                            <label class='comment-it'>
                                Comment :<input type='text' name='comment'><input type='submit' Value='Send' class=\"button\">
                            </label>
                            <input type='number' name='creation_id' value='".$creation['id']."' hidden>
                            <input type='number' name='user_id' value='".$_SESSION['user']['id']."' hidden>
                        </form>";
            }
            if (isset($comments)) {
                foreach ($comments as $comment) {
                    echo "<div class='comment'>
                            <p><small>".$comment['date_creation']." by ".$comment['login']."</small> ".$comment['comment']."</p>
                          </div>";
                }
            }
            echo "</div>";
            echo "<div class='clear'></div>"; // Clear before next creation
            echo "<hr>";
        }
    echo "</div>"; // close creationS-box
    echo "<div class='pagination'>";
        $next = $_GET['page'] + 1;
        $prev = $_GET['page'] - 1;
        if($prev >= 0)
            echo '<a href="?page='.$prev.'">Previous</a> ';
        for ($i = 0; $i != $nb_page; $i++)
        {
            echo '<a href="?page='.$i.'">'.$i.'</a> ';
        }
        if($next < $nb_page)
            echo '<a href="?page='.$next.'"> Next</a>';
}   echo "</div>";
include "footer.php";
?>
