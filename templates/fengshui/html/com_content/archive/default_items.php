<?php if (!defined('_JEXEC')) exit('Restricted access'); // no direct access ?>
<?php if (0 != count($this->items)) : ?>
<ul id="archive-list">
<?php foreach ($this->items as $item) : ?>
	<li class="row<?php echo ($item->odd + 1); ?>">
		<h4 class="contentheading"><a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug)); ?>"><?php echo $this->escape($item->title); ?></a></h4>
		<?php if (($this->params->get('show_section') && $item->sectionid && isset($item->section)) || ($this->params->get('show_category') && $item->catid)) : ?>
			<div>
			<?php if ($this->params->get('show_section') && $item->sectionid && isset($item->section)) : ?>
				<span>
				<?php if ($this->params->get('link_section')) : ?>
					<?php echo '<a href="' . JRoute::_(ContentHelperRoute::getSectionRoute($item->sectionid)) . '">' . $item->section . '</a>'; ?>
				<?php else : ?>
					<?php echo $item->section; ?>
				<?php endif; ?>
				<?php if ($this->params->get('show_category') && $item->catid) : ?> - <?php endif; ?>
				</span>
			<?php endif; ?>
			<?php if ($this->params->get('show_category') && $item->catid) : ?>
				<span>
				<?php if ($this->params->get('link_category')) : ?>
					<?php echo '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug, $item->sectionid)) . '">' . $item->category . '</a>'; ?>
				<?php else : ?>
					<?php echo $item->category; ?>
				<?php endif; ?>
				</span>
			<?php endif; ?>
			</div>
		<?php endif; ?>
		<h5 class="metadata">
			<?php if ($this->params->get('show_create_date')) : ?>
			<span class="created-date">
				<?php echo JText::_('Created') . ': '.  JHTML::_('date', $item->created, JText::_('DATE_FORMAT_LC2')); ?>
			</span>
			<?php endif; ?>
			<?php if ($this->params->get('show_author')) : ?>
			<span class="author">
				<?php echo JText::_('Author') . ': ' . ($item->created_by_alias ? $item->created_by_alias : $item->author); ?>
			</span>
			<?php endif; ?>
		</h5>
		<?php $intro = substr(strip_tags($item->introtext), 0, 255); ?>
		<?php if (strlen($intro) > 0) : ?>
		<div class="intro"><?php echo $intro; ?>...</div>
		<?php endif; ?>
	</li>
<?php endforeach; ?>
</ul>
<?php $paginationPagesLinks = trim($this->pagination->getPagesLinks());
$paginationPagesCounter = trim($this->pagination->getPagesCounter()); ?>
<?php if (strlen($paginationPagesLinks) > 0 || strlen($paginationPagesCounter) > 0) : ?>
<div id="navigation">
	<?php if (strlen($paginationPagesLinks) > 0) : ?><p><?php echo $paginationPagesLinks; ?></p><?php endif; ?>
	<?php if (strlen($paginationPagesCounter) > 0) : ?><p><?php echo $paginationPagesCounter; ?></p><?php endif; ?>
</div>
<?php endif; ?>
<?php endif; ?>
