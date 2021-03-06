<?php
/**
 * @version		$Id: mod_related_items.php 20806 2011-02-21 19:44:59Z dextercowley $
 * @package		Chola.Site
 * @subpackage	mod_related_items
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$cacheparams = new stdClass;
$cacheparams->cachemode = 'safeuri';
$cacheparams->class = 'modRelatedItemsHelper';
$cacheparams->method = 'getList';
$cacheparams->methodparams = $params;
$cacheparams->modeparams = array('id'=>'int','Itemid'=>'int');

$list = JModuleHelper::moduleCache ($module, $params, $cacheparams);

if (!count($list)) {
	return;
}

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$showDate = $params->get('showDate', 0);

require JModuleHelper::getLayoutPath('mod_related_items', $params->get('layout', 'default'));
