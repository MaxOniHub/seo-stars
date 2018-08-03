<?php

namespace console\controllers;

use backend\helpers\IFrameUrlParser;
use backend\helpers\YouTubeLinkParser;
use common\models\Company;
use yii\console\Controller;

/**
 * Class RatingRecalculationController
 * @package console\controllers
 */
class RatingRecalculationController extends Controller
{

    /**
     * Rating recalculation based on user reviews
     */
    public function actionCalc()
    {
        $companies = Company::find()->asArray()->all();

        foreach ($companies as $company) {
            $votes = Company::findBySql("CALL review_votes(:EntityID, :ColumnName)",
                [
                    ":EntityID" => $company['id'],
                    ":ColumnName" => 'company_id',
                ])
                ->select('id')
                ->scalar();

            $rating = 0;
            $rating = $votes ? $rating + $votes : 1;
            Company::updateAll(['raiting' => $rating, 'mod_rating' => $rating], ['id' => $company['id']]);
        }
    }
}