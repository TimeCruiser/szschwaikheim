<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>

<!-- BEGIN HEADER -->
	<div class="header">
		
		<!-- BEGIN LOGO -->
			<div class="headerimage_left"></div>
		<!-- END LOGO -->
	    
	    <div class="grid_container">
	    	<h1 id="title"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a></h1>
		</div>
		
		<div class="headerimage_right"></div>
	
	</div>
<!-- END HEADER -->

<!-- BEGIN TOPMENU -->      
	<div class="topmenu clearfix">
    	<div class="grid_container">

	        <?php print theme('links__system_main_menu', array(
	          'links' => $main_menu,
	          'attributes' => array(),
	          'heading' => array(
	            'text' => t('Main menu'),
	            'level' => 'h2',
	            'class' => array('element-invisible'),
	          ),
	        )); ?>
	
	        <?php print render($page['navigation']); ?>

    	</div>
	</div>
<!-- END TOPMENU -->

<!-- BEGIN BODY -->
	<div class="grid_container body clearfix">

		<!-- BEGIN LEFT SIDEBAR -->
			<div class="grid_left sidebar">
				<?php print render($page['sidebar_first']); ?>
			</div>
		<!-- END LEFT SIDEBAR -->
		
		<!--[if lte ie 6]> 
			<div class="grid_13">
				<div class="messages warning">
					<h2 class="element-invisible">Warnung</h2>
					Sie verwenden eine veraltete Version des Internet Explorer. Manche Elemente dieser Webseite werden
					in diesem Browser nicht korrekt angezeigt. Wir empfehlen Ihnen, auf einen aktuellen Browser umzusteigen.
				</div>
			</div>
		<![endif]-->
		
		<noscript>
			<div class="grid_13">
				<div class="messages warning">
					<h2 class="element-invisible">Warnung</h2>
					Um die korrekte Darstellung dieser Webseite zu ermöglichen, aktivieren Sie bitte JavaScript.
				</div>
			</div>
		</noscript>
	
	    <div class="grid_13">
	    	
	    	<!-- BEGIN HIGHLIGHTED -->
		    	<?php if ($page['highlighted'] or $page['help']): ?>
			    	<div class="highlighted main-content transparent-container">
			      		<?php print render($page['highlighted']); ?>
			      		<?php print render($page['help']); ?>
			      	</div>
			    <?php endif; ?>
			<!-- END HIGHLIGHTED -->
			
			<!-- BEGIN CONTENT -->
		    	<div id="content" class="main-content transparent-container">
		    		<a id="main-content"></a> <!-- WTF? -->
	      			<?php print render($title_prefix); ?>
	      			<?php if ($title): ?>
	        			<h2 class="title" id="page-title"><?php print $title; ?></h2>
	      			<?php endif; ?>
	      			<?php print render($title_suffix); ?>
	      			<?php print $messages; ?>
	      			<?php if ($tabs = render($tabs)): ?>
	        			<div class="tabs"><?php print $tabs; ?></div>
	      			<?php endif; ?>
	      			<?php if ($action_links): ?>
	        			<ul class="action-links"><?php print render($action_links); ?></ul>
	      			<?php endif; ?>
	      			
	      			<?php print render($page['content']); ?>
	      			
	      			<?php print $feed_icons; ?>
	    		</div>
	    	<!-- END CONTENT -->
	    
	    </div>
	    
	    <div class="grid_full footer">
	    	<div class="inner">
	    		<?php print render($page['footer']); ?>
	    	</div>
	    </div>

  	</div>

  	

<?php print render($page['bottom']); ?>
