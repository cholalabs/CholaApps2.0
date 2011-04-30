<?php
/**
 * @version		$Id: default.php 20411 2011-01-23 06:15:49Z infograf768 $
 * @package		Chola.Administrator
 * @subpackage	mod_quickicon
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$buttons = modQuickIconHelper::getButtons();
?>
<div id="cpanel">
<?php
foreach ($buttons as $button):
	echo modQuickIconHelper::button($button);
endforeach;
?>
</div>
