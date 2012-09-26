<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Book Portal</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-popover.js"></script>
        <script>
            $(function() {
                //enable popovers
//                $('.example').popover({
//                    placement: 'bottom',
//                    delay: { show: 100, hide:1000 }
//                    
//                });
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
                    <a class="brand">Instabook!</a>
                </div>
            </div>
        </div>
        <div id="showcase">
        <div class="container">
            <div class="row-fluid">
                <div class="span12">
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span3">
                                <? session_start();?>
                                <h2><? echo $_SESSION['uname'];?></h2>
                                <p><strong>Upload A New Book</strong></p>
                                <form class="form-horizontal pull-left" method="POST" action="uploader.php" enctype="multipart/form-data">
                                    <div class="control-group">
                                        <input type="text" id="title" name="title" placeholder="Title">
                                    </div>
                                    <div class="control-group">
                                        <input type="file" id="uploadedfile" name="uploadedfile" >
                                    </div>
                                    <div class="control-group">
                                        <button type="submit" class="btn btn-success">Upload File</button>
                                    </div>
                                </form><!--<buttonclass="btn btn-success btn-block"type="button">UploadNewFile</button>-->
                            </div>
                            <div class="span6">
                                <legend><h5>Uploaded Books</h5></legend>
                                    <a rel="popover" href="#" title="" data-title="HTML5" data-content='<button class="btn btn-danger">Delete</button>' data-placement="right" data-trigger="click" class="example"> 
                                    <img src="http://docs.google.com/viewer?url=http://book-bucket-akiaifjiycmokm2ufdaa.s3.amazonaws.com/Introducing%20HTML5%20book.pdf?AWSAccessKeyId=AKIAIFJIYCMOKM2UFDAA&Expires=1348586946&Signature=QmRiCSrBTsMiyDqj4qVuW5k3o3E%3D&a=bi&pagenumber=1&w=200" alt="" /> </a>
                                    
                            </div>
                            <div class="span3">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>    
    </body>
</html>
