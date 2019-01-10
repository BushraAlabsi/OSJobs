<?php

namespace common\models;

use app\models\CategorySearch;
use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $position
 * @property string $company
 * @property string $url
 * @property string $location
 * @property string $description
 * @property resource $logo
 * @property string $type
 * @property int $category_id
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position', 'company', 'category_id'], 'required'],
            [['logo', 'type'], 'string'],
            [['category_id'], 'integer'],
            [['position'], 'string', 'max' => 100],
            [['company', 'url'], 'string', 'max' => 200],
            [['location', 'description'], 'string', 'max' => 255],
            [['position'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position' => 'Position',
            'company' => 'Company',
            'url' => 'Url',
            'location' => 'Location',
            'description' => 'Description',
            'logo' => 'Logo',
            'type' => 'Type',
            'category_id' => 'Category ID',
        ];
    }
    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
