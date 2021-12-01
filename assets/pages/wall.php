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
                <h4 style="font-size: x-larger" class="p-2 border-bottom"><i class="bi bi-heart"></i>&nbsp;&nbsp;<i
                        class="bi bi-chat-left"></i>
                </h4>
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
                    <input type="text" class="form-control rounded-0 border-0" placeholder="say something.."
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary rounded-0 border-0" type="button"
                        id="button-addon2">Post</button>
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
   