<?php
	header('Content-type:text/json;charset=utf-8');

	$cat = $_GET["cat"]?$_GET["cat"]:0;
	$tag = $_GET['tag']?$_GET['tag']:0;
	$pid  = $_GET['pid']?$_GET['pid']:0;
	$page= $_GET['page']?$_GET['page']:1;
	$post_per_page = 8;
	
	$query_condition = array(
		'paged'     => $page,
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
	
	if($pid)
	{
		$query = query_posts('p='.$pid);	
	}else{
		$query = query_posts($query_condition);	
	}
	
	$return_json = array();	
	
	if(have_posts()){
		while(have_posts()){
			the_post();		
			$post_metas = array(
				"web_url"  => "",
				"web_url2" => "",
				"web_url3" => "",
				"views"    => 0,
				"author"   => ""
			);	
			while (list($key, $val) = each($post_metas))
			{
			  $post_metas[$key] = get_post_meta(get_the_id(), $key, true);
			}
			
			if($pid){
				$tags = get_the_tags();
				$tagsString = '';
				$cat_IDs ='';
				foreach((get_the_category()) as $category) { 
					$cat_IDs .=$category->cat_ID . '|'; //当前文章的分类的ID 
					//echo $category->cat_name . ''; //当前文章的分类的名称 
				} 


				foreach($tags as $tag) {
				   $tagsString = $tagsString . $tag->name . '|'; 
				 }
				$post_content = get_the_content();
				$return_json = array_merge($post_metas,array(
					'content'  => $post_content,
					'id'       => get_the_id(),
					'pic'      => get_content_first_image(false),
					'title'    => get_the_title(),
					'time'     => get_the_time("20y-m-d"),	
					'tags'     => $tagsString,
					'catids'   => $cat_IDs
				));
			}else{
				array_push($return_json,array_merge($post_metas,array(
					'id'       => get_the_id(),
					'pic'      => get_content_first_image(false),
					'title'    => get_the_title(),
					'time'     => get_the_time("20y-m-d"),				
				)));
			}
			
		}
		printf(json_encode($return_json)) ;
		wp_reset_query();
	}	

	die();
?>