<?php
/**
 * @version		$Id: sessionhandler.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Chola.Framework
 * @subpackage	Form
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

jimport('chola.html.html');
jimport('chola.session.session');
jimport('chola.form.formfield');
jimport('chola.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * Form Field class for the Chola Framework.
 *
 * @package		Chola.Framework
 * @subpackage	Form
 * @since		1.6
 */
class JFormFieldSessionHandler extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'SessionHandler';

	/**
	 * Method to get the field options.
	 *
	 * @return	array	The field option objects.
	 * @since	1.6
	 */
	protected function getOptions()
	{
		// Initialize variables.
		$options = array();

		// Get the options from JSession.
		foreach (JSession::getStores() as $store) {
			$options[] = JHtml::_('select.option', $store, JText::_('JLIB_FORM_VALUE_SESSION_'.$store), 'value', 'text');
		}

		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}