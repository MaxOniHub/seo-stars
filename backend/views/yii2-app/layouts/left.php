<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->username;?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Управление', 'options' => ['class' => 'header']],
                    ['label' => 'Компании', 'icon' => 'fa fa-list-alt', 'url' => ['/company']],
                    ['label' => 'Сервисы', 'icon' => 'fa fa-cogs', 'url' => ['/service']],
                    ['label' => 'Персоны', 'icon' => 'fa fa-users', 'url' => ['/person']],
                    ['label' => 'Конференции', 'icon' => 'fa fa-comments-o', 'url' => ['/conference']],
                    ['label' => 'Регионы', 'icon' => 'fa fa-list-alt', 'url' => ['/region']],
                    ['label' => 'Теги', 'icon' => 'fa fa-tags', 'url' => ['/tag']],
                    ['label' => 'Настройки + СЕО', 'icon' => 'fa fa-tags', 'url' => ['/theme/view']],
                    ['label' => 'Отзывы', 'icon' => 'fa fa-tags', 'url' => ['/review']],
                    ['label' => 'Страницы', 'icon' => 'fa fa-tags', 'url' => ['/pages']],
                    ['label' => 'Таблицы на глвной', 'icon' => 'fa fa-tags', 'url' => ['/mainpage/view']],
                    ['label' => 'Баннеры', 'icon' => 'fa fa-tags', 'url' => ['/banner']],
                ],
            ]
        ) ?>

    </section>

</aside>
