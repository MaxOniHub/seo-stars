<?php
$videos = $company->getYoutubeVideoIds();
?>
<?php if (!empty($company["about"]) || $videos):?>
    <div class="paragraph section-subtitle small top-offset align-left md-align-center">О компании</div>

<?php endif;?>

<?php if (!empty($company["about"])) : ?>
    <div class="paragraph vertical-offset align-left md-align-center">
        <?= $company["about"]?>
    </div>
<?php endif;?>

<?php if ($videos): ?>
    <div class="paragraph"> <?= $this->render("_youtube", ["links" => $videos]) ?></div>
<?php endif; ?>



