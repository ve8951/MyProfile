<?php

if(class_exists( 'WP_Customize_control')):

	class Zincy_Lite_Layout_Dropdown extends WP_Customize_Control {
		public $type = 'radioimage';

		public function render_content() {
			$name = $this->id;
			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div id="input_<?php echo $this->id; ?>" class="image">
				<?php foreach ( $this->choices as $value => $label ) : ?>
					<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo $this->id . $value; ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
					<img src="<?php echo esc_html( $label ); ?>"/>
				</input>
			<?php endforeach; ?>
		</div>
		<?php 
	}
}
endif;
