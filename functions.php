<?php
function cp_filter($content) {
	return preg_replace("|<pre(.*?)><code>(.*?)</code></pre>|ise",
		"'<pre$1><code>'.str_replace(array('<', '>'), array('&lt;', '&gt;'), stripslashes(trim('$2'))).'</code></pre>'", $content);
}

add_filter('the_content', 'cp_filter', 0);
add_filter('comment_text', 'cp_filter', 0);

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => '底部小工具栏1',
		'id'   => 'widget-area1',
		'description'   => '这是页面底部的小工具栏',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));

	register_sidebar(array(
		'name' => '底部小工具栏2',
		'id'   => 'widget-area2',
		'description'   => '这是页面底部的小工具栏.',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));

	register_sidebar(array(
		'name' => '底部小工具栏3',
		'id'   => 'widget-area3',
		'description'   => '这是页面底部的小工具栏.',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));

}


function _reiTheme_custom_header_setup() {
	$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => '444',
		'default-image'          => get_stylesheet_directory_uri() . '/img/header.jpg',
        'height'                 => 1600,
        'width'                  => 2000,
        'max-width'              => 2000,

        'flex-height'            => true,
		'flex-width'             => true,
		// Random image rotation off by default.
		'random-default'         => true,

		// Callbacks for styling the header and the admin preview.
		'admin-head-callback'    => '_reiTheme_admin_header_style',
		'admin-preview-callback' => '_reiTheme_admin_header_image',
	);

	add_theme_support( 'custom-header', $args );

}
add_action( 'after_setup_theme', '_reiTheme_custom_header_setup' );


function _reiTheme_admin_header_style(){
?>
<style>
.header-image{
    width:500px;
    height:auto;
}
</style>
<?php
};
function _reiTheme_admin_header_image(){
$header_image = get_header_image();
?>
    <img src="<?php echo esc_url( $header_image ); ?>" class="header-image" alt="" />
<?php
};


// Load jquery
if(!is_admin() ){
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery',get_stylesheet_directory_uri() ."/js/jquery.1.10.1.min.js",false,'1.10.1');
    wp_enqueue_script('onload',get_stylesheet_directory_uri() ."/js/onload.js",array('jquery'),'1',true);
    wp_enqueue_script('prettify',get_stylesheet_directory_uri() ."/js/prettify/prettify.js",false,'1',true);
}