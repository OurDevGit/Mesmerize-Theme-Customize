<?php
/*
 * Template Name: Front Page Template
 */
global $post;
$post_slug = $post->post_name;
$obj_id = get_queried_object_id();
$current_url = get_permalink( $obj_id );

if(is_user_logged_in()){
	if($post_slug == "log-in" || $post_slug == "register"){
        wp_redirect(get_home_url());
    }
}

mesmerize_get_header('homepage');
?>

    <div id='page-content' class="page-content">
        <div class="<?php mesmerize_page_content_wrapper_class(); ?>">
            <?php
            while (have_posts()) : the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
<style>
 form{
 	 width:50%;
     margin:0 auto;
     text-align: center; 
 }
form .wppb-send-credentials-checkbox{
 	 display: none;
}
form .login-remember{
	display: none;
}
</style>
<?php // get_footer(); ?>