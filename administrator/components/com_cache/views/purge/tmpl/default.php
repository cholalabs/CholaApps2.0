<?php
/**
 * @version		$Id: default.php 21020 2011-03-27 06:52:01Z infograf768 $
 * @package		Chola.Administrator
 * @subpackage	com_cache
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>

<form action="<?php echo JRoute::_('index.php?option=com_cache'); ?>" method="post" name="adminForm" id="adminForm">
<table class="adminlist">
	<thead>
		<tr>
			<th>
				<?php echo JText::_('COM_CACHE_PURGE_EXPIRED_ITEMS'); ?>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
			<p class="mod-purge-instruct"><?php echo JText::_('COM_CACHE_PURGE_INSTRUCTIONS'); ?></p>
			<p class="warning"><?php echo JText::_('COM_CACHE_RESOURCE_INTENSIVE_WARNING'); ?></p>
			</td>
		</tr>
	</tbody>
</table>

<div>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</div>
</form>