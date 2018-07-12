<?php

namespace frontend\controllers;

use common\models\Review;
use yii\web\Controller;

/**
 * Class ReviewSortingController
 * @package frontend\controllers
 */
class ReviewSortingController extends Controller
{
    public function actionIndex($id, $gist, $sort = null, $sort_desc = null)
    {
        $comments = Review::getAllComments($id, $gist, $sort, $sort_desc);

        return \frontend\components\UserReviewsWidget::widget(["items" => $comments]);
    }
}
