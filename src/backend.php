<?php session_start();

require_once 'library/php-activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function ($cfg) {
    $cfg->set_model_directory('models');
    $cfg->set_connections(array(
        'development' => 'mysql://root:secret@mysql-server/newDataBase'
    ));
});
if (isset($_POST['btn1'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];
    $country = $_POST['country'];

    $user = User::find_by_email($email);
    if ($user->email !=  $email) {
        $user = User::create(array('fullName' => $fullname, 'email' => $email, 'username' => $username, 'password' => $password, 'mobile' => $mobile, 'city' => $city, 'country' => $country, 'status' => 'unmute'));
?>
        <script>
            location.href = 'log_in.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            location.href = 'sign_up.php';
            alert('email already exist');
        </script>
    <?php
    }
}
if (isset($_POST['btn2'])) {
    $login_id = $_POST['login_email'];
    $login_pass = $_POST['login_password'];

    $user = User::find_by_email($login_id);
    if ($user != null && $user->password == $login_pass) {
        $_SESSION['id'] = $user->user_id;
    ?>
        <script>
            location.href = 'user_profile.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            location.href = 'log_in.php';
            alert('please check ur id and password');
        </script>
    <?php
    }
}
if (isset($_POST['logout'])) {

    ?>
    <script>
        var confirmAction = confirm("Are you sure you want to logout");
        if (confirmAction) {
            <?php session_unset(); ?>
            location.href = 'log_in.php';
        } else {
            location.href = 'user_profile.php';
        }
    </script>
<?php
}
if (isset($_POST['upload'])) {
    $user_id = $_SESSION['id'];
    $image = $_POST['image'];
    $video = $_POST['video'];
    $caption = $_POST['caption'];
    if ($image == null && $video == null) {
        $user = Post::create(array('user_id' => $user_id, 'caption' => $caption, 'image' => $image, 'video' => 'null', 'type' => 'text'));
    } elseif ($image != null && $video == null) {
        $user = Post::create(array('user_id' => $user_id, 'caption' => $caption, 'image' => $image, 'video' => 'null', 'type' => 'image'));
    } elseif ($image == null && $video != null) {
        $user = Post::create(array('user_id' => $user_id, 'caption' => $caption, 'image' => 'null', 'video' => $video, 'type' => 'video'));
    } else {
        $user = Post::create(array('user_id' => $user_id, 'caption' => $caption, 'image' => $image, 'video' => $video, 'type' => 'all'));
    }
?>
    <script>
        location.href = 'profile.php';
        alert('Post uplaoded successfully');
    </script>
<?php
}


function find_friend()
{

?>
    <script>
        location.href = 'find_friends.php';
    </script>
<?php
}
function display()
{
    $array = array();
    $query = Muteuser::find('all');
    foreach ($query as $v) {
        array_push($array, $v->muted_id);
    }
    $naman = implode(",", $array);

    $user = Post::find_by_sql("SELECT * FROM `posts` WHERE user_id NOT IN ($naman)");
    foreach ($user as $u) {
        $type =  $u->type;

        switch ($type) {
            case 'text':

                echo ' 
                <div class="social-body">
                 <p>' . $u->caption . '</p>
            <div class="btn-group">
            <form action="view.php" method="POST">
                <button onclick="myfunction()" id="button" class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                <button type="submit" value="' . $u->post_id . '" name="view" class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button><br>
                
                <input type="text" name="comment" placeholder="Comment" >
                <button type="submit" value="' . $u->post_id . '" name="comment_btn" > comment </button>
                </form>
            </div>
            </div>';
                break;
            case 'image':
                echo '<div class="social-body">
                  <p>' . $u->caption . '</p>
                <img src="files/' . $u->image . '" class="img-responsive">
                <div class="btn-group">
                <form action="view.php" method="POST">
                    <button onclick="myfunction()" class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                    <button type="submit" value="' . $u->post_id . '" name="view" class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                    <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button><br>
                    
                    <input type="text" name="comment" placeholder="Comment" >
                    <button type="submit" value="' . $u->post_id . '" name="comment_btn" > comment </button>
                </form>
                </div>
                </div><br>';
                break;
            case 'video':
                echo ' <div class="social-body">
                 <p>' . $u->caption . '</p>
                <video src="files/' . $u->video . '" class="img-responsive"></video>
                <div class="btn-group">
                <form action="view.php" method="POST">
                    <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                    <button type="submit" value="' . $u->post_id . '" name="view" class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                    <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button><br>
                   
                    <input type="text" name="comment" placeholder="Comment" >
                    <button type="submit" value="' . $u->post_id . '" name="comment_btn" > comment </button>
                </form>
                </div>
                </div>';
                break;
            case 'all':
                echo ' <div class="social-body">
                 <p>' . $u->caption . '</p>
                <video src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive"></video>
                <div class="btn-group">
                <form action="view.php" method="POST">
                    <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                    <button type="submit" value="' . $u->post_id . '" name="view" class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                    <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button><br>
                    <form action="" method="POST">
                    <input type="text" name="comment" placeholder="Comment" >
                    <button type="submit" value="' . $u->post_id . '" name="comment_btn" > comment </button>
                </form>
                </div>
                </div>';
                break;
        }


    }


}

if (isset($_POST['comment_btn'])) {
    $comment = $_POST['comment'];
    $post_id = $_POST['comment_btn'];
    $user_id = $_SESSION['id'];

    $user = Comment::create(array('post_id' => $post_id, 'user_id' => $user_id, 'comment' => $comment));
}

function display_myfeed()
{
    $id = $_SESSION['id'];
    $user = Post::find('all');

    foreach ($user as $u) {
        $type =  $u->type;
        if ($u->user_id == $id) {
            switch ($type) {
                case 'text':
                    echo ' 
                    <div class="social-body">
                     <p>' . $u->caption . '</p>
                <div class="btn-group">
                <form action="view.php" method="POST">
                    <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                    <button type="submit" value="' . $u->post_id . '" name="view" class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                    <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button><br>
                    
                    <input type="text" name="comment" placeholder="Comment" >
                    <button type="submit" value="' . $u->post_id . '" name="comment_btn" > comment </button>
                    </form>
                    <form action="" method="POST">
                    <button type="submit" class="btn bg-primary" value="' . $u->post_id . '" name="update_post" > Edit </button>
                    <button type="submit" class="btn bg-danger" value="' . $u->post_id . '" name="del_post" > Delete </button>
                    </form>
                </div>
                </div>';
                    break;
                case 'image':
                    echo '<div class="social-body">
                      <p>' . $u->caption . '</p>
                    <img src="files/' . $u->image . '" class="img-responsive">
                    <div class="btn-group">
                    
                        <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                        <form action="view.php" method="POST">
                        <button type="submit" value="' . $u->post_id . '" name="view" class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                        <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button><br>
                        
                        <input type="text" name="comment" placeholder="Comment" >
                        <button type="submit" value="' . $u->post_id . '" name="comment_btn" > comment </button>
                    
                    </div>
                    </div>
                    </form>
                    <form action="" method="POST">
                    <button type="submit" class="btn bg-primary mx-3" value="' . $u->post_id . '" name="update_post" > Edit </button>
                    <button type="submit" class="btn bg-danger mx-3" value="' . $u->post_id . '" name="del_post" > Delete </button>
                    </form><br>';
                    break;
                case 'video':
                    echo ' <div class="social-body">
                     <p>' . $u->caption . '</p>
                    <video src="files/' . $u->video . '" class="img-responsive"></video>
                    <div class="btn-group">
                    <form action="view.php" method="POST">
                        <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                        <button type="submit" value="' . $u->post_id . '" name="view" class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                        <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button><br>
                       
                        <input type="text" name="comment" placeholder="Comment" >
                        <button type="submit" value="' . $u->post_id . '" name="comment_btn" > comment </button>
                    </form>
                    <form action="" method="POST">
                    <button type="submit" class="btn bg-primary" value="' . $u->post_id . '" name="update_post" > Edit </button>
                    <button type="submit" class="btn bg-danger" value="' . $u->post_id . '" name="del_post" > Delete </button>
                    </form>
                    </div>
                    </div>';
                    break;
                case 'all':
                    echo ' <div class="social-body">
                     <p>' . $u->caption . '</p>
                    <video src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive"></video>
                    <div class="btn-group">
                    <form action="view.php" method="POST">
                        <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                        <button type="submit" value="' . $u->post_id . '" name="view" class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                        <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button><br>
                        <form action="" method="POST">
                        <input type="text" name="comment" placeholder="Comment" >
                        <button type="submit" value="' . $u->post_id . '" name="comment_btn" > comment </button>
                    
                    </div>
                    </div>
                    </form>
                    <form action="" method="POST">
                    <button type="submit" class="btn bg-primary" value="' . $u->post_id . '" name="update_post" > Edit </button>
                    <button type="submit" class="btn bg-danger" value="' . $u->post_id . '" name="del_post" > Delete </button>
                    </form>';
                    break;
            }
        }
    }


}
if (isset($_POST['view'])) {
    $_SESSION['view'] = $_POST['view'];
}
function display_comments()
{
    $user = Post::find('all');
    foreach ($user as $u) {
        $type =  $u->type;
        if ($u->post_id == $_SESSION['view']) {
            switch ($type) {
                case 'text':
                    echo ' 
                <div class="social-body">
                 <p>' . $u->caption . '</p>
            <div class="btn-group">
            <form action="view.php" method="POST">
                <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                <button type="submit" value="' . $u->post_id . '" name="view" class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button><br>
                
                <input type="text" name="comment" placeholder="Comment" >
                <button type="submit" value="' . $u->post_id . '" name="comment_btn" > comment </button>' .
                        $user = Comment::find('all');
                    foreach ($user as $v) {
                        if ($u->post_id == $v->post_id) {
                            echo '<br>';
                            echo $v->comment;
                        }
                    }

                    echo '</form>
            </div>
            </div>';
                    break;
                case 'image':
                    echo '<div class="social-body">
                  <p>' . $u->caption . '</p>
                <img src="files/' . $u->image . '" class="img-responsive">
                <div class="btn-group">
                <form action="" method="POST">
                    <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                    <button type="submit" value="' . $u->post_id . '" name="view" class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                    <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button><br>
                    
                    <input type="text" name="comment" placeholder="Comment" >
                    <button type="submit" value="' . $u->post_id . '" name="comment_btn" id="button"> comment </button>
                    <button type="submit" value="' . $u->post_id . '" onclick="toggle();" name="update_btn" id="hidden" hidden>Update </button>
                    </form> </div></div>' .
                        $user = Comment::find('all');
                    foreach ($user as $v) {
                        if ($u->post_id == $v->post_id) {
                            echo '<br>';
                            echo $v->comment;
                            echo '<br>';
                            echo '<form action="" method="POST">
                                    <button type="submit" value="' . $v->comment_id . '" name="edit" class="btn bg-primary mx-2">Edit</button>
                                    <button type="submit" value="' . $v->comment_id . '" name="del" class="btn bg-danger  mx-2">Delete</button>
                                    </form>';
                        }
                    }
                    echo '
               
                <br>';
                    break;
                case 'video':
                    echo ' <div class="social-body">
                 <p>' . $u->caption . '</p>
                <video src="files/' . $u->video . '" class="img-responsive"></video>
                <div class="btn-group">
                <form action="view.php" method="POST">
                    <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                    <button type="submit" value="' . $u->post_id . '" name="view" class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                    <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button><br>
                   
                    <input type="text" name="comment" placeholder="Comment" >
                    <button type="submit" value="' . $u->post_id . '" name="comment_btn" > comment </button>' .
                        $user = Comment::find('all');
                    foreach ($user as $v) {
                        if ($u->post_id == $v->post_id) {
                            echo '<br>';
                            echo $v->comment;
                        }
                    }
                    echo '</form>
                </div>
                </div>';
                    break;
                case 'all':
                    echo ' <div class="social-body">
                 <p>' . $u->caption . '</p>
                <video src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive"></video>
                <div class="btn-group">
                <form action="view.php" method="POST">
                    <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                    <button type="submit" value="' . $u->post_id . '" name="view" class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                    <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button><br>
                    <form action="" method="POST">
                    <input type="text" name="comment" placeholder="Comment" >
                    <button type="submit" value="' . $u->post_id . '" name="comment_btn" > comment </button>' .
                        $user = Comment::find('all');
                    foreach ($user as $v) {
                        if ($u->post_id == $v->post_id) {
                            echo '<br>';
                            echo $v->comment;
                        }
                    }
                    echo '</form>
                </div>
                </div>';
                    break;
            }
        }
    }
}
function user_table()
{
    $id = $_SESSION['id'];
    $user = User::find('all');
    echo '<form action="backend.php" method="POST"><table><tr><th>Name</th><th>Email</th><th>Status</th><th>Change Status</th></tr>';
    foreach ($user as $u) {
        if ($u->user_id != $id) {
            echo '<tr><td>' . $u->username . '</td><td>' . $u->email . '</td><td><button type="submit" value="' . $u->user_id . '" name="mute" class="btn bg-dark text-muted" >MUTE</button></td><td><button type="submit" value="' . $u->user_id . '" name="unmute" class="btn bg-dark text-muted" >UNMUTE</button></td></tr>';
        }
    }
}
if (isset($_POST['mute'])) {
    $value = $_POST['mute'];
    $id = $_SESSION['id'];
    $user = Muteuser::create(array('user_id' =>   $id, 'muted_id' =>  $value));
    $user->save();
}
if (isset($_POST['unmute'])) {
    $value = $_POST['unmute'];
    $id = $_SESSION['id'];
    $user = Muteuser::find('all');
    foreach ($user as $u) {
        if ($u->user_id ==  $id  && $u->muted_id == $value) {
            $u->delete();
        }
    }
}
if (isset($_POST['edit'])) {
    $value = $_POST['edit'];
    $comment = Comment::find_by_comment_id($value);
    $_SESSION['comment'] =  $comment->comment;
?>
    <script>
        location.href = 'profile.php';
        var naman = <?php echo $_SESSION['comment']; ?>
        alert(naman);
    </script>
<?php
}
if (isset($_POST['update_post'])) {
    $value = $_POST['update_post'];
    $user = Post::find_by_post_id($value);
    $_SESSION['u_id'] = $user->post_id;
    $_SESSION['u_caption'] = $user->caption;
?>
    <script>
        location.href = 'update_post.php';
    </script>
<?php
}
if (isset($_POST['del'])) {
    $value = $_POST['del'];
    $user = Comment::find_by_comment_id($value);
    $user->delete();
}
if (isset($_POST['del_post'])) {
    $value = $_POST['del_post'];
    $user = Post::find_by_post_id($value);
    $user->delete();
}
if (isset($_POST['update'])) {
    $post_id = $_POST['u_id'];
    $user_id = $_SESSION['id'];
    $image = $_POST['u_image'];
    $video = $_POST['u_video'];
    $caption = $_POST['u_caption'];
    $user = Post::find_by_post_id($post_id);
    if ($image == null && $video == null) {
        $user->caption = $caption;
        $user->save();
    } elseif ($image != null && $video == null) {
        $user->caption = $caption;
        $user->image = $image;
        $user->save();
    } elseif ($image == null && $video != null) {
        $user->caption = $caption;
        $user->video = $video;
        $user->save();
    } else {
        $user->caption = $caption;
        $user->image = $image;
        $user->video = $video;
        $user->save();

    }
?>
    <script>
        location.href = 'profile.php';
        alert('Post uplaoded successfully');
    </script>
<?php
}

?>
<script>

    function myfunction() {
        $('#button').css('background-color', 'red')
    }
</script>