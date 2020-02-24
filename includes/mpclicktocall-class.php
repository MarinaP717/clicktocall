<?php

class MpClicktocall {

	function __construct() {
		add_action('init', array($this, 'displayIcon'));
	}

	public function activate(){  
		flush_rewrite_rules();
		$this->displayIcon();
	}

	public function deactivate(){  
		flush_rewrite_rules();
	}

	public function displayIcon(){
		$tel = get_option('telephone');		
		?><a id="clicktocallbutton" <?php if (get_option('mobile_only')=='mobile') {echo ' class="mobile-only"';}?> href="tel:<?php echo $tel;?>"></a>
		<?php
	}

} // class MpClicktoCall

$mpclicktocall = new MpClicktocall();

register_activation_hook(__FILE__, array($mpclicktocall, 'activate'));
register_deactivation_hook(__FILE__, array($mpclicktocall, 'deactivate'));
