<?php
/**
 * @version		$Id: mod_syndicate.php 20806 2011-02-21 19:44:59Z dextercowley $
 * @package		Chola.Site
 * @subpackage	mod_syndicate
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$params->def('text', 'Feed Entries');
$params->def('format', 'rss');

$link = modSyndicateHelper::getLink($params);

if (is_null($link)) {
	return;
}

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

$text = htmlspecialchars($params->get('text'));

require JModuleHelper::getLayoutPath('mod_syndicate', $params->get('layout', 'default'));
