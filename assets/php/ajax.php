<?php
require_once 'functions.php';

if(isset($_GET['sendmessage'])){
    if(sendMessage($_POST['user_id'],$_POST['msg'])){
        $response['status']=true;
    }else{
        $response['status']=false;

    }

    echo json_encode($response);
}

if(isset($_GET['getmessages'])){
$chats = getAllMessages();
$chatlist="";
// echo "<pre>";
// print_r($chats);
foreach($chats as $chat){
    $ch_user = getUser($chat['user_id']);
    
   
    $seen=false;
    if($chat['messages'][0]['read_status']==1 || $chat['messages'][0]['from_user_id']==$_SESSION['userdata']['id']){
        $seen = true;
    }
    $chatlist.='  
    <div class="d-flex justify-content-between border-bottom chatlist_item" data-bs-toggle="modal" data-bs-target="#chatbox" onclick="popchat('.$chat['user_id'].')" >
                        <div class="d-flex align-items-center p-2">
                            <div><img src="assets/images/profile/'.$ch_user['profile_pic'].'" alt="" height="40" width="40" class="rounded-circle border">
                            </div>
                            <div>&nbsp;&nbsp;</div>
                            <div class="d-flex flex-column justify-content-center" >
                                <a href="#" class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;">'.$ch_user['first_name'].' '.$ch_user['last_name'].'</h6></a>
                                <p style="margin:0px;font-size:small" class="">'.$chat['messages'][0]['msg'].'</p>
                                <time style="font-size:small" class="timeago text-small" datetime="'.$chat['messages'][0]['created_at'].'">'.gettime($chat['messages'][0]['created_at']).'</time>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
      
                          <div class="p-1 bg-primary rounded-circle '.($seen?'d-none':'').'"></div>
    

    

    
    
                        </div>
                    </div>';

}
$json['chatlist'] = $chatlist;



if(isset($_POST['chatter_id']) && $_POST['chatter_id']!=0){
$messages = getMessages($_POST['chatter_id']);
$chatmsg="";
if(checkBS($_POST['chatter_id'])){
    $json['blocked']=true;
}else{
    $json['blocked']=false;

}
updateMessageReadStatus($_POST['chatter_id']);

foreach($messages as $cm){
if($cm['from_user_id']==$_SESSION['userdata']['id']){
    $cl1 = 'align-self-end bg-primary text-light';
    $cl2 = 'text-light';

}else{
    $cl1 = '';
    $cl2 = 'text-muted';
}

    $chatmsg.=' <div class="py-2 px-3 border rounded shadow-sm col-8 d-inline-block '.$cl1.'">'.$cm['msg'].'<br>
    <span style="font-size:small" class="'.$cl2.'">'.gettime($cm['created_at']).'</span>
</div>';
}
$json['chat']['msgs']=$chatmsg;
$json['chat']['userdata']=getUser($_POST['chatter_id']);
}else{
$json['chat']['msgs']='<div class="spinner-border text-center" role="status">
</div>';
}

$json['newmsgcount']=newMsgCount();
echo json_encode($json);
}

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