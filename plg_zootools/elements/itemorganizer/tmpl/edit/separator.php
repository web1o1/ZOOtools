<?php
/**
* @package		ZOOtools
* @author    	JOOlanders, SL http://www.zoolanders.com
* @copyright 	Copyright (C) JOOlanders, SL
* @license   	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// load assets
$this->app->document->addStylesheet('elements:itemorganizer/tmpl/edit/separator/style.css');
$this->app->document->addScript('elements:itemorganizer/tmpl/edit/separator/script.min.js');
$this->app->zlfw->loadLibrary('bootstrap');

// init vars
$title 			= $this->config->find('layout._title', '');
$folding 		= $this->config->find('layout._folding', '');

?>

<div id="<?php echo $this->identifier; ?>">

	<script type="text/javascript">
		jQuery(function($) {
			$("#<?php echo $this->identifier; ?>").ZOOtoolsItemOrganizer({
				title: '<?php echo $title; ?>',
				folding: '<?php echo $folding ?>'
			});
		});
	</script>
	
</div>