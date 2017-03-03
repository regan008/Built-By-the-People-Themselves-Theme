<?php
$title = __('Browse Collections');
echo head(array(
    'title' => $title,
    'bodyclass' => 'collections browse',
)); ?>
<div class="row">
    <div class="large-12 columns">
      <div class="page-header">
        <h1><?php echo $title; ?></h1>
      </div>
      <?php if ($pagination_links = pagination_links()): ?>

      <div id="pagination-top" class="pagination pagination-centered">
          <?php echo pagination_links(); ?>
      </div>

      <?php endif; ?>
</div>
</div>

<div class="row">
  <div class="large-12 columns">
    <?php foreach(loop('collections') as $collection): ?>
      <div class="row"><hr />
          <div class="large-4 columns">
            <h2><?php echo link_to_collection(); ?></h2>
            <p class="view-items-link-browse"><?php echo link_to_items_in_collection($text = 'View the items in this collection'); ?></p>
          </div>
          <div class="large-5 columns">
                  <div class="collection-description">
                      <?php echo text_to_paragraphs(metadata('collection', array('Dublin Core', 'Description'), array('snippet' => 150))); ?>
                  </div>
          </div>
          <div class="large-3 columns">
            <?php if ($collectionImage = record_image('collection', 'square_thumbnail')): ?>
                <?php echo link_to_collection($collectionImage, array('class' => 'image')); ?>
            <?php endif; ?>
          </div>
        </div>


    <?php endforeach; ?>

  </div>
</div>
