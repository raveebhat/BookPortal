<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Book Portal/admin</title>
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
                //tabbable admin page
                $('#mytab a').click(function (e) {
                    e.preventDefault();
                    $(this).tab('show');
                })
            });
        </script>
        <style>
            #showcase{
                padding-top: 80px;
            }.welcome{
            padding-top: 15px;
        }

        </style>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container"><!-- Collapsable nav bar -->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <a class="brand" href="./index.php">Instabook!</a>
                    <div class="nav-collapse">

        <ul class="nav pull-right">
            <li>
                <?
                session_start();

                if(isset($_SESSION['auth'])){?>
                <p class="welcome">Welcome<strong> <?echo $_SESSION['uname'];?></strong></p>
                <?}
                else{
                ?>

                <a href="signup.html">Sign Up</a>

                <?}?>
            </li>
<!--          <li class="divider-vertical"></li>-->
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
        <div id="showcase">
        <div class="container">
             <?if(isset($_SESSION['auth'])&&isset($_SESSION['ucmsg'])){?>
                <div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>

  <? echo$_SESSION['ucmsg'];?>
</div>
                <?
                session_destroy();
                }?>
            <div class="page-header">
           <legend><h1>Dashboard</h1></legend>
          </div>
            <div class="row-fluid">
                <div class="span12">
                    <ul class="nav nav-pills tabbable" id="mytab">
                        <li class="active"><a href="#userTable" data-toggle="tab"><strong>Users</strong></a></li>
                        <li ><a href="#booksTable" data-toggle="tab"><strong>Books</strong></a></li>
                    </ul>
                    <?
                    require_once './sdk.class.php';
                    $domain = 'authors';
$sdb = new AmazonSDB();
$query = "SELECT name,type FROM `{$domain}`";
$results = $sdb->select($query);
                    ?>
                    <div class="tab-content">
                        <div class="pull-right">
                        <a href="add_user.html" class="btn btn-success">Add User</a>
                        <p></p>
                        </div>
                        <div class="tab-pane active" id="userTable">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th><strong>Name</strong></th>
                                    <th><strong>User Type</strong></th>
                                    <th><strong>Email ID</strong></th>
<!--                                    <th><strong>User since</strong></th>
                                    <th><strong>No. of Published Books</strong></th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?foreach($results->body->Item() as $result) {?>
                                    <tr>
                                        <td><?echo($result->Attribute[0]->Value."&nbsp;");?></td>
                                        <td><?echo($result->Attribute[1]->Value=="1"?"Author":"Reader");?></td>
                                        <td><? echo $result->Name?></td>
                                    </tr>
                                    <?}?>
                                </tbody>
                            </table>
                        </div>
                        <?
                        $domain = 'books-aalr';
                        $sdb = new AmazonSDB();
                        $query = "SELECT * FROM `{$domain}`";
                        $results = $sdb->select($query);
                                                ?>
                        <div class="tab-pane" id="booksTable">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th><strong>Name</strong></th>
                                    <th><strong>Author</strong></th>
                                    <th><strong>Publisher</strong></th>
                                    <th><strong>ISBN</strong></th>
                                    <th><strong>Published Year</strong></th>
                                    <th><strong>Edition</strong></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
