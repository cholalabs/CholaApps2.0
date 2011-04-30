<?php
/**
 * @version		$Id: default.php 21097 2011-04-07 15:38:03Z dextercowley $
 * @package		Chola.Administrator
 * @subpackage	Templates.hathor
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */

// no direct access
defined('_JEXEC') or die;
?>
<table class="adminlist">
	<thead>
		<tr>
			<th>
				<?php echo JText::_('MOD_POPULAR_ITEMS'); ?>
			</th>
			<th>
				<strong><?php echo JText::_('MOD_POPULAR_CREATED'); ?></strong>
			</th>
			<th>
				<strong><?php echo JText::_('JGLOBAL_HITS');?>
				</strong>
			</th>
		</tr>
	</thead>
<?php if (count($list)) : ?>
	<tbody>
	<?php foreach ($list as $i=>$item) : ?>
		<tr>
			<th>
				<?php if ($item->checked_out) : ?>
						<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time); ?>
				<?php endif; ?>

				<?php if ($item->link) :?>
					<a href="<?php echo $item->link; ?>">
						<?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8');?></a>
				<?php else :
					echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8');
				endif; ?>
			</th>
			<td class="center">
				<?php echo JHtml::_('date',$item->created, 'Y-m-d H:i:s'); ?>
			</td>
			<td class="center">
				<?php echo $item->hits;?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
<?php else : ?>
	<tbody>
		<tr>
			<td colspan="3">
				<p class="noresults"><?php echo JText::_('MOD_POPULAR_NO_MATCHING_RESULTS');?></p>
			</td>
		</tr>
	</tbody>
<?php endif; ?>
</table>
