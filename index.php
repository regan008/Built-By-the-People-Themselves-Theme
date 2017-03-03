<?php
head();
?>


<?php
echo head(array(
    'bodyid' => 'home',
    'bodyclass' => 'two-col'
));
?>
<div class="row">
  <div class="large- columns text-center headerimg">
    <h3>A Digital Exploration of Community Building in Arlington County, Virginia</h3>
  </div>
</div>

<div class="row">
<div class="large-8 columns">





    <p>"Built by the People Themselves" explores the processes of community development and suburbanization in Arlington County, Virginia. Arlington is a small county located in northern Virginia, just across the Potomac River from Washington, D.C.</p>

    <p>This site is a piece of my doctoral dissertation from George Mason University. Together these works trace the strategies black Arlingtonians used to create lasting communities that met their own needs and reflected their own preferences when possible within the context of white domination in a Jim Crow society. Since its earliest suburban development, Arlington was made up of diverse neighborhoods, each with divergent, competing visions for the area’s future.</p>

    <p>My exploration of the process of creating and defending communities within the suburban environment will analyze how the physical environment of Arlington reflected racial tensions, as competitions over race, space, and aesthetics literally built a physical manifestation of a county divided under Jim Crow. This study tracks the roles of the government, community institutions, and planning.</p>


</div>

<div class="large-4 columns">
<img height=200 src="http://localhost:8888/BBPT/files/original/aa690c3769514d1958bfe42b014cad79.jpg">
</div>
</div>





  <?php $featuredExhibit = exhibit_builder_random_featured_exhibit(); ?>
  <?php $featuredExhibitId = $featuredExhibit->id; ?>
  <?php $featuredExhibitItem = get_records('Item', array('exhibit' => $featuredExhibitId, 'random' => true, 'has files' => true), 1); ?>
  <?php $featuredExhibitImage = get_db()->getTable('File')->findWithImages($featuredExhibitItem[0]->id, 0); ?>
<div class="row" data-equalizer>
  <div class="large-6 columns" >
    <div class="row">
  <div id="featured-question" class="featured large-6 columns" data-equalizer-watch style="background-image:url('<?php echo file_display_url($featuredExhibitImage, 'fullsize'); ?>')">
      <h3 class="feat-exhibit-title text-center">
          <?php echo $featuredExhibit->title; ?>
      </h3>
    </div>
    <div class="large-6 columns" data-equalizer-watch>
      <p><?php echo snippet($featuredExhibit->description, 0, 200); ?></p>
      <p class="jump-link"><?php echo exhibit_builder_link_to_exhibit($featuredExhibit, 'Read More', array('class' => 'button')); ?></p>
    </div>
  </div>
</div>
<?php $featuredPeople = get_records('Item', array(
             'featured' => 1,
             'sort_field' => 'random',
             'hasImage' => true ), 1);
       ?>

       <?php if (count($featuredPeople) > 0): ?>
       <?php $featuredPerson = $featuredPeople[0]; ?>
       <?php $featuredPersonFile = get_db()->getTable('File')->findWithImages($featuredPerson->id, 0); ?>

  <div class="large-6 columns" >
  <div class="row">
    <div id="featured-question" class="featured large-6 columns"  data-equalizer-watch style="background-image:url('<?php echo file_display_url($featuredPersonFile, 'thumbnail'); ?>')">
      <h3 class="feat-exhibit-title text-center">
          <?php echo metadata($featuredPerson, array('Dublin Core', 'Title')); ?>
      </h3>
    </div>
    <div class="large-6 columns" data-equalizer-watch>
      <p><?php echo snippet(metadata($featuredPerson, array('Dublin Core', 'Description')), 0, 200); ?></p>
      <p class="jump-link"><?php echo link_to_item('Read More', array('class' => 'button'), 'show', $featuredPerson); ?></p>
    </div>
</div>
</div>
<?php endif; ?>


</div><!-- end primary -->

<div class="row" data-equalizer>
  <?php $featuredcollection = get_records('Collection', array(
               'featured' => 1,
               'sort_field' => 'random',
               'hasImage' => true ), 1);
         ?>

         <?php if (count($featuredcollection) > 0): ?>
         <?php $featuredcollection = $featuredcollection[0]; ?>
         <?php $featuredcollectionFile = get_db()->getTable('File')->findWithImages($featuredcollection->id, 0); ?>

    <div class="large-6 columns" >
    <div class="row">
      <div id="featured-question" class="featured large-6 columns"  data-equalizer-watch style="background-image:url('<?php echo file_display_url($featuredcollectionFile, 'fullsize'); ?>')">
        <h3 class="feat-exhibit-title text-center">
            <?php echo metadata($featuredcollection, array('Dublin Core', 'Title')); ?>
        </h3>
      </div>
      <div class="large-6 columns" data-equalizer-watch>
        <p><?php echo snippet(metadata($featuredcollection, array('Dublin Core', 'Description')), 0, 200); ?></p>
        <p class="jump-link"><?php echo link_to_item('Read More', array('class' => 'button'), 'show', $featuredcollection); ?></p>
      </div>
  </div>
  </div>
  <?php endif; ?>
  <div class="large-6 columns">
  <div class="row">
    <div class="large-12 columns" data-equalizer-watch>
    <div class="homepage-map">
    <?php  echo $this->shortcodes('[geolocation height=250px]'); ?>
    </div>
  </div>
  </div>
</div>

</div>


<footer>
<?php
echo foot();
?></footer>
