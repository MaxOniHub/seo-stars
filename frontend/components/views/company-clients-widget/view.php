<?php if (!empty($items)):?>
<ul class="company-clients align-left md-align-center">
<?php foreach ($items as $item):?>
    <li class="violet"><a href="<?= $item ?>"><?= $item ?></a></li>
<?php endforeach;?>
</ul>
<?php endif; ?>
