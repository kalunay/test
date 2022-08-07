<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property int $category_id
 * @property int $model_id
 * @property int $engine_id
 * @property int $drive_id
 * @property string $name
 *
 * @property Category $category
 * @property Drive $drive
 * @property Engine $engine
 * @property Model $model
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'model_id', 'engine_id', 'drive_id', 'name'], 'required'],
            [['category_id', 'model_id', 'engine_id', 'drive_id'], 'integer'],
            [['name'], 'string', 'max' => 55],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['drive_id'], 'exist', 'skipOnError' => true, 'targetClass' => Drive::className(), 'targetAttribute' => ['drive_id' => 'id']],
            [['engine_id'], 'exist', 'skipOnError' => true, 'targetClass' => Engine::className(), 'targetAttribute' => ['engine_id' => 'id']],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => Model::className(), 'targetAttribute' => ['model_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'model_id' => 'Model ID',
            'engine_id' => 'Engine ID',
            'drive_id' => 'Drive ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Drive]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDrive()
    {
        return $this->hasOne(Drive::className(), ['id' => 'drive_id']);
    }

    /**
     * Gets query for [[Engine]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEngine()
    {
        return $this->hasOne(Engine::className(), ['id' => 'engine_id']);
    }

    /**
     * Gets query for [[Model]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Model::className(), ['id' => 'model_id']);
    }
}
