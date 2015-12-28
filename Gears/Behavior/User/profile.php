


<?php

require($_SERVER['DOCUMENT_ROOT'] . '/include.php');

if(!$USERSESS->isLoggedIn()) {

	$REDIRECTOR->redirectFromRoot('Public/Auth/login');

} else {

   $connection = $DB->connect();

   $key_arr = ["Username","About"];

   $user_query = new sqlDBQueryResult($connection, "SELECT " . implode(", ",$key_arr) . " FROM USERINFO WHERE UserID = $1",$params=[$USERSESS->getUserID()]);

   $user_result = $user_query->query();

   $user_val_arr = $user_query->getRow();

   if($user_val_arr == null) {

   		$RENDENGINE->render(new Text("Invalid or Nonexistent UserID"));

   } else {

   		$rendlist = new RenderList();

   		$rendlist->addRenderable(new Text('<legend>' . $user_val_arr["username"] . '\'s Profile </legend>'));

   		$rendlist->addRenderable(new Text('<div id="user">'), new Text('<div class="userinfo">'));
   		$rendlist->addRenderable(new Text('<div class="aboutuser"' . $user_val_arr["about"] . "</div></div>"));
   		$rendlist->addRenderable(new Text('</div>'));	

         $rendlist->addRenderable(new Text('<a href ="#"> Edit your profile</a>'));

   		$RENDENGINE->render($rendlist,$standard=True);
   }

}


?>