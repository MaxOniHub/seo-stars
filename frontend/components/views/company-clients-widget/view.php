<?php if (!empty($items)):?>
<ul class="company-clients align-left md-align-center">
<?php foreach ($items as $item):?>
    <li class="violet"><span><?= $item ?></span></li>
<?php endforeach;?>
</ul>
<?php endif; ?>
