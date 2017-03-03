<?php
$title = __('Browse Exhibits');
echo head(array(
    'title' => $title,
    'bodyclass' => 'exhibits browse',
));
?>
<div class="row">
  <div class="large-12 columns">
<h1><?php echo $title; ?> <?php echo __('(%s total)', $total_results); ?></h1>
<?php if (count($exhibits) > 0): ?>
<nav class="navigation" id="secondary-nav">
    <?php echo nav(array(
        array(
            'label' => __('Browse All'),
            'uri' => url('exhibits'),
        ),
        array(
            'label' => __('Browse by Tag'),
            'uri' => url('exhibits/tags'),
        ),
    )); ?>
</nav>
<hr>

<?php echo $pagination_links = pagination_links(); ?>

<?php $exhibitCount = 0; ?>
<?php foreach (loop('exhibit') as $exhibit): ?>
    <?php $exhibitCount++; ?>
    <div class="row">
    <div class="exhibit large-12 columns <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
        <div class="row">
          <div class="large-12 columns">
        <h2><?php echo link_to_exhibit(); ?></h2>
      </div>
    </div>
    <div class="row">
        <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>

        <div class="large-9 columns description"><?php echo $exhibitDescription; ?></div>

        <?php endif; ?>

        <?php if ($exhibitImage = record_image('exhibit', 'square_thumbnail')): ?>

            <div class="large-3 columns">
                <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
            </div>

          <?php endif; ?>
        </div>
        <div class="row">
          <div class="large-12 columns">
        <?php if ($exhibitTags = tag_string('exhibit', 'exhibits')): ?>
        <p class="tags"><?php echo $exhibitTags; ?></p>
        <?php endif; ?>
        <hr>
      </div>
    </div>
    </div>

    </div>
<?php endforeach; ?>

<?php echo $pagination_links; ?>

<?php else: ?>
<p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>
</div>
</div>
<?php echo foot(); ?>
