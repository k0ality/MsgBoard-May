<?php $this->layout('layout'); ?>

<?php if(empty($paginator->getItems())): ?>
    <div class="container mb-3">
        <p>Sorry, but nothing matched your search criteria.<br>Please try again with some different keywords.</p>
    </div>
<?php else: ?>
    <div class="container mb-3">
        <?php $this->insert('partials/_post_list', ['paginator' => $paginator]); ?>
        <?php $this->insert('partials/_pagination', ['paginator' => $paginator]); ?>
    </div>
<?php endif; ?>
