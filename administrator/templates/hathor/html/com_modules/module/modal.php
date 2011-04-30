<?php
/**
 * @version		$Id: modal.php 19089 2010-10-12 09:06:57Z infograf768 $
 * @package		Chola.Administrator
 * @subpackage	Templates.hathor
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;
?>
<div class="fltrt">
	<button type="button" onclick="Chola.submitbutton('module.save');">
		<?php echo JText::_('JSAVE');?></button>
	<button type="button" onclick="window.parent.SqueezeBox.close();">
		<?php echo JText::_('JCANCEL');?></button>
</div>
<div class="clr"></div>

<?php 
$this->setLayout('edit');
echo $this->loadTemplate();