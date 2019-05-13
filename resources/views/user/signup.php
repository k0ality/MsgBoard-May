<?php $this->layout('layout');
$f = $form;
?>

<main class="main d-flex flex-column">
    <form class="form-signin" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Create an account</h1>

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
            <label for="nickname" class="sr-only">Name</label>
            <input type="text" name="signup[name]" id="nickname"
                   class="form-control mb-3 <?php if ($f->getError('name')): ?>is-invalid<?php endif; ?>"
                   value="<?=$this->e($f->name);?>" placeholder="Jane Doe" autofocus="">
            <?php if ($err = $f->getError('name')): ?>
                <div class="invalid-feedback"><?=$err;?></div>
            <?php endif; ?>
        </div>

        <div>
            <label for="email" class="sr-only">Email address</label>
            <input type="email" name="signup[email]" id="email"
                   class="form-control mb-3 <?php if ($f->getError('email')): ?>is-invalid<?php endif; ?>"
                   value="<?=$f->email;?>" placeholder="Email address" required="" />
            <?php if ($err = $f->getError('email')): ?>
                <div class="invalid-feedback"><?=$err;?></div>
            <?php endif; ?>
        </div>

        <div>
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="signup[password]" id="password"
                   class="form-control mb-3 <?php if ($f->getError('email')): ?>is-invalid<?php endif; ?>"
                   placeholder="Password" required="" />
            <?php if ($err = $f->getError('password')): ?>
                <div class="invalid-feedback"><?=$err;?></div>
            <?php endif; ?>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>

    </form>
</main>
