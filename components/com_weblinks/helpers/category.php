<?php
/**
 * @version		$Id: category.php 21097 2011-04-07 15:38:03Z dextercowley $
 * @package		Chola.Site
 * @subpackage	com_weblinks
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Component Helper
jimport('chola.application.component.helper');
jimport('chola.application.categories');

/**
 * Weblinks Component Category Tree
 *
 * @static
 * @package		Chola.Site
 * @subpackage	com_weblinks
 * @since 1.6
 */
class WeblinksCategories extends JCategories
{
	public function __construct($options = array())
	{
		$options['table'] = '#__weblinks';
		$options['extension'] = 'com_weblinks';
		parent::__construct($options);
	}
}
