<!DOCTYPE html>
<html lang="<?php
echo get_html_lang();
?>">
<head>
	<meta charset="utf-8">
  <?php
if ($description = option('description')):
?>
  <meta name="description" content="<?php
    echo $description;
?>" />
  <?php
endif;
?>

  <title><?php
echo option('site_title');
echo isset($title) ? ' | ' . strip_formatting($title) : '';
?></title>

  <?php
echo auto_discovery_link_tags();
?>


  <!-- Plugin Stuff -->

  <?php
fire_plugin_hook('public_head', array(
    'view' => $this
));
?>

  <!-- Stylesheets -->

  <?php
queue_css_url('http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic');
queue_css_file('foundation');
queue_css_file('app');
echo head_css();
?>

  <!-- JavaScripts -->
  <?php
queue_js_file('app');
?>
  <?php
queue_js_file('vendor/foundation');
?>
  <?php
queue_js_file('vendor/jquery');
?>





  <?php
echo head_js();
?>




</head>

<?php
echo body_tag(array(
    'id' => @$bodyid,
    'class' => @$bodyclass
));
?>
    <?php
fire_plugin_hook('public_body', array(
    'view' => $this
));
?>

<header>
		  <?php
fire_plugin_hook('public_header');
?>
		</header>
<div class="row">
			<div class="large-12 medium-12 columns tinted-image">
				<h1 id="site-title"><?php
echo link_to_home_page(theme_logo());
?></h1>
			</div>
		</div>
		<div class="row">
			<div class="large-12 medium-12 columns" id="ap_trail_navigation">
				<div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle="example-menu"></button>
  <div class="title-bar-title">Menu</div>
</div>
		<div id="top-bar-border">
		<div class="top-bar" id="example-menu">


				<div id="responsive-menu">
					<div class="top-bar-left">

								        <!-- Left Nav Section -->


				        <?php
echo public_nav_main()->setUlClass('menu data-dropdown-menu vertical medium-horizontal');
?>





</div>

<div class="top-bar-right">
			<ul class="menu">
			 <li><?php
//echo link_to_item_search('More Search Options');
?></li>

		  <li><?php
//echo search_form(array(
    //'show_advanced' => false
//));
?></li>

</ul>
 </div>
 </div>
 </div>
 </div>
</div>
 </div>
	<div class="row" id="main-body">

		<div class="large-12 small-12 columns" id="primary">
