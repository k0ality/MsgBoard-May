<?php
$cur_page = $paginator->getCurrentPage();
$total_pages = $paginator->getTotalPages();
$pages = $paginator->getPagesNumbers(5);

$prevUrl = $cur_page == 1 ? '#' : $paginator->getUrl($_SERVER['QUERY_STRING'], $cur_page - 1);
$nextUrl = $paginator->isLastPage() ? '#' : $paginator->getUrl($_SERVER['QUERY_STRING'], $cur_page + 1);
?>

<?php if ($total_pages > 1): ?>
    <nav class="container">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="<?=$prevUrl;?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>

            <?php foreach ($pages as $page): ?>
                <li class="page-item <?php if ($page == $paginator->getCurrentPage()): ?>active"<?php endif; ?>">
                <a class="page-link" href="<?=$paginator->getUrl($_SERVER['QUERY_STRING'], $page);?>"><?=$page;?></a>
                </li>
            <?php endforeach; ?>

            <li class="page-item">
                <a class="page-link" href="<?=$nextUrl;?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
<?php endif; ?>
