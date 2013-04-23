<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" type="text/css" media="screen" title="no title" charset="utf-8">
	
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap-responsive.min.css" type="text/css" media="screen" title="no title" charset="utf-8">

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fancybox/jquery.fancybox.css" type="text/css" media="screen" title="no title" charset="utf-8">
	
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
	
</head>

<body>
<img id="corner" src="<?php bloginfo('template_url'); ?>/img/corner.png" alt="fette najs!"/>

<div class="container">

	<div id="header" class="row">
		<div class="span12">
			<a href="/"><img id="logo" src="<?php bloginfo('template_url'); ?>/img/logo.png"></a>
		</div>
	</div>
	
	<div id="menu" class="row">
		<div class="span2"></div>
		<div class="span8" id="menu">
			<br/><br/>
			<hr/>
			<div class="row">
				<div class="span2"></div>
				<div class="span4">
					<ul id="menuList">

  						<?php 
  							$args = array(
								'depth'        => 1,
								'title_li'     => __('')
							);

  							wp_list_pages($args); 
  						?>

				    </ul>
				</div>
				<div class="span2"></div>
			</div>
			<hr/>
		</div>
		<div class="span2"></div>
	</div>