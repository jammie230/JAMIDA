<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
/*
 * Module chrome for rendering the module in a slider
 */
function modChrome_submenu($module, &$params, &$attribs)
{
	global $Itemid;
	
	$start	= $params->get('startLevel');
	
	$tabmenu = &JSite::getMenu();
	$item = $tabmenu->getItem($Itemid);
	
	$tparent = $tabmenu->getItem($item->parent);
	
    if (isset($tparent->parent)) {
    	while ($tparent->parent != 0) {
    		if ($item->sublevel == $start-1) break;
    		$item = $tabmenu->getItem($item->parent);
			$tparent = $tabmenu->getItem($item->parent);
    	}
    	if (!empty ($module->content) && strlen($module->content) > 40) { ?>
    		<div class="module-menu"><div><div><div>
    			<h3><?php echo $item->name; ?> Menu</h3>
    			<?php echo $module->content; ?>
    		</div></div></div></div>
    	<?php 
	    }
    }
}
?>