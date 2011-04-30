<?php
/**
 * @version		$Id: plugins.php 21032 2011-03-29 16:38:31Z dextercowley $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('chola.application.component.controlleradmin');

/**
 * Plugins list controller class.
 *
 * @package		Chola.Administrator
 * @subpackage	com_plugins
 * @since		1.6
 */
class PluginsControllerPlugins extends JControllerAdmin
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Plugin', $prefix = 'PluginsModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}

}