<?php
/**
 * @version		$Id: clicks.php 21097 2011-04-07 15:38:03Z dextercowley $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

jimport('chola.form.formfield');

/**
 * Clicks Field class for the Chola Framework.
 *
 * @package		Chola.Administrator
 * @subpackage	com_banners
 * @since		1.6
 */
class JFormFieldClicks extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'Clicks';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput()
	{
		$onclick	= ' onclick="document.id(\''.$this->id.'\').value=\'0\';"';

		return '<input style="border:0;" type="text" name="'.$this->name.'" id="'.$this->id.'" value="'.htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8').'" readonly="readonly" /><input type="button"'.$onclick.' value="'.JText::_('COM_BANNERS_RESET_CLICKS').'" class="button"/>';
	}
}
