<?php

namespace app\controllers;

use Yii;
use app\models\Emprestimo;
use app\models\Equipamento;
use app\models\Cautela;
use app\models\EmprestimoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmprestimoController implements the CRUD actions for Emprestimo model.
 */
class EmprestimoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Emprestimo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmprestimoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Emprestimo model.
     * @param integer $idEquipamento
     * @param integer $idCautela
     * @return mixed
     */
    public function actionView($idEquipamento, $idCautela)
    {
        return $this->render('view', [
            'model' => $this->findModel($idEquipamento, $idCautela),
        ]);
    }

    /**
     * Creates a new Emprestimo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idEquipamento,$idCautela)
    {
        $equipamento = Equipamento::findOne($idEquipamento);

        $model = new Emprestimo();

        $model->idEquipamento = $idEquipamento;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $cautela->StatusEquipamento = "Em uso";
            $cautela->save();
            return $this->redirect(['view', 'idEquipamento' => $model->idEquipamento, 'idCautela' => $model->idCautela]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'item' => $equipamento,
            ]);
        }
    }

    /**
     * Updates an existing Emprestimo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idEquipamento
     * @param integer $idCautela
     * @return mixed
     */
    public function actionUpdate($idEquipamento, $idCautela)
    {
        $model = $this->findModel($idEquipamento, $idCautela);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idEquipamento' => $model->idEquipamento, 'idCautela' => $model->idCautela]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Emprestimo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idEquipamento
     * @param integer $idCautela
     * @return mixed
     */
    public function actionDelete($idEquipamento, $idCautela)
    {
        $this->findModel($idEquipamento, $idCautela)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Emprestimo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idEquipamento
     * @param integer $idCautela
     * @return Emprestimo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idEquipamento, $idCautela)
    {
        if (($model = Emprestimo::findOne(['idEquipamento' => $idEquipamento, 'idCautela' => $idCautela])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
