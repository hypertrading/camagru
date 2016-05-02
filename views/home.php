<?php
include "header.php";
include "../controllers/main_functions.php";
$nb_page = pagination();
if ($_GET['page'] == "")
    $creations = get_all_creation(0);
else
    $creations = get_all_creation($_GET['page']);
?>
<h2>All pictures</h2>
<?php
if (isset($creations))
{
    echo "<div class='creations-box'>";
        foreach ($creations as $creation) {
            $comments = get_comment($creation['id']);
            echo "<div class='creation float-left'>
                        <p>".$creation['date_creation']."</p>
                        <img src='../assets/img/user_creations/".$creation['id'].".png'>";
            if ($_SESSION['user'] != NULL)
            {
                echo "<form method='post' action='../controllers/add_comment.php'>
                            <label>
                                Comment :<input type='text' name='comment'>
                            </label>
                            <input type='number' name='creation_id' value='".$creation['id']."' hidden>
                            <input type='number' name='user_id' value='".$_SESSION['user']['id']."' hidden>
                            <input type='submit' Value='Send' >
                        </form>";
            }
            echo "</div>";
            if (isset($comments)) {
                echo "<div class='comments-box float-left'>";
                foreach ($comments as $comment) {
                    echo "<div class='comment'>
                            <p><small>".$comment['date_creation']." by ".$comment['login']."</small> ".$comment['comment']."</p>
                          </div>";
                }
                echo "</div>";
            }
            echo "<div class='clear'></div>"; // Clear before next creation
            echo "<hr>";
        }
    echo "</div>"; // close creationS-box

    $next = $_GET['page'] + 1;
    $prev = $_GET['page'] - 1;
    if($prev >= 0)
        echo '<a href="?page='.$prev.'">Previous</a>';
    for ($i = 0; $i != $nb_page; $i++)
    {
        echo '<a href="?page='.$i.'">'.$i.'</a>';
    }
    if($next < $nb_page)
        echo '<a href="?page='.$next.'">Next</a>';

}
include "footer.php";
?>
