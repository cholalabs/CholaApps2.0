<?php
/**
 * @version		$Id: language.php 21097 2011-04-07 15:38:03Z dextercowley $
 * @package		Chola.Installation
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

jimport('chola.html.html');
jimport('chola.language.helper');
jimport('chola.form.formfield');
JLoader::register('JFormFieldList', JPATH_LIBRARIES.'/chola/form/fields/list.php');

/**
 * Language Form Field class.
 *
 * @package		Chola.Installation
 * @since		1.6
 */
class JFormFieldLanguage extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'Language';

	/**
	 * Method to get the field options.
	 *
	 * @return	array	The field option objects.
	 * @since	1.6
	 */
	protected function getOptions()
	{
		// Initialise variables.
		$app = JFactory::getApplication();

		// Detect the native language.
		$native = JLanguageHelper::detectLanguage();
		if (empty($native)) {
			$native = 'en-GB';
		}

	// Get a forced language if it exists.
		$forced = $app->getLocalise();
		if (!empty($forced['language'])) {
			$native = $forced['language'];
		}

		// If a language is already set in the session, use this instead
		$session = JFactory::getSession()->get('setup.options', array());
		if(!empty($session['language'])){
			$native = $session['language'];
		}

		// Get the list of available languages.
		$options = JLanguageHelper::createLanguageList($native);
		if (!$options || JError::isError($options)) {
			$options = array();
		}

		// Set the default value from the native language.
		$this->value = $native;

		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
