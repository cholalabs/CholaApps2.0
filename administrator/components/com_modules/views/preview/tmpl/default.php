<?php
/**
 * @version		$Id: default.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Chola.Administrator
 * @subpackage	com_modules
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>

<script>
var form = window.top.document.adminForm
var title = form.title.value;

var alltext = window.top.<?php echo $this->editor->getContent('text') ?>;
</script>

<table class="center" width="90%">
	<tr>
		<td class="contentheading" colspan="2"><script>document.write(title);</script></td>
	</tr>
<tr>
	<td valign="top" height="90%" colspan="2">
		<script>document.write(alltext);</script>
	</td>
</tr>
</table>
