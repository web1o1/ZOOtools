<?php
/*
* @package		ZOOtools
* @author    	ZOOlanders http://www.zoolanders.com
* @copyright 	Copyright (C) JOOlanders SL
* @license   	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Import library dependencies
jimport('joomla.plugin.plugin');
jimport('joomla.filesystem.file');

class plgSystemZooTools extends JPlugin {

	public $joomla;
	public $app;
	
	/**
	 * onAfterInitialise handler
	 *
	 * Adds ZOO event listeners
	 *
	 * @access public
	 * @return null
	 */
	function onAfterInitialise()
	{
		// Get Joomla instances
		$this->joomla = JFactory::getApplication();
		$jlang = JFactory::getLanguage();
		
		// load default and current language
		$jlang->load('plg_system_zootools', JPATH_ADMINISTRATOR, 'en-GB', true);
		$jlang->load('plg_system_zootools', JPATH_ADMINISTRATOR, null, true);

		// check dependences
		if (!defined('ZLFW_DEPENDENCIES_CHECK_OK')){
			$this->checkDependencies();
			return; // abort
		}

		// Get the ZOO App instance
		$this->app = App::getInstance('zoo');
		
		// register plugin path
		if ( $path = $this->app->path->path( 'root:plugins/system/zootools' ) ) {
			$this->app->path->register($path, 'zootools');
		}

		// register elements path
		if ( $path = $this->app->path->path( 'zootools:elements' ) ){
			$this->app->path->register( $path, 'elements' );
		}
	}
	
	/*
	 *  checkDependencies
	 */
	public function checkDependencies()
	{
		if($this->joomla->isAdmin())
		{
			// if ZLFW not enabled
			if(!JPluginHelper::isEnabled('system', 'zlframework') || !JComponentHelper::getComponent('com_zoo', true)->enabled) {
				$this->joomla->enqueueMessage(JText::_('PLG_ZOOTOOLS_MISSING_DEPENDENCIES'), 'notice');
			} else {
				// load zoo
				require_once(JPATH_ADMINISTRATOR.'/components/com_zoo/config.php');

				// fix plugins ordering
				$zoo = App::getInstance('zoo');
				$zoo->loader->register('ZlfwHelper', 'root:plugins/system/zlframework/zlframework/helpers/zlfwhelper.php');
				$zoo->zlfw->checkPluginOrder('zootools');
			}
		}
	}
}