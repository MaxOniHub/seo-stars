<?php

namespace console\controllers;

use backend\helpers\IFrameUrlParser;
use backend\helpers\YouTubeLinkParser;
use common\models\Company;
use yii\console\Controller;

/**
 * Class UrlParserController
 * @package console\controllers
 */
class UrlParserController extends Controller
{

    public function actionCompany()
    {
        $companies = Company::find()->select("id, videos")->asArray()->all();

        $urlParser = new IFrameUrlParser();
        $YouTubeLinkParser = new YouTubeLinkParser();

        $youtube_ids = [];

        foreach ($companies as $company) {
            if ($urls = $urlParser->parse($company["videos"])) {
                foreach ($urls as $url) {
                    $youtube_ids[$company["id"]][] = $YouTubeLinkParser->getVideoIDFromEmbedUrl($url);
                }
            }
        }

        foreach ($youtube_ids as $id => $video_ids) {
            Company::updateAll(["videos" => implode(",", $video_ids)], ['id' => $id]);
        }

        echo "done";
    }
}