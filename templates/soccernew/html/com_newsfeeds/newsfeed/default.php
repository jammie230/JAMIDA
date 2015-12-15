<?php if (!defined('_JEXEC')) exit('Restricted access'); // no direct access
require_once dirname(__FILE__) . DS . '..' . DS . '..' . DS . '..' . DS . 'functions.php'; ?>
<div style="direction: <?php echo $this->newsfeed->rtl ? 'rtl' :'ltr'; ?>; text-align: <?php echo $this->newsfeed->rtl ? 'right' :'left'; ?>">
<?php ob_start(); ?>
<table width="100%" class="contentpane<?php echo $this->params->get('pageclass_sfx'); ?>">
<tr>
	<td class="contentheading<?php echo $this->params->get('pageclass_sfx'); ?>">
		<a href="<?php echo $this->newsfeed->channel['link']; ?>" target="_blank">
			<?php echo str_replace('&apos;', "'", $this->newsfeed->channel['title']); ?></a>
	</td>
</tr>
<?php if ( $this->params->get( 'show_feed_description' ) ) : ?>
<tr>
	<td>
		<?php echo str_replace('&apos;', "'", $this->newsfeed->channel['description']); ?>
		<br />
		<br />
	</td>
</tr>
<?php endif; ?>
<?php if ( isset($this->newsfeed->image['url']) && isset($this->newsfeed->image['title']) && $this->params->get( 'show_feed_image' ) ) : ?>
<tr>
	<td>
		<img src="<?php echo $this->newsfeed->image['url']; ?>" alt="<?php echo $this->newsfeed->image['title']; ?>" />
	</td>
</tr>
<?php endif; ?>
<tr>
	<td>
		<ul>
		<?php foreach ( $this->newsfeed->items as $item ) :  ?>
			<li>
			<?php if ( !is_null( $item->get_link() ) ) : ?>
				<a href="<?php echo $item->get_link(); ?>" target="_blank">
					<?php echo $item->get_title(); ?></a>
			<?php endif; ?>
			<?php if ( $this->params->get( 'show_item_description' ) && $item->get_description()) : ?>
				<br />
				<?php $text = $this->limitText($item->get_description(), $this->params->get( 'feed_word_count' ));
					echo str_replace('&apos;', "'", $text);
				?>
				<br />
				<br />
			<?php endif; ?>
			</li>
		<?php endforeach; ?>
		</ul>
	</td>
</tr>
</table>
<?php echo artxPost(artxPageTitle($this), ob_get_clean()); ?>
</div>
