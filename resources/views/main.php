<?php $this->layout('layout'); ?>

<main>
    <div class="container mb-3">
        <nav class="filter">
            <span>Sort by: </span>
            <a class="filter__item <?php if ($ctrl->getParam('tab', 'top') == 'top'): ?>filter__item--active<?php endif;?>"
           href="/">Most Viewed</a>
            <span>|</span>
            <a class="filter__item <?php if ($ctrl->getParam('tab') == 'new'): ?>filter__item--active<?php endif;?>"
           href="/?tab=new">Recent</a>
        </nav>
    </div>

    <?php $this->insert('partials/_post_list', ['paginator' => $paginator]); ?>
    <?php $this->insert('partials/_pagination', ['paginator' => $paginator]); ?>

</main>
