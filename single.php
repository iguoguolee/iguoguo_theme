


<?php
$post = $wp_query->post;
if ( in_category('1') ) {
	include(TEMPLATEPATH . '/single1.php');
} else if(in_category('92')) {
	include(TEMPLATEPATH . '/single2.php');
} else if(in_category('498')) {
	include(TEMPLATEPATH . '/single4.php');
}
 else if(in_category('536')) {
	include(TEMPLATEPATH . '/single5.php');
}
else{
	include(TEMPLATEPATH . '/single3.php');
}
?>