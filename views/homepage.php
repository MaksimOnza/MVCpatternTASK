<?php
/**
 * @var $notes array
 * @var $login array
 * @var $users array
 * @var $user string
 */
/*print_r($notes);*/
?>
<a href="#" class="editing_note"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a>
<div id="SN_header">
    <div id="SN_login">
        <?php if ($_SESSION['user_name']) { ?>
            <form method="post" action="/index.php?path=logout">
                <a id="logout" href="index.php?path=login">LogOut</a>
            </form>
        <?php } else { ?>
            <a id="login" href="index.php?path=login">LogIn</a>
        <?php } ?>
    </div>
    <div id="title">Simple Notes <h5 id="_login"><?= $_SESSION['user_name'] ?></h5></div>
</div>
<div id="SN_content">
    <div id="d_messages" class="_messages ">
        <?php
        foreach ($notes as $note) {
            print '
                    <div class="row">
                        <ol class="todo-list" id="'.$note['id'].'">'. $note['note'] . '</ol>
                    </div>                  
                ';
        }
        ?>
    </div>
</div>
<?php {
    print '
    <div id="_send">
        <div id="s_input" class="form-control form-control-file" contenteditable="true"></div>
        <div id="smiles">
            emojy
            <div id="hide">' ?>
    <?php
    /*foreach ($emojy as $smile => $image) {
        print '<img class="smile" src="media/smilies/' . $image . '.gif" title="' . $smile . '" alt="' . $image . '">';
    }*/
    ?>
    <?php
    print '
            </div>
        </div>
        <input id="s_btn" class="btn btn-outline-secondary btn-light" type="button" name="send" value="Send"">
    </div>';
} ?>
<!--<div>
    <table width="100%" border="1" cellpadding="4" cellspacing="0">
        <caption>Users files</caption>
        <tr align="center">
            <th>Files</th>
            <th>Links</th>
            <th>Owner</th>
        </tr>
        <?php
/*        foreach ($links as $row) {
            print '<tr align="center"><td>' . $row['name_file']
                . '</td><td><a href="index.php?path=download&id='
                . $row['id_file'] . '">' . $_SERVER['HTTP_HOST']
                . '/actions/download.php?id=' . $row['id_file']
                . '</a></td><td>' . $name_users[$row['own_user']]
                . '</td></tr>';
        }
        */ ?>
    </table>
</div>-->