<?php

namespace app\controllers;

use Yii;
use app\models\Car;
use app\models\Category;
use app\models\Model;
use app\models\Engine;
use app\models\Drive;
use yii\data\ActiveDataProvider;

class CatalogController extends \yii\web\Controller
{
    public function actionIndex($category = '',$model = '')
    {

        $query = Car::find();
        if(Yii::$app->request->post()){
            if(Yii::$app->request->post('category')){
                $car = Category::find()->where(['link' => Yii::$app->request->post('category')])->one();
                $query = $query->andWhere(['category_id' => $car->id]);
            }
            if(Yii::$app->request->post('model')){
                $mod = Model::find()->where(['link' => Yii::$app->request->post('model')])->one();
                $query = $query->andWhere(['model_id' => $mod->id]);
            }
            if(Yii::$app->request->post('engine')){
                $query = $query->andWhere(['engine_id' => Yii::$app->request->post('engine')]);
            }
            if(Yii::$app->request->post('drive')){
                $query = $query->andWhere(['drive_id' => Yii::$app->request->post('drive')]);
            }
        }

        if(!empty($category) and $category != 'index'){
            $car = Category::find()->where(['link' => $category])->one();
            $query = $query->andWhere(['category_id' => $car->id]);
        }
        if(!empty($model) and $category != 'index'){
            $mod = Model::find()->where(['link' => $model])->one();
            $query = $query->andWhere(['model_id' => $mod->id]);
        }

        $cars = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 12,
            ],
            'sort' => [
                'defaultOrder' => [
                    'name' => SORT_ASC, 
                ]
            ],
        ]);

        $categories = Category::find()->all();
        $models = Model::find()->all();
        $engines = Engine::find()->all();
        $drives = Drive::find()->all();
        $title = 'Продажа новых автомобилей '.(isset($car->name) ? $car->name : '').(isset($mod->name) ? ' '.$mod->name : '').' в Санкт-Петербурге';

        return $this->render('index',[
            'cars' => $cars,
            'categories' => $categories,
            'models' => $models,
            'engines' => $engines,
            'drives' => $drives,
            'title' => $title
        ]);
    }

}
