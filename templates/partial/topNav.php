<?php
/**
 * Renders the top navigation recursively.
 *
 * @link      https://github.com/prooph/bookdown-template for the canonical source repository
 * @license   https://github.com/prooph/bookdown-template/blob/master/LICENSE.txt New BSD License
 */

/* @var \Bookdown\Bookdown\Content\Page $page */
/* @var int $depth */

$depth++;
$maxDepth = 3;
?>
<?php if (!($page instanceof \Bookdown\Bookdown\Content\RootPage)): ?>
    <li>
    <?= $this->anchorRaw($page->getHref(), $page->getTitle()); ?>
<?php endif; ?>

<?php if ($page instanceof \Bookdown\Bookdown\Content\IndexPage
    && count($page->getChildren()) > 0
    && $depth <= $maxDepth
): ?>
    <?php $class = ($depth == 1) ? 'nav navbar-nav' : 'dropdown-menu'; ?>

    <ul class="<?= $class ?>">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="prooph-logo">
            <defs>
                <style>
                    .cls-1{fill:#04a1b0;}.cls-2{fill:#26896c;}.cls-3{fill:#eeca50;}.cls-4{fill:#eb6842;}.cls-5{fill:#cc3340;}.cls-6{fill:#715671;}
                </style>
            </defs>
            <title>prooph-logo</title>
            <g id="artwork">
                <g id="Layer_5" data-name="Layer 5">
                    <path class="cls-1"
                          d="M57.22,17,67.84,35.43a1.77,1.77,0,0,0,1.53.89h61.25a1.77,1.77,0,0,0,1.53-.89L142.78,17a1.77,1.77,0,0,0-1.53-2.66H58.76A1.77,1.77,0,0,0,57.22,17Z"/>
                    <path class="cls-2"
                          d="M29.54,94.68l30.63-53a1.77,1.77,0,0,0,0-1.77L49.55,21.48a1.77,1.77,0,0,0-3.07,0L5.24,92.91a1.77,1.77,0,0,0,1.53,2.66H28A1.77,1.77,0,0,0,29.54,94.68Z"/>
                    <path class="cls-3"
                          d="M60.16,158.36l-30.63-53a1.77,1.77,0,0,0-1.53-.89H6.78a1.77,1.77,0,0,0-1.53,2.66l41.24,71.43a1.77,1.77,0,0,0,3.07,0l10.61-18.38A1.77,1.77,0,0,0,60.16,158.36Z"/>
                    <path class="cls-4"
                          d="M130.63,163.68H69.37a1.77,1.77,0,0,0-1.53.89L57.22,183a1.77,1.77,0,0,0,1.53,2.66h82.48a1.77,1.77,0,0,0,1.53-2.66l-10.61-18.38A1.77,1.77,0,0,0,130.63,163.68Z"/>
                    <path class="cls-5"
                          d="M170.46,105.32l-30.63,53a1.77,1.77,0,0,0,0,1.77l10.61,18.38a1.77,1.77,0,0,0,3.07,0l41.24-71.43a1.77,1.77,0,0,0-1.53-2.66H172A1.77,1.77,0,0,0,170.46,105.32Z"/>
                    <path class="cls-6"
                          d="M139.84,41.64l30.63,53a1.77,1.77,0,0,0,1.53.89h21.23a1.77,1.77,0,0,0,1.53-2.66L153.52,21.48a1.77,1.77,0,0,0-3.07,0L139.84,39.86A1.77,1.77,0,0,0,139.84,41.64Z"/>
                </g>
            </g>
        </svg>
        <?php foreach ($page->getChildren() as $child) : ?>
            <?= $this->render('partialTopNav', array(
                'page' => $child,
                'depth' => $depth
            ));
            ?>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (!($page instanceof \Bookdown\Bookdown\Content\RootPage)): ?>
    </li>
<?php endif; ?>