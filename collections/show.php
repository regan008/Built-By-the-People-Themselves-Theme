<?php
    echo head(array(
        'title' => html_escape($collection->name),
        'bodyid' => 'collections',
        'bodyclass' => 'show',
    ));
?>
<div class="row">
  <div class="large-12 columns">
    <div class="row" id="collection-title">
        <div class="large-12 columns">
            <h1 class="page-header"><?php echo metadata('collection', array('Dublin Core', 'Title')); ?>
                <small><?php echo __('(%d items in collection)', $collection->totalItems()); ?></small>
            </h1>
        </div>
    </div><hr />
    <div class="row">
            <div id="collection-description" class="large-8 columns">
            <div class="element">
            <h4><i class="fa fa-thumb-tack"></i> Description:</h4>
            <?php if ($collection_description = metadata('collection', array('Dublin Core', 'Description'))): ?>
            <div class="lead"><?php echo text_to_paragraphs($collection_description); ?></div>
          <?php else: ?>
            <div class="lead">No description recorded.</div>
            <?php endif; ?>
          </div>
        </div>

    </div>
    <div class="row">
      <?php if ($collectionCreator = metadata($collection,array('Dublin Core','Creator'))): ?>
        <div class="large-3 columns">

            <div class="element">
                <h4><i class="fa fa-user"></i> Creator: </h4>
                <div class="element-text">
                    <p><?php echo $collectionCreator; ?></p>
                </div>

         </div>
         </div>
         <?php endif; ?>
         <?php if ($collectionSubj = metadata($collection,array('Dublin Core','Subject'))): ?>
         <div class="large-3 columns">

             <div class="element">
                 <h4><i class="fa fa-book"></i><?php echo __(' Subject'); ?></h4>
                 <div class="element-text">
                     <p><?php echo $collectionSubj; ?></p>
                 </div>

          </div>
          </div>
           <?php endif; ?>
          <?php if ($collectionDate = metadata($collection,array('Dublin Core','Date'))): ?>
          <div class="large-3 columns">

              <div class="element">
                  <h4><i class="fa fa-calendar"></i> Date: </h4>
                  <div class="element-text">
                      <p><?php echo $collectionDate; ?></p>
                  </div>

           </div>
           </div>
             <?php endif; ?>
    </div><hr>

    <div class="row">
        <?php foreach(loop('items') as $item): ?>
        <div class="large-3 columns">
            <div class="well" style="text-align:center;">
                <div><?php echo link_to_item(item_image('square_thumbnail', array('class' => 'img-rounded img-responsive img-polaroid'))); ?></div>
                <br />
                <p><small><strong><?php echo metadata('item', array('Dublin Core', 'Title')); ?></strong></small></p>
            </div>
        </div>
        <?php endforeach ?>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <p class="view-items-link-browse lead" style="text-align:center"><?php
                echo link_to_items_in_collection(__('Browse all items in the collection'), $collection);
            ?></p>
        </div>
    </div>
    <!-- end collection-description -->
    <div class="row">
        <div class="large-12 columns">
            <?php fire_plugin_hook('public_collection_show'); ?>
        </div>
    </div>
</div>
</div>
<?php echo foot(); ?>
