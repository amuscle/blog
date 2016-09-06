<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $content
 * @property string $ontent_filtered
 * @property integer $hits
 * @property integer $like
 * @property integer $recommended
 * @property integer $istop
 * @property string $create_at
 * @property string $update_at
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'content', 'ontent_filtered'], 'required'],
            [['category_id', 'hits', 'like', 'recommended', 'istop'], 'integer'],
            [['content', 'ontent_filtered'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['title'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'ontent_filtered' => Yii::t('app', 'Ontent Filtered'),
            'hits' => Yii::t('app', 'Hits'),
            'like' => Yii::t('app', 'Like'),
            'recommended' => Yii::t('app', 'Recommended'),
            'istop' => Yii::t('app', 'Istop'),
            'create_at' => Yii::t('app', 'Create At'),
            'update_at' => Yii::t('app', 'Update At'),
        ];
    }
}
