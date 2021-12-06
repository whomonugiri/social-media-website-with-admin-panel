<?php
require_once 'functions.php';


if(isset($_GET['unblock'])){
  $user_id = $_POST['user_id']; 
    if(unblockUser($user_id)){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}




if(isset($_GET['notread'])){
   


    if(setNotificationStatusAsRead()){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}

if(isset($_GET['follow'])){
    $user_id = $_POST['user_id'];


    if(followUser($user_id)){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}

if(isset($_GET['unfollow'])){
    $user_id = $_POST['user_id'];


    if(unfollowUser($user_id)){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}


if(isset($_GET['like'])){
    $post_id = $_POST['post_id'];

    if(!checkLikeStatus($post_id)){
        if(like($post_id)){
            $response['status']=true;
        }else{
            $response['status']=false;
        }
    
        echo json_encode($response);
    }

  
}


if(isset($_GET['unlike'])){
    $post_id = $_POST['post_id'];

    if(checkLikeStatus($post_id)){
        if(unlike($post_id)){
            $response['status']=true;
        }else{
            $response['status']=false;
        }
    
        echo json_encode($response);
    }

  
}


if(isset($_GET['addcomment'])){
    $post_id = $_POST['post_id'];
    $comment = $_POST['comment'];


    
        if(addComment($post_id,$comment)){
      $cuser = getUser($_SESSION['userdata']['id']);
      $time = date("Y-m-d H:i:s");
            $response['status']=true;
            $response['comment']='<div class="d-flex align-items-center p-2">
            <div><img src="assets/images/profile/'.$cuser['profile_pic'].'" alt="" height="40" class="rounded-circle border">
            </div>
            <div>&nbsp;&nbsp;&nbsp;</div>
            <div class="d-flex flex-column justify-content-start align-items-start">
                <h6 style="margin: 0px;"><a href="?u='.$cuser['username'].'" class="text-decoration-none text-muted">@'.$cuser['username'].'</a> - '.$_POST['comment'].'</h6>
                <p style="margin:0px;" class="text-muted" style="font-size:small">(just now)</p>
            </div>
        </div>';
        }else{
            $response['status']=false;
        }
    
        echo json_encode($response);
    

  
}


if(isset($_GET['search'])){
    $keyword = $_POST['keyword'];
    $data = searchUser($keyword);
$users="";
    if(count($data)>0){
        $response['status']=true;
     


        foreach($data as $fuser){
            $fbtn='';
        
        
       $users.=' <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center p-2">
                                <div><img src="assets/images/profile/'.$fuser['profile_pic'].'" alt="" height="40" class="rounded-circle border">
                                </div>
                                <div>&nbsp;&nbsp;</div>
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="?u='.$fuser['username'].'" class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;">'.$fuser['first_name'].' '.$fuser['last_name'].'</h6></a>
                                    <p style="margin:0px;font-size:small" class="text-muted">@'.$fuser['username'].'</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                              '.$fbtn.'
        
                            </div>
                        </div>';
        
        }
                    
        
$response['users']=$users;



    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}