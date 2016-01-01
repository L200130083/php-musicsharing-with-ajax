<?php auto_login() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html lang="en">
<head>
<!--
PEWD MUSIC ENGINE;
POWERED BY Bootstrap, JQuery, JPlayer;
@<?=date('Y')?>;
Students Of Universitas Muhammadiyah 1 Surakarta;
this application need improvement;
-->
  <link rel="icon" 
      type="image/png" 
      href="<?=$config['base_url']?>assets/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title> <?=$title?> </title>
  <script>
  //js configs
  var mscbaseurl = "<?=$config['base_url'];?>";
  var mscsitetitle = "<?=$config['site_title'];?>";
  </script>
  <link href="<?=$config['base_url']?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  
  <link href="<?=$config['base_url']?>assets/css/progress_bar.css" rel="stylesheet" type="text/css" />
  <link href="<?=$config['base_url']?>assets/css/my.css" rel="stylesheet" type="text/css" />   
  <link href="<?=$config['base_url']?>assets/css/musicbar.css" rel="stylesheet" type="text/css" />  
  <script src="<?=$config['base_url']?>assets/js/jquery.js"></script>
  <script type="text/javascript" src="<?=$config['base_url']?>assets/js/jp.js"></script>
  <script type="text/javascript" src="<?=$config['base_url']?>assets/js/my.js"></script>
  <script type="text/javascript" src="<?=$config['base_url']?>assets/js/pushstate.js"></script>
<style>
table tbody tr:nth-child(odd) {
	background: #fafafa;
}
table tbody tr:nth-child(even) {}
button .track 
{
	outline:none;
}
</style>

</head>
<body>
         <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand ajax" href="<?=$config['base_url']?>" title="Home"><?=$config['site_title']?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                  <li><a href="<?=$config['base_url']?>" class="ajax" title="Home">Home</a></li>
				  <li><a href="<?=$config['base_url']?>about" class="ajax" title="About">About</a></li>
				  <li><a href="<?=$config['base_url']?>support" class="ajax" title="Contact">Contact</a></li>
               </ul>
			   <form action="<?=$config['base_url']?>search" method="GET"  class="navbar-form navbar-left" role="search" >
					 <div class="form-group">
						<input type="text" name="s" class="form-control" value="<?=isset($_GET['s']) ? $_GET['s'] : NULL;?>"placeholder="Search">
					  </div>
					  <button type="submit" class="btn btn-default">Search</button>
				</form>
               <ul class="nav navbar-nav navbar-right">
                     <?php if (!is_logged()) : ?>
					 <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
                     <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form" role="form" method="post" action="<?=$config['base_url']?>login.php" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                       <label class="sr-only" for="username"></label>
                                       <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="password">Password</label>
                                       <input type="password" class="form-control" id="passowrd" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" name="submit" class="btn btn-success btn-block">Sign In</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </li>
                     </ul>
					 
                  </li>
				  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign Up <b class="caret"></b></a>
                     <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form" role="form" method="post" action="<?=$config['base_url']?>register" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                       <label class="sr-only" for="username"></label>
                                       <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="email">Email</label>
                                       <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="password">Password</label>
                                       <input type="password" class="form-control" id="passowrd" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" name="submit" class="btn btn-success btn-block">Sign Up</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </li>
                     </ul>
					 
                  </li>
				  <?php else : ?>
          <?php if (is_admin()) : ?>
            <li><a href="<?=$config['base_url']?>settings" class="ajax" title="Settings">Settings</a></li>
            <li><a href="<?=$config['base_url']?>dashboard" class="ajax" title="Dashboard">Admin</a></li>
          <?php else : ?>
				    <li><a href="<?=$config['base_url']?>dashboard" class="ajax" title="Dashboard">User Dashboard</a></li>
          <?php endif ?>
				  <li><a href="<?=$config['base_url']?>logout">Logout</a></li>
				  <?php endif ?>
				  
                                </ul>
            </div>
            <!-- /.navbar-collapse -->
          </div>
         </nav>
<nav class="navbar navbar-default navbar-fixed-bottom" style="margin-bottom: 0px; background: none ! important; box-shadow: none ! important;">
  <div class="container player">

<div id="jquery_jplayer"></div>

		<!-- Using the cssSelectorAncestor option with the default cssSelector class names to enable control association of standard functions using built in features -->

		<div id="jp_container" class="demo-container">
				
				<div class="alert alert-player" role="alert" style="margin-bottom: 0px; border-radius: 0px;">
          
        <div id="bars" style="display:none">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
     
				<a class="jp-play" href="#"><button type="button" class="btn btn-default ctr" title="Play"><i class="glyphicon glyphicon-play"></i></button></a>
				<a class="jp-pause" href="#"><button type="button" class="btn btn-default ctr" title="Pause"><i class="glyphicon glyphicon-pause"></i></button></a>
				<a class="jp-stop" href="#"><button type="button" class="btn btn-default ctr" title="Stop"><i class="glyphicon glyphicon-stop"></i></button></a>
				<a class="jp-mute" href="#"><button type="button" class="btn btn-default ctr" title="Mute" ><i class="glyphicon glyphicon-volume-off"></i></button></a>
				<a class="jp-unmute" href="#"><button type="button" class="btn btn-default ctr" title="Unmute"><i class="glyphicon glyphicon-volume-up"></i></button></a>
				
				
<!-- <progress class='progress-it' max='100' value='0' style="margin-bottom: -2px;"></progress> -->
				
			
				<span class="track-name">Undefined Track</span>
				at <span class="extra-play-info">0%</span>
				of <span class="jp-duration"></span>, which is
				<span class="jp-current-time"></span>
				
				<div class="jp-progress" style="margin-bottom: -11px; padding-top: 5px;">
				<div class="jp-seek-bar">
					<div class="jp-play-bar" id="pbaranim" style="width: 0%; background-color: rgba(255,255,255,.15); height: 15px; border-radius: 2px;"></div>
				</div>
        
				</div>
				</div>
				
 </div>

  </div>
</nav>

<div class="container inbody">
<?php if (isset($_GET['msg'])) : ?>
<div id="msg" class="alert alert-warning" role="alert"><center><?php echo htmlentities(strtoupper(str_ireplace('_',' ',$_GET['msg']))) ?>!!</center></div>
<?php endif ?>

<div id='loadingDiv' style="display:none">
	<center>
    <img src='./assets/ajax-loader.gif' />
	</center>
</div> 

<div id="loader">