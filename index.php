<?php

require_once 'app/CommentController.php';
$commentController = new CommentController();

if ($_POST["regionId"]){
     $commentController->getCity($_POST["regionId"]);
}
elseif($_POST["cityPid"]){
     $commentController->getDistrict($_POST["cityPid"]);
} 
elseif($_POST["fio"]){
     $commentController->insert($_POST);
} 
else{
	$commentController->index();

}
