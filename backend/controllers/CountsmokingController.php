<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use \DateTime;

use backend\models\Countsmoking;

class CountsmokingController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $today_day = date('Y-m-d');

        $all_element_today = Countsmoking::find()->where(['between', 'data', $today_day . " 00:00:01", $today_day . " 23:59:59" ]);
        $provider = new ActiveDataProvider([
            'query' => $all_element_today,
            'sort' => [
                'defaultOrder' => [
                    'data' => SORT_DESC,
                ]
            ],
        ]);

        $last_element = $last_element = Countsmoking::find()->where(['between', 'data', $today_day . " 00:00:01", $today_day . " 23:59:59" ])->orderBy(['data' => SORT_DESC])->one();

        $latest_date_time = strtotime($last_element->data);
        $latest_date_time = date('Y-m-d H:i:s', $latest_date_time);
        $datetime1 = new DateTime($latest_date_time);

        $interval = $datetime1->diff(new DateTime())->format("%d days, %h hours and %i minuts"); 

        return $this->render('index', ['dataProvider' => $provider, 'interval' => $interval ]);
    }

    public function actionAdd()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Countsmoking();
        if ($model->load(Yii::$app->request->post())) {
            $today_day = date('Y-m-d');

            $last_element = Countsmoking::find()->where(['between', 'data', $today_day . " 00:00:01", $today_day . " 23:59:59" ])->orderBy(['data' => SORT_DESC])->one();
            $latest_date_time = strtotime($last_element->data);
            $latest_date_time = date('Y-m-d H:i:s', $latest_date_time);
            $datetime1 = new DateTime($latest_date_time);

            $interval = (int)$datetime1->diff(new DateTime())->format("%h");           
            $model->data = date('Y-m-d H:i:s'); 
            if ($interval < 2)
            {
                $model->count = $last_element->count + 1;
            }
            else
            {
                $model->count = $last_element->count;
            }

            $model->save(false);

            return $this->render('add', [
                'model' => $model,
            ]);

        } else {
            return $this->render('add', [
                'model' => $model,
            ]);
        }
    }
}
