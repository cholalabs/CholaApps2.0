<?php
/**
 * @version		$Id: default.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Chola.Administrator
 * @subpackage	mod_logged
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;
?>
<table class="adminlist">
	<thead>
		<tr>
			<th>
				<?php
				if($params->get('name', 1)) {
					echo JText::_('MOD_LOGGED_NAME');
				} else {
					echo JText::_('JGLOBAL_USERNAME');
				}; ?>
			</th>
			<th>
				<strong><?php echo JText::_('JCLIENT'); ?></strong>
			</th>
			<th>
				<strong><?php echo JText::_('JGRID_HEADING_ID');?></strong>
			</th>
			<th>
				<strong><?php echo JText::_('MOD_LOGGED_LAST_ACTIVITY');?></strong>
			</th>
			<th>
				<strong><?php echo JText::_('MOD_LOGGED_LOGOUT');?></strong>
			</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user) : ?>
		<tr>
			<td>
				<?php if (isset($user->editLink)) :?>
					<a href="<?php echo $user->editLink; ?>">
						<?php echo $user->name;?></a>
				<?php else :
					echo $user->name;
				endif; ?>
			</td>
			<td class="center">
				<?php
					if($user->client_id) {
						echo JText::_('JADMINISTRATOR');
					} else {
						echo JText::_('JSITE');
					}?>
			</td>
			<td class="center">
				<?php echo $user->id; ?>
			</td>
			<td class="center">
				<?php echo JHtml::_('date', $user->time, 'Y-m-d H:i:s'); ?>
			</td>
			<td class="center">
				<?php if ($user->client_id == 0) :?>
					<a href="<?php echo $user->logoutLink;?>">
						<?php echo JHtml::_('image', 'mod_logged/icon-16-logout.png', JText::_('JLOGOUT'), null, true);?>
					</a>
				<?php endif; ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
