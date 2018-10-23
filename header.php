<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head() ?>
</head>
<body <?php body_class() ?>>
	<div id="page">
		<header id="header" class="wp-header">
			<div class="container">
					<div class="logo">
				<div class="main-site">
					<?php the_custom_logo(); ?>
				</div>
			</div>	
			<nav class="navbar nav-menu" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<?php thpt_tranphu_menu('primary-menu') ?><!-- /.navbar-collapse -->
			</nav>	
			<div class="border-nav"></div>
			</div>

		</header><!-- /header -->