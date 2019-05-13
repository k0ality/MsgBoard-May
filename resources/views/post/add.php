<?php
$this->layout('layout');
$f = $form;
?>

<main class="main d-flex flex-column">
    <form class="form-signin" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Add post</h1>

        <?php if (!$f->isValid()): ?>
            <div>
                <p>Please check the fields:</p>
                <ul>
                    <?php foreach ($f->getAllErrors() as $field => $error): ?>
                        <li><strong><?=$f->getLabelFor($field);?>:</strong> <?=$error;?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div>
            <label for="title" class="sr-only">Post title</label>
            <input type="text" name="post[title]" id="title"
                   class="form-control mb-3 <?php if ($f->getError('title')): ?>is-invalid<?php endif; ?>"
                   value="<?=$f->title;?>" placeholder="Title" required="" autofocus="" />
            <?php if ($err = $f->getError('title')): ?>
                <div class="invalid-feedback"><?=$err;?></div>
            <?php endif; ?>
        </div>

        <div>
            <label for="description" class="sr-only">Post title</label>
            <textarea rows="5" name="post[description]" id="description"
                      class="form-control mb-3 <?php if ($f->getError('description')): ?>is-invalid<?php endif; ?>"
                      placeholder="What's on your mind?"><?=$f->description;?></textarea>
            <?php if ($err = $f->getError('description')): ?>
                <div class="invalid-feedback"><?=$err;?></div>
            <?php endif; ?>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Publish</button>
    </form>
</main>
