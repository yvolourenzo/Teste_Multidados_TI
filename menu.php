<?php
$menuOptions = [
    'Dashboard' => 'index.html',
    'Cadastro' => [
        'Cliente' => '#',
        'Fornecedor' => '#',
        'Usuário' => '#'
    ],
    'Relatório' => [
        'Cliente' => '#',
        'Faturamento' => '#'
    ]
];

$newOptions = [
    'Cadastro' => [
        'Perfil de acesso' => '#',
        'Produtos' => '#'
    ],
    'Relatório' => [
        'Produtos' => '#'
    ]
];

$menuOptions = array_merge_recursive($menuOptions, $newOptions);

// Ordenar as opções em ordem alfabética
ksort($menuOptions);
foreach ($menuOptions as &$subMenu) {
    if (is_array($subMenu)) {
        ksort($subMenu);
    }
}
?>

<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu">
            <li class="sidebar-toggler-wrapper">
                <div class="sidebar-toggler hidden-phone"></div>
            </li>
            <li class="sidebar-search-wrapper">
                <form class="sidebar-search" action="extra_search.html" method="POST">
                    <div class="form-container">
                        <div class="input-box">
                            <a href="javascript:;" class="remove"></a>
                            <input type="text" placeholder="Search..." />
                            <input type="button" class="submit" value=" " />
                        </div>
                    </div>
                </form>
            </li>

            <?php foreach ($menuOptions as $title => $link) : ?>
                <?php if (is_array($link)) : ?>
                    <li class="">
                        <a href="javascript:;" class="menu-toggle">
                            <i class="fa fa-file-text"></i>
                            <span class="title"><?= $title ?></span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" style="display: none;">
                            <?php foreach ($link as $subTitle => $subLink) : ?>
                                <li><a href="<?= $subLink ?>"><?= $subTitle ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="">
                        <a href="<?= $link ?>">
                            <i class="fa fa-file-text"></i>
                            <span class="title"><?= $title ?></span>
                            <span class="selected"></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<script>
    const menuToggleButtons = document.querySelectorAll('.menu-toggle');

    menuToggleButtons.forEach(button => {
        button.addEventListener('click', () => {
            const subMenu = button.nextElementSibling;
            subMenu.style.display = subMenu.style.display === 'none' ? 'block' : 'none';
        });
    });
</script>
