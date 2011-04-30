<?php
/**
 * @version		$Id: helper.php 20196 2011-01-09 02:40:25Z ian $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * Cholapps Administrator Application helper class.
 * Provide many supporting API functions.
 *
 * @package		Chola.Administrator
 * @subpackage	Application
 */
class JAdministratorHelper
{
	/**
	 * Return the application option string [main component].
	 *
	 * @return	string		Option.
	 * @since	1.5
	 */
	public static function findOption()
	{
		$option = strtolower(JRequest::getCmd('option'));

		$user = JFactory::getUser();
		if ($user->get('guest')) {
			$option = 'com_login';
		}

		if (empty($option)) {
			$option = 'com_cpanel';
		}

		JRequest::setVar('option', $option);
		return $option;
	}
}