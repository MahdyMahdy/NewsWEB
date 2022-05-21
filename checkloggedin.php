<?php
	////////////////////////////////////////////////////////////////////////
	//if the user is loged in
  if(empty($_SESSION["user_id"]))
  {
    print '<section class="section coming-soon" data-section="section2">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="right-content">
              <div class="top-content">
                <h6>Login</h6>
              </div>
              <form id="contact" action="index.php" method="post">
                <div class="row">
                  <div class="col-md-12">
                    <fieldset>
                      <input name="LoginEmail" type="text" class="form-control" id="email" placeholder="Your Email" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <input name="LoginPassword" type="password" class="form-control" placeholder="Your Password" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">LogIn</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <div class="top-content">
                <h6>Sign Up</h6>
              </div>
              <form id="contact" action="index.php" method="post">
                <div class="row">
                  <div class="col-md-12">
                    <fieldset>
                      <input name="SignUpName" type="text" class="form-control" id="name" placeholder="Your Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <input name="SignUpEmail" type="text" class="form-control" id="email" placeholder="Your Email" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <input name="SignUpPassword1" type="password" class="form-control" placeholder="Password" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <input name="SignUpPassword2" type="password" class="form-control" placeholder="Confirm Password" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">Sign Up</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>';
  }
	///////////////////////////////////////////////////////////////////////
 ?>

  <?php
	////////////////////////////////////////////////////////////////////////////
	//if the user is loged in
  if(!empty($_SESSION['user_id']))
  {
    echo '<section class="section contact" data-section="section3">
      <div class="container">
        <div class="row">
          <br><br><br><br>
          </div>
          <div class="col-md-12">

          <!-- Do you need a working HTML contact-form script?

                      Please visit https://templatemo.com/contact page -->

            <form id="contact" action="index.php" method="post">
              <div >
                <div class="col-md-12">
                    <fieldset>
                      <input name="InsertTitle" type="text" class="form-control" id="name" placeholder="Title" required="">
                    </fieldset>
                  </div>
                <div class="col-md-12">
                  <fieldset>
                    <textarea name="InsertBody" rows="6" class="form-control" id="message" placeholder="Body" required=""></textarea>
                  </fieldset>
                </div>
                <div class="row" >
  									<center style="color:white;margin-left:30px;"><input type="radio" name="InsertCat" value="Health" checked="true"> Health</center>
  									<center style="color:white;margin-left:30px;"><input type="radio" name="InsertCat" value="Sports"> Sports</center>
  									<center style="color:white;margin-left:30px;"><input type="radio" name="InsertCat" value="Politics"> Politics</center>
  									<center style="color:white;margin-left:30px;"><input type="radio" name="InsertCat" value="Technology"> Technology</center>
                </div>
                <br>
                <div class="col-md-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="button">Insert News</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
    </section>';
  }
	//////////////////////////////////////////////////////////////////
   ?>
   <?php
	 ///////////////////////////////////////////////////////////////////
	 //if the user is loged in and admin
   if(!empty($_SESSION['user_id']))
   {
     $id=$_SESSION["user_id"];
     $query="SELECT users.user_role FROM users WHERE users.user_id=$id";
     if($r = mysqli_query($dbc, $query))
     {
       $row = mysqli_fetch_array($r,MYSQLI_NUM);
       if($row[0]=='admin')
       {
         echo '<section class="section contact" data-section="Section4">
           <div class="container">
             <div class="row" style="color:white;margin-left:30px;"><br><br><br><br><br><br>
             <br><br><br>';
             $query="SELECT * FROM forbiddenwords";
             if($r = mysqli_query($dbc,$query))
             {
               $count=0;
               while($row = mysqli_fetch_array($r,MYSQLI_NUM))
               {
                 $count++;
                 print $row[0]."/";
                 if($count%20==0)
                 {
                   print '<br>';
                 }
               }
             }
             echo '
               <br><br>
               </div>
               <div class="col-md-12">

               <!-- Do you need a working HTML contact-form script?

                           Please visit https://templatemo.com/contact page -->

                 <form id="contact" action="index.php" method="post">
                   <div >
                     <div class="col-md-12">
                         <fieldset>
                           <input name="word" type="text" class="form-control" id="name" placeholder="Word" required="">
                         </fieldset>
                      </div>
                   </div>
                   <div class="col-md-12">
                     <fieldset>
                       <button type="submit" id="form-submit" class="button">Insert Word</button>
                     </fieldset>
                   </div>
                 </form>
               </div>
         </section>';
       }
     }
   }
	 /////////////////////////////////////////////////////////////////////////////////
    ?>
    <?php
		//////////////////////////////////////////////////////////////////////
		//if the user is loged in
    if(!empty($_SESSION['user_id']))
    {
      $id=$_SESSION["user_id"];
      $query="SELECT users.user_role FROM users WHERE users.user_id=$id";
      if($r = mysqli_query($dbc, $query))
      {
        $row = mysqli_fetch_array($r,MYSQLI_NUM);
        if($row[0]=='admin')
        {
          echo '<section class="section contact" data-section="Section5">
            <div class="container">
              <div class="row" style="color:white;margin-left:30px;"><br><br>
                <br><br>
                </div>
                <div class="col-md-12">

                <!-- Do you need a working HTML contact-form script?

                            Please visit https://templatemo.com/contact page -->

                  <form id="contact" action="index.php" method="post">
                    <div >
                      <div class="col-md-12">
                          <fieldset>
                            <input name="MakeEmail" type="text" class="form-control" id="name" placeholder="Email" required="">
                          </fieldset>
                       </div>
                    </div>
                    <div class="row" style="margin-left:20px">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button" name="role" value="ADMIN">ADMIN</button>
                      </fieldset>
                      <fieldset>
                        <button type="submit" id="form-submit" class="button" name="role" value="MEDIA" style="margin-left:20px">MEDIA</button>
                      </fieldset>
                    </div>
                  </form>
									<br><br><br><br>
                </div>
          </section>';
        }
      }
    }
		////////////////////////////////////////////////////////////////////////////////////////////
     ?>