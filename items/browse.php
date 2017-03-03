<?php
$pageTitle = __('Browse Items');
echo head(array(
    'title' => $pageTitle,
    'bodyclass' => 'items browse',
));
?>
<!-- <div id="primary"> -->
    <div class="row">
        <div class="large-12 medium-12 columns ">
            <div class="page-header">
                <h1><?php echo $pageTitle;?> <small><?php echo __('(%s items total)', $total_results); ?></small></h1>
            </div>
        </div>
    </div>
    <div class="nav nav-tabs" id="secondary-nav">
        <?php echo public_nav_items()->setUlClass('menu'); ?>
    </div>
    <div id="pagination-top" class="pagination pagination-centered">
        <?php echo pagination_links(); ?>
    </div>

<?php foreach(loop('items') as $item): ?>
<div class="item row">
    <div class="large-12 columns col-md-12">
        <div class="row">

            <div class="large-7 columns">
                <div class="item-title">
                    <h3><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class' => 'permalink')); ?></h3>
                </div>
                <?php if ($text = metadata('item', array('Item Type Metadata', 'Text'))): ?>
                <div class="item-description">
                    <p><?php echo $text; ?></p>
                </div>
                <?php elseif ($description = metadata('item',array('Dublin Core', 'Description'))): ?>
                <div class="item-description">
                    <?php echo $description; ?>
                </div>
                <?php endif; ?>
                <br>
                <?php if (get_collection_for_item($item)): ?>
                <div><strong><?php echo __('Collection: '); ?></strong><?php echo link_to_collection_for_item(); ?></div>
                <?php endif; ?>
                <!-- <div>
                    <h5>Citation</h5>
                    <p class="citation"><?php //echo item_citation(); ?></p>
                </div> -->
            </div>
            <div class="large-3 columns">
                <?php if (metadata($item,'has tags')): ?>
                <div class="browse-items-tags well well-sm">
                    <p><i class="fa fa-tag"></i> <strong><?php echo __('Tags'); ?></strong></p>
                    <?php echo tag_string($item); ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="large-2 columns">
            <?php if (metadata($item, 'has thumbnail')): ?>
                <div class="item-img">
                    <?php echo link_to_item(item_image('square_thumbnail', array(), 0, $item), array('class' => 'item-thumbnail'), 'show', $item); ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
        <hr />
    </div>
</div>
<?php fire_plugin_hook('public_items_browse_each', array('view'  =>  $this, 'item' => $item)); ?>
<?php endforeach; ?>

    <div id="pagination-bottom" class="pagination pagination-centered">
        <?php echo pagination_links(); ?>
    </div>
    <?php fire_plugin_hook('public_items_browse', array('items' => $items, 'view' => $this)); ?>
<!-- </div>end primary -->
<?php echo foot(); ?>
