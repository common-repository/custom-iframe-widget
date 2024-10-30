<?php
/**
Plugin Name: Custom IFrame Widget
Plugin URI: http://wordpress.opensourcedevelopers.net/downloads/
Description: A Custom IFrame Widget,  Short Code for Page,Post: [ShaktiIFrame url 650px 200px]
Author: Shakti Kumar
Version: 1.1
Author URI: http://opensourcedevelopers.net/
 */
class Custom_IFrame_Widget extends WP_Widget {
	/** constructor */
	function Custom_IFrame_Widget() {
		parent::WP_Widget(false, 'Custom Iframe');		
	}
	/*function __construct() {
		parent::WP_Widget( 'custom_iframe_widget', 'Custom_IFrame_Widget', array( 'description' => 'A Custom IFrame Widget' ) );
	}*/

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$url = apply_filters( 'widget_url', $instance['url'] );
		$cheight = apply_filters( 'widget_cheight', $instance['cheight'] );
		$cwidth = apply_filters( 'widget_cwidth', $instance['cwidth'] );
		$fheight = apply_filters( 'widget_fheight', $instance['fheight'] );
		$fwidth = apply_filters( 'widget_fwidth', $instance['fwidth'] );
		$left = apply_filters( 'widget_left', $instance['left'] );
		$top = apply_filters( 'widget_top', $instance['top'] );
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title; ?>
          <?php /*?>  <div class="website-part" style="position:relative; width:300px; height:300px; overflow:hidden;">
				<iframe src="<?php echo $url; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" scrolling="no" id="website-frame-part" style="position:absolute; top:-393px;left:-832px;"></iframe>262/190, 1280/583
        	</div><?php */?>
             <div id="outerdiv" style="width:<?php echo $cwidth; ?>px; height:<?php echo $cheight; ?>px; overflow:hidden; position:relative;">
             	<iframe src="<?php echo $url; ?>" id="inneriframe" scrolling="no" style="position:absolute; width:<?php echo $fwidth; ?>px; height:<?php echo $fheight; ?>px; top:<?php echo $top; ?>px ; left:<?php echo $left; ?>px ;"></iframe>
             </div>

		<?php echo $after_widget;
	}

	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['url'] = strip_tags($new_instance['url']);
		$instance['cheight'] = strip_tags($new_instance['cheight']);
		$instance['cwidth'] = strip_tags($new_instance['cwidth']);
		$instance['fheight'] = strip_tags($new_instance['fheight']);
		$instance['fwidth'] = strip_tags($new_instance['fwidth']);
		$instance['top'] = strip_tags($new_instance['top']);
		$instance['left'] = strip_tags($new_instance['left']);
		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
			$url = esc_attr( $instance[ 'url' ] );
			$cheight = esc_attr( $instance[ 'cheight' ] );
			$cwidth = esc_attr( $instance[ 'cwidth' ] );
			$fheight = esc_attr( $instance[ 'fheight' ] );
			$fwidth = esc_attr( $instance[ 'fwidth' ] );
			$top = esc_attr( $instance[ 'top' ] );
			$left = esc_attr( $instance[ 'left' ] );
		}
		else {
			$title = __( 'New title', 'text_domain' );
			$url = __( 'New url', 'text_domain' );
			$cheight = __( 'New Container height', 'text_domain' );
			$cwidth = __( 'New Container width', 'text_domain' );
			$fheight = __( 'New Iframe height', 'text_domain' );
			$fwidth = __( 'New IFrame width', 'text_domain' );
			$top = esc_attr( $instance[ 'top' ] );
			$left = esc_attr( $instance[ 'left' ] );
			
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
        <p>
		<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('URL:'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" />
		</p>
       
        <p>
		<label for="<?php echo $this->get_field_id('cwidth'); ?>"><?php _e('Container Width (px):'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('cwidth'); ?>" name="<?php echo $this->get_field_name('cwidth'); ?>" type="text" value="<?php echo $cwidth; ?>" />
		</p>
         <p>
		<label for="<?php echo $this->get_field_id('cheight'); ?>"><?php _e('Container Height (px):'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('cheight'); ?>" name="<?php echo $this->get_field_name('cheight'); ?>" type="text" value="<?php echo $cheight; ?>" />
		</p>
        
         <p>
		<label for="<?php echo $this->get_field_id('fwidth'); ?>"><?php _e('IFrame Width (px):'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('fwidth'); ?>" name="<?php echo $this->get_field_name('fwidth'); ?>" type="text" value="<?php echo $fwidth; ?>" />
		</p>
         <p>
		<label for="<?php echo $this->get_field_id('fheight'); ?>"><?php _e('IFrame Height (px):'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('fheight'); ?>" name="<?php echo $this->get_field_name('fheight'); ?>" type="text" value="<?php echo $fheight; ?>" />
		</p>
        
        <p>
		<label for="<?php echo $this->get_field_id('top'); ?>"><?php _e('Top (px):'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('top'); ?>" name="<?php echo $this->get_field_name('top'); ?>" type="text" value="<?php echo $top; ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('left'); ?>"><?php _e('Left (px):'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('left'); ?>" name="<?php echo $this->get_field_name('left'); ?>" type="text" value="<?php echo $left; ?>" />
		</p>
		<?php 
	}

} // class Custom_IFrame_Widget Ends

function shakti_iframe_replace($matches)
{	
	$temp = explode(' ', $matches[1]);
    $count = count($temp);
   	
	$url 	= $temp[0];         
    $width 	= isset($temp[1]) ? $temp[1] : 200;
    $height = isset($temp[2]) ? $temp[2] : 300;
    $x 		= isset($temp[3]) ? $temp[3] : 0;
    $y 		= isset($temp[4]) ? $temp[4] : 0;

    if (strpos($width, 'px') === false and strpos($width, '%') === false)
    {
    	$width .= 'px'; 
    }
    if (strpos($height, 'px') === false and strpos($height, '%') === false)
    {
    	$height .= 'px'; 
    }
	
	if (get_option('embedder_scrollmethod') == '0')
	{ 
		$scrollTo1 = '';
		$scrollTo2 = ' onload="scro11me(this)"></iframe>' .
					'<script type="text/javascript">' .
					'function scro11me(f){f.contentWindow.scrollTo(' . $x . ',' . $y . '); }' .
					'</script>';
	}
	else
	{		
		$scrollTo1 = '<div style="position:relative; overflow: hidden; width: ' . $width . '; height: ' . $height . '">' .
					'<div style="position:absolute; left:' . (-1 * $x) . 'px; top: ' . (-1 * $y) . 'px">';
		$scrollTo2 = '></iframe></div></div>';
		$w = (int) $width;
		$h = (int) $height;
		$width = str_replace($w, $w + $x, $width);
		$height = str_replace($h, $h + $x, $height);
	}
	
	switch (get_option('embedder_scrolling'))
	{
		case 'yes'	: $scrolling = 'scroll'; break; 
		case 'no'	: $scrolling = 'hidden'; break; 
		default		: $scrolling = 'auto'; break;
	} 
	    
    return sprintf(	'%s<iframe class="%s" src="%s" style="width: %s; height: %s; ' .
					'overflow: %s; border: %dpx solid silver; %s"%s',			
					$scrollTo1,
					get_option('embedder_class'),
					$url,
					$width,
					$height,
					$scrolling,
					get_option('embedder_border'),
					get_option('embedder_style'),
					$scrollTo2);			 			
}

function custom_parse_iframe_widget($text)
{
	return preg_replace_callback("@(?:<p>\s*)?\[ShaktiIFrame\s*(.*?)\](?:\s*</p>)?@", 'shakti_iframe_replace', $text);
}

add_filter('the_content', 'custom_parse_iframe_widget');
add_filter('the_excerpt', 'custom_parse_iframe_widget');

add_action( 'widgets_init', create_function( '', 'register_widget("Custom_IFrame_Widget");' ) );

?>