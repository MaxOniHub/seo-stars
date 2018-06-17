<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_cases".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $origin_path
 * @property string $thumbnail_path
 */
class CompanyCases extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_cases';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'origin_path', 'thumbnail_path'], 'required'],
            [['company_id'], 'integer'],
            [['origin_path', 'thumbnail_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'origin_path' => 'Origin Path',
            'thumbnail_path' => 'Thumbnail Path',
        ];
    }
}
