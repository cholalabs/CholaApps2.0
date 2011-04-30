<?php
/**
 * @version		$Id: view.html.php 20196 2011-01-09 02:40:25Z ian $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('chola.application.component.view');

/**
 * HTML View class for the WebLinks component
 *
 * @package		Chola.Site
 * @subpackage	com_weblinks
 * @since		1.5
 */
class WeblinksViewWeblink extends JView
{
	protected $state;
	protected $item;

	function display($tpl = null)
	{
		$app		= JFactory::getApplication();
		$params		= $app->getParams();

		// Get some data from the models
		$state		= $this->get('State');
		$item		= $this->get('Item');
		$category	= $this->get('Category');

		if ($this->getLayout() == 'edit') {
			$this->_displayEdit($tpl);
			return;
		}

		if ($item->url) {
			// redirects to url if matching id found
			$app->redirect($item->url);
		} else {
			//TODO create proper error handling
			$app->redirect(JRoute::_('index.php'), JText::_('COM_WEBLINKS_ERROR_WEBLINK_NOT_FOUND'), 'notice');
		}
	}
}