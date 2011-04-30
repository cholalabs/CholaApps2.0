<?php
/**
 * @version		$Id: weblinks.php 20228 2011-01-10 00:52:54Z eddieajau $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('chola.application.component.controlleradmin');

/**
 * Weblinks list controller class.
 *
 * @package		Chola.Administrator
 * @subpackage	com_weblinks
 * @since		1.6
 */
class WeblinksControllerWeblinks extends JControllerAdmin
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function getModel($name = 'Weblink', $prefix = 'WeblinksModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}
}