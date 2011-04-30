<?php
/**
 * @version		$Id: search.php 20266 2011-01-11 02:31:44Z dextercowley $
 * @package		Chola.Administrator
 * @subpackage	com_installer
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License, see LICENSE.php
 */

// No direct access.
defined('_JEXEC') or die;

jimport('chola.form.formfield');

/**
 * Form Field Search class.
 *
 * @package		Chola.Administrator
 * @subpackage	com_installer
 * @since		1.6
 */
class JFormFieldSearch extends JFormField
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Search';

	/**
	 * Method to get the field input.
	 *
	 * @return	string		The field input.
	 * @since	1.6
	 */
	protected function getInput()
	{
		$html = '';
		$html.= '<input type="text" name="' . $this->name . '" id="' . $this->id . '" value="' . htmlspecialchars($this->value) . '" title="' . JText::_('JSEARCH_FILTER') . '" onchange="this.form.submit();" />';
		$html.= '<button type="submit" class="btn">' . JText::_('JSEARCH_FILTER_SUBMIT') . '</button>';
		$html.= '<button type="button" class="btn" onclick="document.id(\'' . $this->id . '\').value=\'\';this.form.submit();">' . JText::_('JSEARCH_FILTER_CLEAR') . '</button>';
		return $html;
	}
}