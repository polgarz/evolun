<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'administration'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                    [
                        'actions' => ['administration'],
                        'allow'   => true,
                        'roles'   => ['manageAdminData'],
                    ],
                ]
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdministration()
    {
        return $this->render('administration');
    }
}
