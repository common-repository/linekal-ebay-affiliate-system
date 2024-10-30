<?php
/*
Plugin Name:  Ebay Affiliate System for WordPress
Plugin URI:   http://www.linekal.com/ebay-affiliate-system
Description:  Display ebay affiliate products using 5 different feeds
Version:      2.0
Author:       Abbas Khalil
Author URI:   http://www.linekal.com/ebay-affiliate-system
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define('EBAYAFFILIATESYSTEM_PLUGIN_PATH',dirname(__FILE__));
define('EBAYAFFILIATESYSTEM_PLUGIN_URL',plugins_url('', __FILE__));

define( "EBAYFFSYS_PLUGIN_NAME", "eBay Affiliate System" );
define( "EBAYFFSYS_PLUGIN_TAGLINE", __( "Display ebay affiliate products using 5 different feeds", "ebay-affiliate-system" ) );
define( "EBAYFFSYS_PLUGIN_URL", "http://www.linekal.com/ebay-affiliate-system" );
define( "EBAYFFSYS_EXTEND_URL", "http://www.linekal.com/ebay-affiliate-system" );

// Plugin Settings Link

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'ebayaffsys_action_links' );
function ebayaffsys_action_links( $links ) {
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=ebayaffiliatesystem') ) .'">Settings</a>';
   return $links;
}

// Load Ebay Affiliate System Stylesheet

function ebayaffsys_stylesheet() {
	wp_register_style( 'ebay-affiliate-system-style', plugins_url( 'ebay-affiliate-system.css', __FILE__ ) );
	wp_enqueue_style( 'ebay-affiliate-system-style' );
}
add_action( 'wp_enqueue_scripts', 'ebayaffsys_stylesheet' );

// Load Ebay Affiliate System Admin CSS

function ebayaffsysadmin_stylesheet() {
	wp_register_style( 'ebay-affiliate-system-admin-css', plugins_url( 'admin.css', __FILE__ ) );
	wp_enqueue_style( 'ebay-affiliate-system-admin-css' );
}
add_action( 'admin_init', 'ebayaffsysadmin_stylesheet' );

// Create Admin Menu

add_action( 'admin_menu', 'ebayaff_add_admin_menu' );
add_action( 'admin_init', 'ebayaff_settings_init' );

function ebayaff_add_admin_menu(  ) { 

	add_submenu_page( 'options-general.php', 'Ebay Affiliate System', 'Ebay Affiliate System', 'manage_options', 'ebayaffiliatesystem', 'ebayaff_options_page' );

}

// Shortcode [ebayaffiliate]

function shortcode_ebayaffiliate_system($attrs, $content = null) {
$attrs['file']=( plugin_dir_path( __FILE__ ) . 'ebay-affiliate-system.php');
    if (isset($attrs['file'])) {
        $file = strip_tags($attrs['file']);
        if ($file[0] != '/')
            $file = ABSPATH . $file;

        ob_start();
        include($file);
        $buffer = ob_get_clean();
        $options = get_option('shortcode_ebayaffiliate_system', array());
        if (isset($options['shortcode'])) {
            $buffer = do_shortcode($buffer);
        }
    } else {
        $tmp = '';
        foreach ($attrs as $key => $value) {
            if ($key == 'src') {
                $value = strip_tags($value);
            }
            $value = str_replace('&amp;', '&', $value);
            if ($key == 'src') {
                $value = strip_tags($value);
            }
            $tmp .= ' ' . $key . '="' . $value . '"';
        }
        $buffer = '<iframe' . $tmp . '></iframe>';
    }
    return $buffer;
}

add_shortcode('ebayaffiliate', 'shortcode_ebayaffiliate_system');

// Generate Settings Page 

function ebayaff_settings_init(  ) { 

	register_setting( 'pluginPage', 'ebayaff_settings' );

	add_settings_section(
		'ebayaff_pluginPage_section', 
		__( '', 'wordpress' ), 
		'ebayaff_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'feed_one', 
		__( 'Feed One URL', 'wordpress' ), 
		'ebayaffsys_feed_one_render', 
		'pluginPage', 
		'ebayaff_pluginPage_section' 
	);

	add_settings_field( 
		'items_feed_one', 
		__( 'Number of Items Feed One', 'wordpress' ), 
		'ebayaffsys_items_feed_one_render', 
		'pluginPage', 
		'ebayaff_pluginPage_section' 
	);

	add_settings_field( 
		'feed_two', 
		__( 'Feed Two URL', 'wordpress' ), 
		'ebayaffsys_feed_two_render', 
		'pluginPage', 
		'ebayaff_pluginPage_section' 
	);

	add_settings_field( 
		'items_feed_two', 
		__( 'Number of Items Feed Two', 'wordpress' ), 
		'ebayaffsys_items_feed_two_render', 
		'pluginPage', 
		'ebayaff_pluginPage_section' 
	);

	add_settings_field( 
		'feed_three', 
		__( 'Feed Three URL', 'wordpress' ), 
		'ebayaffsys_feed_three_render', 
		'pluginPage', 
		'ebayaff_pluginPage_section' 
	);

	add_settings_field( 
		'items_feed_three', 
		__( 'Number of Items Feed Three', 'wordpress' ), 
		'ebayaffsys_items_feed_three_render', 
		'pluginPage', 
		'ebayaff_pluginPage_section' 
	);

	add_settings_field( 
		'feed_four', 
		__( 'Feed Four URL', 'wordpress' ), 
		'ebayaffsys_feed_four_render', 
		'pluginPage', 
		'ebayaff_pluginPage_section' 
	);

	add_settings_field( 
		'items_feed_four', 
		__( 'Number of Items Feed Four', 'wordpress' ), 
		'ebayaffsys_items_feed_four_render', 
		'pluginPage', 
		'ebayaff_pluginPage_section' 
	);

	add_settings_field( 
		'feed_five', 
		__( 'Feed Five URL', 'wordpress' ), 
		'ebayaffsys_feed_five_render', 
		'pluginPage', 
		'ebayaff_pluginPage_section' 
	);

	add_settings_field( 
		'items_feed_five', 
		__( 'Number of Items Feed Five', 'wordpress' ), 
		'ebayaffsys_items_feed_five_render', 
		'pluginPage', 
		'ebayaff_pluginPage_section' 
	);

}


function ebayaffsys_feed_one_render(  ) { 

	$options = get_option( 'ebayaff_settings' );
	?>
	<input type='text' name='ebayaff_settings[feed_one]' value='<?php echo $options['feed_one']; ?>'>
	<?php

}


function ebayaffsys_items_feed_one_render(  ) { 

	$options = get_option( 'ebayaff_settings' );
	?>
	<input type='text' name='ebayaff_settings[items_feed_one]' value='<?php echo $options['items_feed_one']; ?>'>
	<?php

}


function ebayaffsys_feed_two_render(  ) { 

	$options = get_option( 'ebayaff_settings' );
	?>
	<input type='text' name='ebayaff_settings[feed_two]' value='<?php echo $options['feed_two']; ?>'>
	<?php

}


function ebayaffsys_items_feed_two_render(  ) { 

	$options = get_option( 'ebayaff_settings' );
	?>
	<input type='text' name='ebayaff_settings[items_feed_two]' value='<?php echo $options['items_feed_two']; ?>'>
	<?php

}

function ebayaffsys_feed_three_render(  ) { 

	$options = get_option( 'ebayaff_settings' );
	?>
	<input type='text' name='ebayaff_settings[feed_three]' value='<?php echo $options['feed_three']; ?>'>
	<?php

}


function ebayaffsys_items_feed_three_render(  ) { 

	$options = get_option( 'ebayaff_settings' );
	?>
	<input type='text' name='ebayaff_settings[items_feed_three]' value='<?php echo $options['items_feed_three']; ?>'>
	<?php

}


function ebayaffsys_feed_four_render(  ) { 

	$options = get_option( 'ebayaff_settings' );
	?>
	<input type='text' name='ebayaff_settings[feed_four]' value='<?php echo $options['feed_four']; ?>'>
	<?php

}


function ebayaffsys_items_feed_four_render(  ) { 

	$options = get_option( 'ebayaff_settings' );
	?>
	<input type='text' name='ebayaff_settings[items_feed_four]' value='<?php echo $options['items_feed_four']; ?>'>
	<?php

}


function ebayaffsys_feed_five_render(  ) { 

	$options = get_option( 'ebayaff_settings' );
	?>
	<input type='text' name='ebayaff_settings[feed_five]' value='<?php echo $options['feed_five']; ?>'>
	<?php

}


function ebayaffsys_items_feed_five_render(  ) { 

	$options = get_option( 'ebayaff_settings' );
	?>
	<input type='text' name='ebayaff_settings[items_feed_five]' value='<?php echo $options['items_feed_five']; ?>'>
	<?php

}
function ebayaff_settings_section_callback(  ) { ?>

	  <div class="instructions">
	  <p>NOTE: Please fill the following fields with proper values and click on Save Button. In Feed URL inputs just paste the feed URL obtained from ebay. In number of items field, put the number of items per feed which you want to display. When the user will click on Load More button the new feed will be loaded. There are maximum 5 feeds which you can load with unlimited number of items.</p>

	  <p>Use Shortcode <strong>[ebayaffiliate]</strong> in your post or page to display the products.</p>
	  <p>For special customization and Support feel free to contact me at: <strong>abbasahmed50@gmail.com</strong> :)</p>
	  <p>More features coming soon in <strong>Version 1.1</strong> :)</p>
	  </div>

<?php
}

function ebayaff_options_page(  ) { 

	?>
	
    <div class="clear"></div>	
    <div class="ebay_aff_admin_panel_left">
	<h2>Ebay Affiliate System Configuration</h>
	    <form action='options.php' method='post'>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	    </form>
    </div>
   
    <div class="ebay_aff_admin_panel_right">
	<div class="box">
	  <h2>About the Author</h2>
	  <p><img class="author_profile_image" src="<?php echo plugins_url( 'author_profile.png' , __FILE__ ); ?>">Abbas is a leading WordPress developer and freelancer having more than 8 years experience in web development specially in WordPress development. His successful development portfolio includes popular themes and plugins. Completed 400+ freelance projects with 100% customers satisfaction</p>
	</div>
	<div class="box">
	  <h2>Professional Services</h2>
	  <p>With more than 8 years of experience i am here to help you design, develop and customize any kind website for you. I can do any kind of wordpress development and customization for you please feel free to contact me at:</p>
	  <h3>abbasahmed50@gmail.com</h3>
	</div>
    </div>
	
	<?php

}
?>