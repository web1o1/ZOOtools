<?php
/**
* @package		ZOOtools
* @author    	JOOlanders, SL http://www.zoolanders.com
* @copyright 	Copyright (C) JOOlanders, SL
* @license   	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

/*
	Class: ElementSeparator
		The Separator element class
*/
class ElementSeparator extends ElementPro implements iSubmittable {

			/*
	   Function: Constructor
	*/
	public function __construct() {

		// call parent constructor
		parent::__construct();

		// load ZL Field integration
		if ($this->app->zlfw->isTheEnviroment('zoo-type')) {
			$this->app->document->addStylesheet('elements:separator/assets/zlfield.css');
			$this->app->document->addScript('elements:separator/assets/zlfield.min.js');
			$this->app->document->addScriptDeclaration( 'jQuery(function($) { $("body").ZOOtoolsSeparatorZLField({ enviroment: "'.$this->app->zlfw->getTheEnviroment().'" }) });' );
		}
	}


	/*
		Function: render
			Override. Renders the element.

	   Parameters:
			$params - render parameter

		Returns:
			String - html
	*/
	public function render($params = array()) {		
		return null;
	}

	/*
	   Function: edit
		   Renders the edit form field.

	   Returns:
		   String - html
	*/
	public function edit() 
	{
		if ($layout = $this->getLayout('edit/'.$this->config->find('layout._layout', 'default.php'))) {
			return $this->renderLayout($layout);
		}
	}
	
	/*
		Function: renderSubmission
			Renders the element in submission.

	   Parameters:
			$params - AppData submission parameters

		Returns:
			String - html
	*/
	public function renderSubmission($params = array()) {
		return $this->edit();
	}
	
	/*
		Function: validateSubmission
			Validates the submitted element

	   Parameters:
			$value  - AppData value
			$params - AppData submission parameters

		Returns:
			Array - cleaned value
	*/
	public function validateSubmission($value, $params){
		return array();
	}

}