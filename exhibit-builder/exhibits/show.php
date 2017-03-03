<?php echo head(array(
      'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
      'bodyclass' => 'exhibits show',
  ));
  ?>

<div class="row">

<div class="large-12 columns">

<h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></span></h1>
<div class="large-9 columns">



    <?php exhibit_builder_render_exhibit_page(); ?>

</div>
<div class="large-3 columns">
<nav id="exhibit-pages">
    <?php echo exhibit_builder_page_nav(); ?>
</nav>
</div>



</div> <!-- close row -->


<div class="large-12 columns">

      <ul class="pagination" role="navigation" aria-label="Pagination">
        <div class="medium-6 columns" >
           <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
          <li style="float: left;" class="pagination-previous"><?php echo $prevLink; ?></li>
        <?php endif; ?>
        </div>
          <div class="medium-6 columns" >
            <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
          <li style="float:right;" id="pagination-next"><?php echo $nextLink; ?></li>
        <?php endif; ?>
        </div>
      </ul>
</div>

</div> <!-- close large-12 -->
<?php echo foot(); ?>
