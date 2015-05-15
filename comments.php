<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('请不要直接加载此页面 谢谢合作!');
	
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('此页面为加密页面，请输入密码查看。', 'kubrick'); ?></p> 
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

	<?php if ( have_comments() ) : ?>
		<div id="commentList">
			<h4 id="comments">文章评论</h4>

			<ol class="commentlist">
			<?php wp_list_comments();?>
			</ol>
		 <?php else : // this is displayed if there are no comments so far ?>

			<?php if ( comments_open() ) : ?>

			 <?php else : // comments are closed ?>
				<p class="nocomments"><?php _e('评论已关闭。', 'kubrick'); ?></p>

			<?php endif; ?>
		</div>
	<?php endif; ?>



<?php if ( comments_open() ) : ?>

<div id="respond">

<h4><?php comment_form_title( __('评论一下', 'kubrick'), __('评论一下 %s' , 'kubrick') ); ?></h4>

<div id="cancel-comment-reply"> 
	<small><?php cancel_comment_reply_link() ?></small>
</div> 

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf(__('你需要先 <a href="%s">登录</a> 才能评论.', 'kubrick'), wp_login_url( get_permalink() )); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p><?php printf(__('<a href="%1$s">%2$s</a>已登录 .', 'kubrick'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('退出该账户', 'kubrick'); ?>"><?php _e('退出&raquo;', 'kubrick'); ?></a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small><?php _e('称呼', 'kubrick'); ?> <?php if ($req) _e("(必填)", "kubrick"); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small><?php _e('Mail (不会被公布)', 'kubrick'); ?> <?php if ($req) _e("(必填)", "kubrick"); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo  esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('网址', 'kubrick'); ?></small></label></p>

<?php endif; ?>

<!--<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>', 'kubrick'), allowed_tags()); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>


<?php comment_id_fields(); ?> 
</p>
<?php do_action('comment_form', $post->ID); ?>
<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('提交评论', 'kubrick'); ?>" />
</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
