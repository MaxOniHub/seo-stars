<section class="main-banner">
    <?= $this->render("landing-partials/_main_banner", ["widgetSettings" => $widgetSettings]) ?>
</section>

<section class="section bg-stars">
    <div class="container">
        <?= $this->render("landing-partials/_companies_ratings_seo", ["companyRatings" => $companyRatings]) ?>

        <?= $this->render("landing-partials/_companies_ratings_teaching_seo", ["companyRatings" => $companyRatings]) ?>
    </div>
</section>

<section class="section bg-small-stars">
    <div class="container">
        <?= $this->render("landing-partials/_popular_activities_directions") ?>

        <?= $this->render("landing-partials/_companies_ratings_country", ["companyRatings" => $companyRatings, 'themeSettings' => $themeSettings]) ?>
    </div>
</section>

<section class="section bg-stars-2">
    <?= $this->render("landing-partials/_reviews", ["reviews" => $reviews]) ?>
</section>