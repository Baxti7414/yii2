<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property string $id
 * @property string $parent_id
 * @property string $name
 * @property string $keyword
 * @property string $description
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }
	
	public function getCategory(){
		return $this->hasOne(Category::className(), ['id' => 'parent_id']);
	}
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['name', 'keyword', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'No Категорий',
            'parent_id' => 'Родительская Категория',
            'name' => 'Названия',
            'keyword' => 'Ключевые слова',
            'description' => 'Мета-описание',
        ];
    }
}
