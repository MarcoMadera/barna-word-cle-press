<?php get_header(); ?>

<main class="container my-3">
  <?php if(have_posts()){
    while(have_posts()){
      the_post(); ?>
    <div class="row">
      <div class="col-9">
        <h1 class="my-3"><?php the_title(); ?></h1>
        <?php the_post_thumbnail('medium_large')?>
        <?php the_content(); ?>
      </div>
    </div>

  <?php
}
  }?>
</main>

<?php get_footer(); ?>