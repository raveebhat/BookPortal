<!DOCTYPE html>
<html>
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Instabook</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
      
        <script>
    $(function() {
        
    $('.example').popover({
                   
                });
  // Setup drop down menu
  $('.dropdown-toggle').dropdown();
 
  // Fix input element click problem
  $('.dropdown-menu').find('form').click(function (e) {
    e.stopPropagation();
  });
});   

    </script>
    <style>
        #showcase{
            padding-top: 80px;
        }
        img{
            width: 180px;
            height: 250px;
        }
        .welcome{
            padding-top: 15px;
        }
        .bTitle{
            color:#0099FF;
        }
        .bAuthor{
            color:lightgray;
        }
    </style>
    </head>
    
    <body>
     
           <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"><!-- Collapsable nav bar -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
 
      
      <a class="brand">Instabook!</a>
 
      <?  
          session_start();
          //var_dump($_SESSION);
      ?>
      <div class="nav-collapse">
 
        <ul class="nav pull-right">
            <li>
                <?if(isset($_SESSION['auth'])){?>
                <p class="welcome">Welcome<strong> <?echo $_SESSION['uname'];?></strong></p>
                <?}
                else{
                ?>
<<<<<<< HEAD
                <a href="./signup.html">Sign Up</a>
=======
                <a href="signup.html">Sign Up</a>
>>>>>>> d61abbde4fbfab11c632178d71e286843730e9f0
                <?}?>
            </li>
          <li class="divider-vertical"></li>
          <li class="drop down">
              <? if(isset($_SESSION['auth'])){?>
              <a href="signout.php">Sign out</a>
              <?}
              else {?>
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
              <form action="login.php" method="post" accept-charset="UTF-8">
  <input id="uname" style="margin-bottom: 15px;" placeholder="Username" required type="text" name="email" size="30" />
  <input id="upass" style="margin-bottom: 15px;" placeholder="Password" required type="password" name="pass" size="30" />
  
    <input class="btn btn-success" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
</form>
            </div>
            <? } ?>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
        
        <?
        require_once './sdk.class.php';
        $s3 = new AmazonS3();
        $bucket = 'book-bucket-' . strtolower($s3->key);
        $fileList=$s3->get_object_list($bucket);
        
                  
  ?>
        <div id="showcase">
            
            <div class="container fluid-grid">
                <?if(!isset($_SESSION['auth'])&&isset($_SESSION['msg'])){?>
                <div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Error!</strong>
  <? echo$_SESSION['msg'];?>
</div>
                <?
                session_destroy();
                }?>
                <div class="span11">
                   <? 
                   $i=0;
                   foreach ($fileList as $file) {
                     $meta=$s3->get_object_metadata($bucket, $file);
                    
                         if($i%5==0){   
                         ?>
                    <div class="span12">
                        <ul class="thumbnails">
                            <?}?>
                            <li>
                                <div class="thumbnail">
                                    <? 
                                    $url=$s3->get_object_url($bucket, $file,'15 minutes');
                                    if (isset($_SESSION['auth'])){
                                        
                                        ?>
                                    <a href="<?echo $url;?>" target="_blank" title="" >
                                    <img src="http://docs.google.com/viewer?url=<?echo $url;?>&a=bi&pagenumber=1&w=180&h=250" alt="" /> 
                                    </a>
                                    <?}
                                    else{
                                    ?>
                                    <a rel="popover" href="#" title="" data-title="<? echo $meta['Headers']['x-amz-meta-title'];?>" data-content='<p>Sign in to view/download the book</p>' data-placement="right" data-trigger="hover" class="example"> 
                                    <img src="http://docs.google.com/viewer?url=<?echo $url;?>&a=bi&pagenumber=1&w=180&h=250" alt="" /> 
                                    </a>
                                    <?}?>
                                </div>
                                <div class="bTitle"><? echo $meta['Headers']['x-amz-meta-title'];?></div>
<!--                                <div class="bAuthor">Author name</div>-->
                                <?$i++;?>
                            </li>
                            <? if($i>0&&($i%5==0||$i==count($fileList))){?>
                        </ul>
                    </div>
                          <?}}?>
                </div>
               
            </div>
         

        </div>
    </body>
</html>
