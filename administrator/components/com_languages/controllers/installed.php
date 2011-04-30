<?php
/**
 * @version		$Id: installed.php 20196 2011-01-09 02:40:25Z ian $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Cholapps
defined('_JEXEC') or die;

/**
 * Languages Controller
 *
 * @package		Chola.Administrator
 * @subpackage	com_languages
 * @since		1.5
 */
class LanguagesControllerInstalled extends JController
{
	/**
	 * task to set the default language
	 */
	function setDefault()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit(JText::_('JInvalid_Token'));
		$cid = JRequest::getCmd('cid', '');
		$model = $this->getModel('installed');
		if ($model->publish($cid))
		{
			$msg = JText::_('COM_LANGUAGES_MSG_DEFAULT_LANGUAGE_SAVED');
			$type = 'message';
		}
		else
		{
			$msg = $this->getError();
			$type = 'error';
		}
		$client = $model->getClient();
		$this->setredirect('index.php?option=com_languages&view=installed',$msg,$type);
	}
}
