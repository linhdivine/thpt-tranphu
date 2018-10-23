<?php 

		/*
		*khai báo các giá trị đường dẫn
		* theme_url : lấy đường dẫn tuyệt đốiđến thư mục theme 
		* core_url: lấy đường dẫn tuyệt đối đến thư mục core
	
		*/
		  define('THEME_PATH', get_template_directory_uri());
			define('THEME_URI',get_template_directory());
			define('CORE_URI', THEME_URI. "/core");
			//require_once(CORE_URI."/init.php");

		// thiết lập chiều rộng cho nội dung
		
		if (!isset($content_width)) {$content_width= 660;}

	// khai báo chức năng của theme
	

	if (!function_exists('tranphu_setup')) {function thpt_tranphu_setup(){
				// load textdomain 
				
				load_theme_textdomain('thienlinh');
				// add default post and comments rss feed link for head
				add_theme_support('automatic-feed-link');
				add_theme_support('post-thumbnails');
				// post format
		
				add_theme_support('post-formats', array('aside',
							'image',
							'video',
							'quote',
							'link',
							'gallery',
							'audio',
						)
					);
					// thêm chức năng custom logo
					
					add_theme_support('custom-logo',array('width'=>1920,
						'height' =>357,
						'flex-width'=>true
					));
				// thêm title tag
				add_theme_support('title-tag');

				// thêm custom background
						$default_background = array('default-color'          => '','default-image'=> '','default-repeat'=> 'repeat',
						'default-position-x'     => 'center',
					        'default-position-y'     => 'top',
					        'default-size'           => 'auto',
						'default-attachment'     => 'scroll',
						'wp-head-callback'       => '_custom_background_cb',
						'admin-head-callback'    => '','admin-preview-callback'=> ''	);
				add_theme_support('custom-background',$default_background);
				// thêm customize
			
				
				add_theme_support('customize-selective-refresh-widgets');

				// thêm menu
				register_nav_menu('primary-menu', __('primary menu', 'thienlinh'));

				
					 // tạo sidebar
					 	$sidebarfirst =array('name' => __('Sidebar first', 'thienlinh'),
					 		'id' => 'sidebar-first',
					 		'description' => __('default sidebar', 'thienlinh'),
					 		'class' => 'sidebar-left',
					 		'before_title' => '<h3 class="widget-title">',
					 		'after_title' => '</h3>'
					 	);
					 	register_sidebar($sidebarfirst);


					 	$sidebarsecond = array('name' => __('Sidebar second', 'thienlinh'),
					 		'id' => 'Sidebar-second',
					 		'description' => __('default sidebar', 'thienlinh'),
					 		'class' => 'sidebar-right',
					 		'before_title' => '<h3 class="widget-title">',
					 		'after_title' => '</h3>'
					 	);
					 	register_sidebar($sidebarsecond);


					 	$sidebargallery = array('name' => __('sidebar gallery', 'thienlinh'),
					 		'id' => 'sidebar-gallery',
					 		'description' => __('gallery sidebar', 'thienlinh'),
					 		'class' => 'sidebar-gallery',
					 		'before_title' => '<h3 class="widget-title">',
					 		'after_title' => '</h3>'
					 	);
					 	register_sidebar($sidebargallery);



					 		$siderbar_content = array('name' => __('sidebar content', 'thienlinh'),
					 		'id' => 'sidebar-content-123',
					 		'description' => __('content sidebar', 'thienlinh'),
					 		'class' => 'widget-content',
					 		'before_title' => '<h3 class="widget-title">',
					 		'after_title' => '</h3>'
					 	);
					 	register_sidebar($siderbar_content);

					 		$siderbar_content1 = array('name' => __('sidebar content 1', 'thienlinh'),
					 		'id' => 'sidebar-content-234',
					 		'description' => __('content for sidebar', 'thienlinh'),
					 		'class' => 'widget-content',
					 		'before_title' => '<h3 class="widget-title">',
					 		'after_title' => '</h3>'
					 	);
					 	register_sidebar($siderbar_content1);

					 		$siderbar_content2 = array('name' => __('sidebar content 2', 'thienlinh'),
					 		'id' => 'sidebar-content-345',
					 		'description' => __('content for sidebar', 'thienlinh'),
					 		'class' => 'widget-content',
					 		'before_title' => '<h3 class="widget-title">',
					 		'after_title' => '</h3>'
					 	);
					 	register_sidebar($siderbar_content2);

		}
			add_action('init','thpt_tranphu_setup');
	}

		if (!function_exists('thpt_tranphu_menu')) {function thpt_tranphu_menu($menu){$menu = array('theme_location'=>$menu,
						'container' => 'div',
						'container_class' =>'collapse navbar-collapse',
						'container_id' =>'main-menu',
						'menu_class'=>'nav navbar-nav'
					);
					wp_nav_menu($menu);
			}
		}


	// nhúng style css
		function add_thpt_tranphu_scripts() {wp_enqueue_style('normalize', THEME_PATH.'/css/normalize.css','all');
			wp_enqueue_style('awesome', THEME_PATH. '/css/font-awesome-4.7.0/css/font-awesome.min.css', 'all');
		  wp_enqueue_style('bootstrap-style', THEME_PATH.'/css/bootstrap.min.css', 'all');
		  wp_enqueue_style('w3-style', 'https://www.w3schools.com/w3css/4/w3.css', 'all');
		  wp_enqueue_style('main-style', THEME_PATH.'/style.css', 'all');
		  wp_enqueue_style('media-style', THEME_PATH.'/css/media.css', 'all');
		  wp_enqueue_script('jquery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',array(),1.1, true);
		  wp_enqueue_script('bootstrap-js', THEME_PATH.'/js/bootstrap.min.js', array (), 1.1, true);
		 wp_enqueue_script('main-js', THEME_PATH. '/js/main.js', array ('jquery'), 1.1, true);
		 
		    if (is_singular() && comments_open() && get_option('thread_comments')) {wp_enqueue_script('comment-reply');}
		}
		add_action('wp_enqueue_scripts', 'add_thpt_tranphu_scripts');

// hiển thị thumbnail của post
	 if (!function_exists('thpt_tranphu_entry_image')) {function thpt_tranphu_entry_image($size){if (!is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image') ) {if (the_post_thumbnail()) {echo"<figure>";
					the_post_thumbnail($size);
			echo"</figure>";
					}												
				}
	 		}
	 }

	 // hiển thị tiêu đề post 

	if (!function_exists('thpt_tranphu_entry_header')){function thpt_tranphu_entry_header(){if (is_single()) : ?>
					<h1><a href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_title(); ?></a> </h1>
				<?php
					else : ?>
					<h2><a href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_title(); ?></a> </h2>	
			<?php endif;}	
	}

	// lấy thông tin của post
	if (!function_exists('thpt_tranphu_entry_meta')) {function thpt_tranphu_entry_meta(){if (!is_page()) :?>
						<div class="endtry-meta">
							<?php 
							//	printf(__('<span><i class="fa fa-user"aria-hidden="true"></i>  posted by %1$s</span> ','thienlinh'),the_author());
								printf(__('Ngày  %1$s </span> ','thienlinh'),get_the_date());
							//	printf(__(' in %1$s</span>', 'thienlinh' ),get_the_category_list());

							 ?>
						</div>
			<?php	endif;}  
	}


	// lấy nội dung của một post
	

	if (!function_exists('thpt_tranphu_entry_content')) {function thpt_tranphu_entry_content(){if (!is_single() && !is_page()) {the_excerpt();
			}
			else{the_content();

					// phân trang một post
					$link_page = array('before' => __('<p> pages:','thienlinh'),'after'=> '</p>', 
						'nextpagelink' => __('next','thienlinh'), 
						'previouspagelink' => __('previous','thienlinh')
					);
					wp_link_pages($link_page);
			}
		}
	}
	function thpt_tranphu_readmore(){return'<a class="readmore"href="'.get_permalink(get_the_ID()).'">'.__('...đọc tiếp>','thienlinh').'</a>';
				}
				add_filter('excerpt_more','thpt_tranphu_readmore');


	//hiển thị tag
				
				if (!function_exists('thpt_tranphu_entry_tag')) {function thpt_tranphu_entry_tag(){if (has_tag()) {echo'<div class="entry_tag">';
								printf(__('taged in %1$s','thienlinh'), get_the_tag_list(',',','));
							echo '</div>';
						}
					}	
				}

// lấy ra silde ảnh

if (!function_exists('thpt_tranphu_get_slider')) {function thpt_tranphu_get_slider() { ?>
	<div class="w3-content"">
  <img class="mySlides"src="<?php echo THEME_PATH.'/img'?>/image-09.jpg"style="width:100%">
  <img class="mySlides"src="<?php echo THEME_PATH.'/img'?>/image-10.jpg"style="width:100%">
  <img class="mySlides"src="<?php echo THEME_PATH.'/img'?>/image-11.jpg"style="width:100%">
		<button class="w3-button w3-display-left "onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-display-right "onclick="plusDivs(1)">&#10095;</button>

  <div class="w3-row-padding w3-school">
    <div class="w3-col s4">
      <img class="demo w3-opacity w3-hover-opacity-off"src="<?php echo THEME_PATH.'/img'?>/image-09.jpg"style="width:100%"onclick="currentDiv(1)">
    </div>
    <div class="w3-col s4">
      <img class="demo w3-opacity w3-hover-opacity-off"src="<?php echo THEME_PATH.'/img'?>/image-10.jpg"style="width:100%"onclick="currentDiv(2)">
    </div>
    <div class="w3-col s4">
      <img class="demo w3-opacity w3-hover-opacity-off"src="<?php echo THEME_PATH.'/img'?>/image-11.jpg"style="width:100%"onclick="currentDiv(3)">
    </div>
  </div>
	<a class="alet-success pull-right"href="<?php echo get_page_link('1705'); ?>">xem thêm ></a>
</div>

	<?php
	}
}


// lấy mẫu tinn tiêu biểu 
if (!function_exists('thpt_tranphu_get_typical')) {function thpt_tranphu_get_typical(){$args = array('post_type'=> 'post',
				    'posts_per_page' => 3,
				    'category_name'=>'codex',
				);
				$loop = new wp_Query($args);
			echo "<ul>";
			 while($loop->have_posts()) : $loop->the_post();
						printf(__('<li><a href="%1$s"title="%2$s">%3$s</a> </li>','thienlinh'),
						get_the_permalink(),
						get_the_title(),
						get_the_title());	
  					printf(__('<span class="date-typical"> cập nhập ngày  %1$s </span><br> ','thienlinh'),get_the_date());
				endwhile;
				echo "</ul>";
			wp_reset_query();
		}
	}

if (!function_exists('thpt_tranphu_get_category')) {function thpt_tranphu_get_category(){if (has_category( $category ='', $post = null)) {echo"có";}
			echo '<pre>';
			var_dump(wp_link_pages());
			echo '</pre>';
		}
}




























/***** Fetch Theme Data & Options *****/

$mh_magazine_lite_data = wp_get_theme('mh-magazine-lite');
$mh_magazine_lite_version = $mh_magazine_lite_data['Version'];
$mh_magazine_lite_options = get_option('mh_magazine_lite_options');

/***** Check if Active Theme is Official Theme / Child Theme by MH Themes *****/

function mh_magazine_lite_official_theme() {
	$active_theme = wp_get_theme();
	$active_theme_author = $active_theme['Author'];
	if ($active_theme_author === '<a href="https://www.mhthemes.com/">MH Themes</a>') {
		$official_theme = true;
	} else {
		$official_theme = false;
	}
	return $official_theme;
}

/***** Custom Hooks *****/

function mh_before_header() {
    do_action('mh_before_header');
}
function mh_after_header() {
    do_action('mh_after_header');
}
function mh_before_page_content() {
    do_action('mh_before_page_content');
}
function mh_before_post_content() {
    do_action('mh_before_post_content');
}
function mh_after_post_content() {
    do_action('mh_after_post_content');
}
function mh_post_header() {
    do_action('mh_post_header');
}
function mh_before_footer() {
    do_action('mh_before_footer');
}
function mh_after_footer() {
    do_action('mh_after_footer');
}
function mh_before_container_close() {
    do_action('mh_before_container_close');
}

/***** Theme Setup *****/

if (!function_exists('mh_magazine_lite_setup')) {
	function mh_magazine_lite_setup() {
		load_theme_textdomain('mh-magazine-lite', get_template_directory() . '/languages');
		add_filter('use_default_gallery_style', '__return_false');
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
		add_theme_support('post-thumbnails');
		add_theme_support('custom-background', array('default-color' => 'f7f7f7'));
		add_theme_support('custom-header', array('default-image' => '', 'default-text-color' => '000', 'width' => 1080, 'height' => 250, 'flex-width' => true, 'flex-height' => true));
		add_theme_support('custom-logo', array('width' => 300, 'height' => 100, 'flex-width' => true, 'flex-height' => true));
		add_theme_support('customize-selective-refresh-widgets');
		register_nav_menu('main_nav', esc_html__('Main Navigation', 'mh-magazine-lite'));
		add_editor_style();
	}
}
add_action('after_setup_theme', 'mh_magazine_lite_setup');

/***** Add Custom Image Sizes *****/

if (!function_exists('mh_magazine_lite_image_sizes')) {
	function mh_magazine_lite_image_sizes() {
		add_image_size('mh-magazine-lite-slider', 1030, 438, true);
		add_image_size('mh-magazine-lite-content', 678, 381, true);
		add_image_size('mh-magazine-lite-large', 678, 509, true);
		add_image_size('mh-magazine-lite-medium', 326, 245, true);
		add_image_size('mh-magazine-lite-small', 80, 60, true);
	}
}
add_action('after_setup_theme', 'mh_magazine_lite_image_sizes');

/***** Set Content Width *****/

if (!function_exists('mh_magazine_lite_content_width')) {
	function mh_magazine_lite_content_width() {
		global $content_width;
		if (!isset($content_width)) {
			$content_width = 678;
		}
	}
}
add_action('template_redirect', 'mh_magazine_lite_content_width');

/***** Load CSS & JavaScript *****/

if (!function_exists('mh_magazine_lite_scripts')) {
	function mh_magazine_lite_scripts() {
		global $mh_magazine_lite_version;
		wp_enqueue_style('mh-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,600', array(), null);
		wp_enqueue_style('mh-magazine-lite', get_stylesheet_uri(), false, $mh_magazine_lite_version);
		wp_enqueue_style('mh-font-awesome', get_template_directory_uri() . '/includes/font-awesome.min.css', array(), null);
		wp_enqueue_script('mh-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), $mh_magazine_lite_version);
		if (is_singular() && comments_open() && get_option('thread_comments') == 1) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'mh_magazine_lite_scripts');

if (!function_exists('mh_magazine_lite_admin_scripts')) {
	function mh_magazine_lite_admin_scripts($hook) {
		if ('appearance_page_magazine' === $hook || 'widgets.php' === $hook) {
			wp_enqueue_style('mh-admin', get_template_directory_uri() . '/admin/admin.css');
		}
	}
}
add_action('admin_enqueue_scripts', 'mh_magazine_lite_admin_scripts');

/***** Register Widget Areas / Sidebars	*****/
/*
if (!function_exists('mh_magazine_lite_widgets_init')) {
	function mh_magazine_lite_widgets_init() {
		register_sidebar(array('name' => esc_html__('Sidebar', 'mh-magazine-lite'), 'id' => 'sidebar', 'description' => esc_html__('Widget area (sidebar left/right) on single posts, pages and archives.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - Full Width', 'widget area name', 'mh-magazine-lite'), 1), 'id' => 'home-1', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-1 mh-home-wide %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - 2/3 Width', 'widget area name', 'mh-magazine-lite'), 2), 'id' => 'home-2', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-2 mh-widget-col-2 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'mh-magazine-lite'), 3), 'id' => 'home-3', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-3 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'mh-magazine-lite'), 4), 'id' => 'home-4', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-4 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - 2/3 Width', 'widget area name', 'mh-magazine-lite'), 5), 'id' => 'home-5', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-5 mh-widget-col-2 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'mh-magazine-lite'), 6), 'id' => 'home-6', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-6 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Posts %d - Advertisement', 'widget area name', 'mh-magazine-lite'), 1), 'id' => 'posts-1', 'description' => esc_html__('Widget area above single post content.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-posts-1 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Posts %d - Advertisement', 'widget area name', 'mh-magazine-lite'), 2), 'id' => 'posts-2', 'description' => esc_html__('Widget area below single post content.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-posts-2 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Footer %d - 1/4 Width', 'widget area name', 'mh-magazine-lite'), 1), 'id' => 'footer-1', 'description' => esc_html__('Widget area in footer.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-footer-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="mh-widget-title mh-footer-widget-title"><span class="mh-widget-title-inner mh-footer-widget-title-inner">', 'after_title' => '</span></h6>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Footer %d - 1/4 Width', 'widget area name', 'mh-magazine-lite'), 2), 'id' => 'footer-2', 'description' => esc_html__('Widget area in footer.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-footer-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="mh-widget-title mh-footer-widget-title"><span class="mh-widget-title-inner mh-footer-widget-title-inner">', 'after_title' => '</span></h6>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Footer %d - 1/4 Width', 'widget area name', 'mh-magazine-lite'), 3), 'id' => 'footer-3', 'description' => esc_html__('Widget area in footer.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-footer-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="mh-widget-title mh-footer-widget-title"><span class="mh-widget-title-inner mh-footer-widget-title-inner">', 'after_title' => '</span></h6>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Footer %d - 1/4 Width', 'widget area name', 'mh-magazine-lite'), 4), 'id' => 'footer-4', 'description' => esc_html__('Widget area in footer.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-footer-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="mh-widget-title mh-footer-widget-title"><span class="mh-widget-title-inner mh-footer-widget-title-inner">', 'after_title' => '</span></h6>'));
	}
}
add_action('widgets_init', 'mh_magazine_lite_widgets_init');*/

/***** Include Several Functions *****/

if (is_admin()) {
	require_once('admin/admin.php');
}
require_once('includes/mh-customizer.php');
require_once('includes/mh-widgets.php');
require_once('includes/mh-custom-functions.php');
require_once('includes/mh-compatibility.php');

/***** Add Support for WooCommerce *****/

include_once(ABSPATH . 'wp-admin/includes/plugin.php');

if (is_plugin_active('woocommerce/woocommerce.php')) {
	require_once('woocommerce/mh-custom-woocommerce.php');
}

?>