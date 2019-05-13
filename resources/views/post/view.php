<?php
$this->layout('layout');
$author = $post->getRelation('author');
$userModel = $user->getUserModel();

$isLiked = $userModel->hasLikedPost($post);
$likeUrl = $isLiked ? '&removed=1' : '';
?>

<main>
    <div class="container">
        <div class="card mb-3">
            <div class="card-body">
                <a class="card-subtitle mb-2 text-dark" href="/post/view?id=<?=$this->e($post->id);?>">
                    <h5 class="card-title"><?=$this->e($post->title);?></h5>
                </a>
                <h6 class="text-muted">By <?=$this->e($author->name);?>
                    <span>|</span>
                    <?=$this->e($post->dt_add);?>
                </h6>
                <p class="card-text"><?=$this->e($post->description);?></p>
            </div>
            <div class="card-footer text-muted">
                <span class="align-middle">Likes: <?=$post->like_count;?></span>
                <?php if (!$user->isGuest()): ?>
                    <a class="ml-1" href="/post/like?id=<?=$post->id;?><?=$likeUrl;?>">[+]</a>
                <?php endif; ?>
                <span class="align-middle ml-5">Views: <?=$post->show_count; ?> </span>
            </div>
        </div>
    </div>
</main>
