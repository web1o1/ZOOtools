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
$this->app->document->addStylesheet('elements:separator/tmpl/edit/subsection/style.css');
$this->app->document->addScript('elements:separator/tmpl/edit/subsection/script.min.js');

// init vars
$title = $this->config->get('name', '');

?>

<div id="<?php echo $this->identifier; ?>">

	<script type="text/javascript">
		jQuery(function($) {
			$("#<?php echo $this->identifier; ?>").ZOOtoolsSeparatorSubsection({
				title: '<?php echo $title; ?>'
			});
		});
	</script>
	
</div>