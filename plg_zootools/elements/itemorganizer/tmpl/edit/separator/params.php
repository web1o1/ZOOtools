<?php
/**
* @package		ZL Elements
* @author    	JOOlanders, SL http://www.zoolanders.com
* @copyright 	Copyright (C) JOOlanders, SL
* @license   	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// load config
require_once(JPATH_ADMINISTRATOR . '/components/com_zoo/config.php');

	return 
	'{"fields": {

		"layout_wrapper":{
			"type":"fieldset",
			"fields": {

				"_title":{
					"type":"text",
					"label":"PLG_ZOOTOLS_ELEMIO_TITLE",
					"help":"PLG_ZOOTOLS_ELEMIO_TITLE_DESC"
				},
				"_folding":{
					"type":"select",
					"label":"PLG_ZOOTOLS_ELEMIO_FOLD_FEATURE",
					"help":"PLG_ZOOTOLS_ELEMIO_FOLD_FEATURE_DESC",
					"specific": {
						"options": {
							"PLG_ZLFRAMEWORK_DISABLED":"",
							"PLG_ZOOTOLS_ELEMIO_START_UNFOLDED":"1",
							"PLG_ZOOTOLS_ELEMIO_START_FOLDED":"2"
						}
					}
				}

			}
		}

	}}';