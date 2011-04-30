<?php
/**
 * @version		$Id: client.php 20196 2011-01-09 02:40:25Z ian $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('chola.application.component.controllerform');

/**
 * Client controller class.
 *
 * @package		Chola.Administrator
 * @subpackage	com_banners
 * @since		1.6
 */
class BannersControllerClient extends JControllerForm
{
	/**
	 * @var		string	The prefix to use with controller messages.
	 * @since	1.6
	 */
	protected $text_prefix = 'COM_BANNERS_CLIENT';
}