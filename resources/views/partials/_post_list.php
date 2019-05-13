<ul class="container">
    <?php foreach ($paginator->getItems() as $post) : ?>
    <li class="card mb-3">
        <div class="card-body">
            <a class="card-subtitle mb-2 text-dark" href="/post/view?id=<?=$this->e($post->id);?>">
                <h5 class="card-title"><?=$this->e($post->title);?></h5>
            </a>
            <h6 class="text-muted">By <?=$this->e($post->authorName);?>
                <span>|</span>
                <?=$this->e($post->dt_add);?>
            </h6>
            <p class="card-text"><?=$this->e($post->description);?></p>
        </div>
        <div class="card-footer text-muted">
            <span class="align-middle">Likes: <?=$post->like_count;?></span>
            <span class="align-middle ml-5">Views: <?=$post->show_count; ?> </span>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
