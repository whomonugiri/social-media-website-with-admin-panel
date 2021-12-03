<?php
 global $user;
 global $posts;
 global $follow_suggestions;
 
 ?>
    <div class="container col-9 rounded-0 d-flex justify-content-between">
        <div class="col-8">

        
            <?php
           
            showError('post_img');
            if(count($posts)<1){
                echo "<p class='p-2 bg-white border rounded text-center my-3'>Follow Someone or Add a new post</p>";
            }
foreach($posts as $post){
    $likes = getLikes($post['id']);
    $comments = getComments($post['id']);
    ?>
     <div class="card mt-4">
                <div class="card-title d-flex justify-content-between  align-items-center">

                    <div class="d-flex align-items-center p-2">
                        <img src="assets/images/profile/<?=$post['profile_pic']?>" alt="" height="30" class="rounded-circle border">&nbsp;&nbsp;<a href='?u=<?=$post['username']?>' class="text-decoration-none text-dark"><?=$post['first_name']?> <?=$post['last_name']?></a>
                    </div>
                    <div class="p-2">
                        <i class="bi bi-three-dots-vertical"></i>
                    </div>
                </div>
                <img src="assets/images/posts/<?=$post['post_img']?>" class="" alt="...">
                <h4 style="font-size: x-larger" class="p-2 border-bottom">
               <span>
               <?php
if(checkLikeStatus($post['id'])){
$like_btn_display='none';
$unlike_btn_display='';
}else{
    $like_btn_display='';
    $unlike_btn_display='none';  
}
    ?>
                <i class="bi bi-heart-fill unlike_btn text-danger" style="display:<?=$unlike_btn_display?>" data-post-id='<?=$post['id']?>'></i>
                <i class="bi bi-heart like_btn" style="display:<?=$like_btn_display?>" data-post-id='<?=$post['id']?>'></i>

                </span>
                &nbsp;&nbsp;<i
                        class="bi bi-chat-left"></i> 
                        
                </h4>
                <div>
                <span class="p-1 mx-2" data-bs-toggle="modal" data-bs-target="#likes<?=$post['id']?>"><?=count($likes)?> likes</span>
                <span class="p-1 mx-2 text-small" data-bs-toggle="modal" data-bs-target="#postview<?=$post['id']?>"><?=count($comments)?> comments</span></div>  
                <?php
if($post['post_text']){
    ?>
 <div class="card-body">
                <?=$post['post_text']?>
                </div>
    <?php
}
                ?>
                <div class="input-group p-2 <?=$post['post_text']?'border-top':''?>">
                 
                        <input type="text" class="form-control rounded-0 border-0 comment-input" placeholder="say something.."
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary rounded-0 border-0 add-comment" data-page='wall' data-cs="comment-section<?=$post['id']?>" data-post-id="<?=$post['id']?>" type="button"
                                id="button-addon2">Post</button>
                </div>

            </div>
            <div class="modal fade" id="postview<?=$post['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body d-flex p-0">
                    <div class="col-8">
                        <img src="assets/images/posts/<?=$post['post_img']?>" class="w-100 rounded-start">
                    </div>



                    <div class="col-4 d-flex flex-column">
                        <div class="d-flex align-items-center p-2 border-bottom">
                            <div><img src="assets/images/profile/<?=$post['profile_pic']?>" alt="" height="50" class="rounded-circle border">
                            </div>
                            <div>&nbsp;&nbsp;&nbsp;</div>
                            <div class="d-flex flex-column justify-content-start align-items-center">
                                <h6 style="margin: 0px;"><?=$post['first_name']?> <?=$post['last_name']?></h6>
                                <p style="margin:0px;" class="text-muted">@<?=$post['username']?></p>
                            </div>
                        </div>


                        <div class="flex-fill align-self-stretch overflow-auto" id="comment-section<?=$post['id']?>" style="height: 100px;">

                          <?php
if(count($comments)<1){
    ?>
<p class="p-3 text-center my-2 nce">no comments</p>
    <?php
}
foreach($comments as $comment){
    $cuser = getUser($comment['user_id']);
    ?>
<div class="d-flex align-items-center p-2">
                                <div><img src="assets/images/profile/<?=$cuser['profile_pic']?>" alt="" height="40" class="rounded-circle border">
                                </div>
                                <div>&nbsp;&nbsp;&nbsp;</div>
                                <div class="d-flex flex-column justify-content-start align-items-start">
                                    <h6 style="margin: 0px;"><a href="?u=<?=$cuser['username']?>" class="text-decoration-none text-dark">@<?=$cuser['username']?></a></h6>
                                    <p style="margin:0px;" class="text-muted"><?=$comment['comment']?></p>
                                </div>
                            </div>

    <?php
}
                          ?>

                            
                          

                           

                        </div>
                        <div class="input-group p-2 border-top">
                            <input type="text" class="form-control rounded-0 border-0 comment-input" placeholder="say something.."
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary rounded-0 border-0 add-comment" data-cs="comment-section<?=$post['id']?>" data-post-id="<?=$post['id']?>" type="button"
                                id="button-addon2">Post</button>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>
            <div class="modal fade" id="likes<?=$post['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Likes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <?php
                if(count($likes)<1){
                    ?>
<p>Currently No Likes</p>
                    <?php
                }
foreach($likes as $f){

    $fuser = getUser($f['user_id']);
    $fbtn='';
    if(checkFollowStatus($f['user_id'])){
        $fbtn = '<button class="btn btn-sm btn-danger unfollowbtn" data-user-id='.$fuser['id'].' >Unfollow</button>';
    }else if($user['id']==$f['user_id']){
        $fbtn='';
    }else{
        $fbtn = '<button class="btn btn-sm btn-primary followbtn" data-user-id='.$fuser['id'].' >Follow</button>';

    }
    ?>
<div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center p-2">
                        <div><img src="assets/images/profile/<?=$fuser['profile_pic']?>" alt="" height="40" class="rounded-circle border">
                        </div>
                        <div>&nbsp;&nbsp;</div>
                        <div class="d-flex flex-column justify-content-center">
                            <a href='?u=<?=$fuser['username']?>' class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;"><?=$fuser['first_name']?> <?=$fuser['last_name']?></h6></a>
                            <p style="margin:0px;font-size:small" class="text-muted">@<?=$fuser['username']?></p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <?=$fbtn?>

                    </div>
                </div>
    <?php
}
                ?>
            </div>
   
        </div>
  </div>
</div>

    <?php
}
            ?>
       
       

        </div>

        <div class="col-4 mt-4 p-3">
       

            <div class="d-flex align-items-center p-2">
                <div><img src="assets/images/profile/<?=$user['profile_pic']?>" alt="" height="60" class="rounded-circle border">
                </div>
                <div>&nbsp;&nbsp;&nbsp;</div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                <a href='?u=<?=$user['username']?>' class="text-decoration-none text-dark"><h6 style="margin: 0px;"><?=$user['first_name']?> <?=$user['last_name']?></h6></a>
                    <p style="margin:0px;" class="text-muted">@<?=$user['username']?></p>
                </div>
            </div>


            <div>
                <h6 class="text-muted p-2">You Can Follow Them</h6>
                <?php
foreach($follow_suggestions as $suser){
    ?>
<div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center p-2">
                        <div><img src="assets/images/profile/<?=$suser['profile_pic']?>" alt="" height="40" class="rounded-circle border">
                        </div>
                        <div>&nbsp;&nbsp;</div>
                        <div class="d-flex flex-column justify-content-center">
                            <a href='?u=<?=$suser['username']?>' class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;"><?=$suser['first_name']?> <?=$suser['last_name']?></h6></a>
                            <p style="margin:0px;font-size:small" class="text-muted">@<?=$suser['username']?></p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-sm btn-primary followbtn" data-user-id='<?=$suser['id']?>' >Follow</button>

                    </div>
                </div>
    <?php
}

if(count($follow_suggestions)<1){
    echo "<p class='p-2 bg-white border rounded text-center'>No Suggestions For You</p>";
}
                ?>
                
               


            </div>
        </div>
    </div>
   