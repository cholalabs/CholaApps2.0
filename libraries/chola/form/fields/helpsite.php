<?php
/**
 * @version		$Id: helpsite.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Chola.Framework
 * @subpackage	Form
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

jimport('chola.html.html');
jimport('chola.language.help');
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
class JFormFieldHelpsite extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	public $type = 'Helpsite';

	/**
	 * Method to get the field options.
	 *
	 * @return	array	The field option objects.
	 * @since	1.6
	 */
	protected function getOptions()
	{
		// Get Chola version.
		$version = new JVersion();
		$jver = explode( '.', $version->getShortVersion() );

		// Merge any additional options in the XML definition.
		$options = array_merge(
			parent::getOptions(),
			JHelp::createSiteList(JPATH_ADMINISTRATOR.'/help/helpsites-'.$jver[0].$jver[1].'.xml', $this->value)
		);

		return $options;
	}
}