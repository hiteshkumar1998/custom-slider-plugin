<?php
if( !function_exists( 'my_slider_register_menu' )){
	function my_slider_register_menu(){
		add_menu_page( 'myslider', 'My Slider', 'manage_options', 'add-new-image', 'my_slider_add_new_images_page', 'dashicons-format-gallery', 30);
	}
	add_action( 'admin_menu', 'my_slider_register_menu');
}

function my_slider_add_new_images_page()
{
	if( !is_admin()){
		return;
	}
	?>
		<div class="wrap">
			<form action="options.php" method="post" enctype="multipart/form-data">
				<?php
					settings_fields( 'add-new-image' );
					do_settings_sections( 'add-new-image' );
					submit_button( 'Add Images' );
				?>
			</form>
		</div>
	<?php
}

function my_slider_settings(){
	register_setting( 'add-new-image', 'choose_image' );

	add_settings_section( 'plugin_add_image_section', 'Add Images', 'my_slider_add_images_section_cb', 'add-new-image');

	add_settings_field( 'my_slider_choose_image_field', 'Choose Images', 'my_slider_choose_images_field_cb', 'add-new-image', 'plugin_add_image_section' );

}

add_action( 'admin_init', 'my_slider_settings');

function my_slider_add_images_section_cb(){
	
}

function my_slider_choose_images_field_cb(){

	// get the value of the setting we've registered with register_setting()
    $setting = get_option('choose_image');
    // output the field
    ?>
    <input type="file" name="choose_image">
    <?php
}