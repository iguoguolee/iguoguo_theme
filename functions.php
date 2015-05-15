<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

$content_width = 450;

automatic_feed_links();

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}

function get_content_first_image($content){
	if ( $content === false ) $content = get_the_content(); 

	preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', $content, $images);

	if($images){       
		return $images[1][0];
	}else{
		return false;
	}
}


/*动态分页*/
function ajaxPageLoad()
{
	if(isset($_GET['action'])&& $_GET['action']=='ajaxPageLoad')
	{
		include_once TEMPLATEPATH.'/h5/h5_list.php';
		die();
	}else
	{
		return;
	}
}
add_action('template_redirect','ajaxPageLoad');

function get_webapp_list()
{
	
	if(isset($_GET['action'])&& $_GET['action']=='ajax_webapp')
	{   
		include_once TEMPLATEPATH.'/m/webapp.php';
		die();
	}else
	{
		return;
	}
}
add_action('template_redirect','get_webapp_list');

?>