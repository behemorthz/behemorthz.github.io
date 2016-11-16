<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Three Minutes Thesis: Innovation Challenges</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		      <link rel="stylesheet" href="../css/form-elements.css">
        <link rel="stylesheet" href="../css/style.css">


                <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>

        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/i18n/defaults-*.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

		<!-- Top menu -->
		<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="../">Three Minutes Thesis: Innovation Challenges</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<span class="li-text">
								For more information:
							</span>
							<span class="li-social">
								<a href="https://www.facebook.com/EGSACU" target="_blank"><i class="fa fa-facebook"></i></a>
								<a href="https://line.me/R/ti/p/%40egsacu" target="_blank"><i class="fa fa-comments-o"></i></a>
							</span>
						</li>
					</ul>
				</div>
			</div>
		</nav>

        <!-- Top content -->
        <div class="top-content">
            <div class="container">

                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1><strong>3MT®: Innovation Challenges</strong> online audition</h1>
                        <div class="description">

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                    	<form role="form" action="" method="post" class="f1">

                    		<h3>Register Complete</h3>
                    		<p>Thank you, for joining Three Minutes Thesis®: Innovation Challenges online audition round</p>
                            <p>Don't forget to download submission form and sign your name and your advisor name. And sent it back with authorized signature to <a href="mailto:threeminutethesis.cu@gmail.com">threeminutethesis.cu@gmail.com</a></p>
                            <p><span id="textCountDownload"></span></p>
                            
                        </form>
                    </div>

                </div>
            </div>


        <!-- Javascript -->
        <script src="../vendor/jquery/jquery.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="../vendor/jquery/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <?php 
            if(!isset($_GET) || !array_key_exists('id',$_GET)){
                $_GET['id'] = -1;
            }
        ?>
        <script type="text/javascript">
            $( document ).ready(function() {
                window.history.forward(-2);
                var n = 4000;
                setTimeout(countDown,1000);

                function countDown(){ 
                    n = n-1000;
                    if(n > 0){
                        $('#textCountDownload').text("download in "+n/1000+" seconds");
                        setTimeout(countDown,1000);
                    }
                    else {
                    $('#textCountDownload').html('If you can\'t download submission form please '+'<a href="#" id="download">Click Here!</a>');
                        window.open('../controller/genPDF/genPdf.php?id='+"<?php echo $_GET['id'] ?>","_blank");
                    }
                }
                
                $(document).on('click','#download',function(){
                    window.open('../controller/genPDF/genPdf.php?id='+"<?php echo $_GET['id'] ?>","_blank");
                });
            });
        </script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
