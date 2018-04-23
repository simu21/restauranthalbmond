 <div class="panel panel-default">
     <div class="panel-body">
         <div id="usercontainer" class="row">
             <?php
             // Schleife über alle Kontakte, die jeweils in einer Tabellenzeile angezeigt werden.
             foreach($users as $user) {
                 if($user->user_picture == NULL) {
                     echo "<div id='userlist' class='col-sm-2'>
                    <td><img id='profilepic' src='images/user_images/user.png' width='65', height='90'><br>";
                 } else {
                     echo "<div id='userlist' class='col-sm-2'>
                    <td><img id='profilepic' src='" . $user->user_picture . "' width='65', height='90'><br>";
                 }
				 echo $user->username."<br>
				".$user->email."<br>
				</div>";
             }
             ?>
         </div>
     </div>
 </div>