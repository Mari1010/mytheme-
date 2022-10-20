<?php


// Load Stylesheets
function load_css()
{


		wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all' );
		wp_enqueue_style('bootstrap');


		wp_register_style('magnific', get_template_directory_uri() . '/css/magnific-popup.css', array(), false, 'all' );
		wp_enqueue_style('magnific');


		wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all' );
		wp_enqueue_style('main');


	
}
add_action('wp_enqueue_scripts','load_css');



// Load Javascript
function load_js()
{	
		wp_enqueue_script('jquery');

		wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
		wp_enqueue_script('bootstrap');

		wp_register_script('magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', 'jquery', false, true);
		wp_enqueue_script('magnific');


		wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', 'jquery', false, true);
		wp_enqueue_script('custom');

}
add_action('wp_enqueue_scripts', 'load_js');




// Theme Options
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');










// Custom Image Sizes
add_image_size('blog-large', 800, 600, false);
add_image_size('blog-small', 300, 200, true);


// Register Sidebars

function my_sidebars()
{


			register_sidebar(

						array(

								'name' => 'Page Sidebar',
								'id' => 'page-sidebar',
								'before_title' => '<h3 class="widget-title">',
								'after_title' => '</h3>'

						)

			);


			register_sidebar(

						array(

								'name' => 'Blog Sidebar',
								'id' => 'blog-sidebar',
								'before_title' => '<h3 class="widget-title">',
								'after_title' => '</h3>'

						)

			);



}
add_action('widgets_init','my_sidebars');


function my_first_post_type()
{

	$args = array(


		'labels' => array(

					'name' => 'Food',
					'singular_name' => 'Food',
		),
		'hierarchical' => true,
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-images-alt2',
		'supports' => array('title', 'editor', 'thumbnail','custom-fields'),
		//'rewrite' => array('slug' => 'food'),	

	);


	register_post_type('food', $args);


}
add_action('init', 'my_first_post_type');



function my_first_taxonomy()
{

			$args = array(

					'labels' => array(
							'name' => 'Types',
							'singular_name' => 'Type',
					),

					'public' => true,
					'hierarchical' => true,

			);


			register_taxonomy('type', array('food'), $args);

}
add_action('init', 'my_first_taxonomy');

add_action('wp_ajax_enquiry', 'enquiry_form');
add_action('wp_ajax_nopriv_enquiry', 'enquiry_form');



function enquiry_form()
{


	if(  !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' )  )
	{

		wp_send_json_error('Nonce is incorrect', 401);
		die();

	}



	$formdata = [];

	wp_parse_str($_POST['enquiry'], $formdata);


	// Admin email
	$admin_email = get_option('admin_email');


	// Email headers
	$headers[] = 'Content-Type: text/html; charset=UTF-8';
	$headers[] = 'From: My Website <' . $admin_email . '>';
	$headers[] = 'Reply-to:' . $formdata['email'];

	
	//  sending the email to
	$send_to = $admin_email;

	// Subject
	$subject = "Enquiry from " . $formdata['fname'] . ' ' . $formdata['lname']; 

	// Message
	$message = '';

	foreach($formdata as $index => $field)
	{
		$message .= '<strong>' . $index . '</strong>: ' . $field . '<br />';
	}


	try {

		if( wp_mail($send_to, $subject, $message, $headers) )
		{

			wp_send_json_success('Email sent');

		}
		else {


			wp_send_json_error('Email error');

		}

	} catch (Exception $e)
	{
			wp_send_json_error($e->getMessage());
	}


	wp_send_json_success( $formdata['fname'] );
}
add_action('phpmailer_init','custom_mailer');


function custom_mailer( PHPMailer $phpmailer )
{

	$phpmailer->SetFrom('ver342077@gmail.com', 'Mariza Veru');
	$phpmailer->Host = 'https://connect.wpmailsmtp.com/google/';
	$phpmailer->Port = 587;
	$phpmailer->SMTPAuth = true;
	$phpmailer->SMTPSecure = 'tls';
	$phpmailer->Username = SMTP_LOGIN;
	$phpmailer->Password = SMTP_PASSWORD;
	$phpmailer->IsSMTP();

}



function my_shortcode($atts, $content = null, $tag = '')


{

	ob_start();

	print_r($content);

	set_query_var('attributes', $atts);

	get_template_part('includes/latest', 'food');

	return ob_get_clean();

}






