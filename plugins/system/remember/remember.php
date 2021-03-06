<?php
/**
 * @version		$Id: remember.php 21097 2011-04-07 15:38:03Z dextercowley $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

jimport('chola.plugin.plugin');

/**
 * Cholapps System Remember Me Plugin
 *
 * @package		Chola.Plugin
 * @subpackage	System.remember
 */
class plgSystemRemember extends JPlugin
{
	function onAfterInitialise()
	{
		$app = JFactory::getApplication();

		// No remember me for admin
		if ($app->isAdmin()) {
			return;
		}

		$user = JFactory::getUser();
		if ($user->get('guest'))
		{
			jimport('chola.utilities.utility');
			$hash = JUtility::getHash('JLOGIN_REMEMBER');

			if ($str = JRequest::getString($hash, '', 'cookie', JREQUEST_ALLOWRAW | JREQUEST_NOTRIM))
			{
				jimport('chola.utilities.simplecrypt');

				//Create the encryption key, apply extra hardening using the user agent string
				$key = JUtility::getHash(@$_SERVER['HTTP_USER_AGENT']);

				$crypt	= new JSimpleCrypt($key);
				$str	= $crypt->decrypt($str);

				$options = array();
				$options['silent'] = true;
				if (!$app->login(@unserialize($str), $options)) {
					$config = JFactory::getConfig();
					$cookie_domain = $config->get('cookie_domain', '');
					$cookie_path = $config->get('cookie_path', '/');
					// Clear the remember me cookie
					setcookie(JUtility::getHash('JLOGIN_REMEMBER'), false, time() - 86400, $cookie_path, $cookie_domain);
				}
			}
		}
	}
}
