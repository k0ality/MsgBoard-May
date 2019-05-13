<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title><?= $ctrl->getTitle() ?? 'MsgBoard' ?></title>
    <link
        rel="stylesheet"
        href="../../bootstrap/bootstrap.min.css"
    />
    <style>
        .octicon {
            display: inline-block;
            vertical-align: middle;
            fill: currentColor;
            text-decoration: none;
        }
         .form-signin {
             width: 100%;
             max-width: 500px;
             padding: 15px;
             margin: auto;
         }
        .main {
            flex-grow: 1;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<header class="mb-3">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="nav-item nav-link" href="/" title="Home">
                <svg class="octicon align-middle" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16">
                    <path
                        fill-rule="evenodd"
                        d="M16 9l-3-3V2h-2v2L8 1 0 9h2l1 5c0 .55.45 1 1 1h8c.55 0 1-.45 1-1l1-5h2zm-4 5H9v-4H7v4H4L2.81 7.69 8 2.5l5.19 5.19L12 14z"
                    />
                </svg>
            </a>

            <form class="form-inline" action="/search" method="get">

                <input class="form-control form-control-sm mr-sm-2" type="text" name="q" value="<?= $ctrl->getParam('q'); ?>" placeholder="Dive into the abyss?">
                <button class="btn btn-sm btn-primary" name="" type="submit">Search</button>

            </form>

            <div class="nav navbar-nav ml-md-auto">
                <?php if ($user->isGuest()): ?>
                <a class="nav-item nav-link" href="/signup">Signup</a>
                <a class="nav-item nav-link" href="/signin">Login</a>
                <?php else: ?>

                        <a class="nav-item nav-link" href="/post/add">
                            <svg class="octicon" xmlns="http://www.w3.org/2000/svg" width="12" height="16" viewBox="0 0 12 16">
                                <path fill-rule="evenodd" d="M12 9H7v5H5V9H0V7h5V2h2v5h5v2z" />
                            </svg>
                            <span class="align-middle">Add Post</span>
                        </a>

                    <div class="nav-item nav-link">
                    <svg class="octicon" xmlns="http://www.w3.org/2000/svg" width="12" height="16" viewBox="0 0 12 16">
                        <path
                            fill-rule="evenodd"
                            d="M12 14.002a.998.998 0 0 1-.998.998H1.001A1 1 0 0 1 0 13.999V13c0-2.633 4-4 4-4s.229-.409 0-1c-.841-.62-.944-1.59-1-4 .173-2.413 1.867-3 3-3s2.827.586 3 3c-.056 2.41-.159 3.38-1 4-.229.59 0 1 0 1s4 1.367 4 4v1.002z"
                        />
                    </svg>
                    <span class="align-middle"><?=$this->e($user->getUserModel()->name);?></span>
                    </div>

                    <a class="nav-item nav-link" href="/logout"><span class="align-middle">Log out</span></a>
                    <?php endif; ?>
                </a>
            </div>
        </div>
    </nav>
</header>

    <?= $this->section('content'); ?>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <p class="text-muted text-center">
            <a href="https://github.com/k0ality">
                <svg class="octicon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                    <path
                        fill-rule="evenodd"
                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"
                    />
                </svg>
                <span class="align-middle">Maryna</span>
            </a>
        </p>
    </div>
</footer>
</body>
</html>
