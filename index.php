<!DOCTYPE html>
<html>
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script>
    $(function() {
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
 
      
      <a class="brand">Instaboook!</a>
 
      
      <div class="nav-collapse">
 
        <ul class="nav pull-right">
          <li><a href="#">Sign Up</a></li>
          <li class="divider-vertical"></li>
          <li class="drop down">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
              <form action="[YOUR ACTION]" method="post" accept-charset="UTF-8">
  <input id="user_username" style="margin-bottom: 15px;" placeholder="Username" required type="text" name="user[username]" size="30" />
  <input id="user_password" style="margin-bottom: 15px;" placeholder="Password" required type="password" name="user[password]" size="30" />
  
    <input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
</form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
        <div id="showcase">
            <div class="container">
                <div class="row-fluid">
                    <div class="span12">
                        <ul class="thumbnails">
                            <li class="span3 pull-left">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/200x250" alt="">
                                    <div class="sgap"></div>
                                                          </div>
                            </li>
                            <li class="span3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/200x250" alt="">
                                    <div class="sgap"></div>
                                                                   </div>
                            </li>
                            <li class="span3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/200x250" alt="">
                                    <div class="sgap"></div>
                                   
                                </div>
                            </li>
                              <li class="span3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/200x250" alt="">
                                    <div class="sgap"></div>
                                   
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
         

        </div>
    </body>
</html>
