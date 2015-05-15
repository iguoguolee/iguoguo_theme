<?php
	header('Content-type:text/json');
	$cat = $_GET["cat"]?$_GET["cat"]:0;
	$tag = $_GET['tag']?$_GET['tag']:0;
	$id  = $_GET['id']?$_GET['id']:0;
	$page= $_GET['page']?$_GET['page']:1;
	$post_per_page = 12;
	$post_metas = array(
				"web_url"  => "",
				"web_url2" => "",
				"web_url3" => "",
				"views"    => 0,
				"author"   => ""
	);
	
	$query_condition = array(
		'paged'     => $paged,
		'showposts' => $post_per_page,
		'order'     => 'DESC'
	);
		
	if($cat)
	{
		$query_condition = array_merge($query_condition,array(
			'category__and' => array($cat)
		));
	}
	
	if($tag)
	{
		$query_condition = array_merge($query_condition,array(
			'tag' => $tag
		));
	}
	
	if($id)
	{
		$query_condition = array(
			'id' => $id
		);
	}
	
	$query = query_posts($query_condition);	
	$return_json = array();	
	
	if(have_posts()){
		while(have_posts()){
			the_post();			
			while (list($key, $val) = each($post_metas))
			{
			  $post_metas[$key] = get_post_meta($post->ID, $key, true);
			}
			if($id){
				$return_json = array_merge($return_json,array(
					'content'  => get_content(),
					'id'       => the_id(),
					'pic'      => get_content_first_image(false),
					'title'    => the_title(),
					'time'     => the_time("20y-m-d"),	
				));
			}else{
				array_push($return_json,array_merge($post_metas,array(
					'id'       => the_id(),
					'pic'      => get_content_first_image(false),
					'title'    => the_title(),
					'time'     => the_time("20y-m-d"),				
				)));
			}
		echo json_encode($return_json);
	}	
?>