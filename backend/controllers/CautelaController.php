<?php

namespace backend\controllers;

use Yii;
use app\models\Cautela;
use app\models\Equipamento;
use app\models\CautelaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mPDF;

/**
 * CautelaController implements the CRUD actions for Cautela model.
 */
class CautelaController extends Controller
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
     * Lists all Cautela models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CautelaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cautela model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cautela model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //$equipamento = Equipamento::findOne($id);

        $model = new Cautela();

        //$model->idEquipamento = $id;

        
        if($model->StatusCautela == "Em aberto"){
            $StatusCautela = 1;
        }
        else if($model->StatusCautela= "Concluída"){
            $StatusCautela = 2;
        }
        else if ($model->StatusCautela = "Em atraso"){
            $StatusCautela = 3;
        }


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             //$equipamento->StatusEquipamento = "Em uso";
             //$equipamento->save();
            return $this->redirect(['view', 'id' => $model->idCautela]);
        } else {
            return $this->render('create', [
                'model' => $model,
                //'item' => $equipamento

            ]);
        }
    }


    function actionProdutos($id) {

        $model = $this->findModel($id);
        $idUsuario = Yii::$app->user->identity->id;


        $pdf = new mPDF('utf-8','A4','','','15','15','42','30');

    
    

        $pdf->SetHTMLHeader('
                <table style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
                    <tr>
                        <td width="20%" align="center" style="font-family: serif;font-weight: bold; font-size: 175%;"> <img src = "img/logo-brasil.jpg" height="90px" width="90px"> </td>
                        <td width="60%" align="center" style="font-family: serif;font-weight: bold; font-size: 135%;">  PODER EXECUTIVO <br> MINISTÉRIO DA EDUCAÇÃO <br> INSTITUTO DE COMPUTAÇÃO <br> UNIVERSIDADE FEDERAL DO AMAZONAS </td>
                        <td width="20%" align="center" style="font-family: serif;font-weight: bold; font-size: 175%;"> <img src = "img/ufam.jpg" height="90px" width="70px"> </td>
                    </tr>
                </table>
                <hr>
        ');

        $pdf->SetHTMLFooter('

                <table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
                    <tr>
                        <td  colspan = "3" align="center" ><span style="font-weight: bold"> Av. Rodrigo OtÃ¡vio, 6.200 - Campus UniversitÃ¡rio Senador Arthur VirgÃ­lio Filho - CEP 69077-000 - Manaus, AM, Brasil </span></td>
                    </tr>
                    <tr>
                        <td width="33%" align="center" style="font-weight: bold; font-style: italic;">  Tel. (092) 3305-1193/2808/2809</td>
                        <td width="33%" align="center" style="font-weight: bold; font-style: italic;">  E-mail: secretaria@icomp.ufam.edu.br</td>
                        <td width="33%" align="center" style="font-weight: bold; font-style: italic;">  http://www.icomp.ufam.edu.br </td>
                    </tr>
                </table>
        ');

    $pdf->WriteHTML (' <br>
                    <table style= "margin-top:0px;" width="100%;"> 
                    <tr>
                        <td style="text-align:center;">
                            <b> CAUTELA DE SOLICITAÇÃO DE EQUIPAMENTO </b>
                        </td>   
                                              
                    </tr>
                    </table>

                    <table width="100%" style="border-top: solid 1px; ">
                    
                    <tr><td colspan="2"><br></td><tr>
                    
                    <tr>
                        <td>
                            Os dados da cautela estão descritos a seguir:
                        </td>   

                    </tr>
                    <h1> <br></br></h1>
                    </table>

                    <table style="margin-left: auto; margin-right: auto;" border="2">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Respons&aacute;vel:</p>
                                </td>
                                <td colspan="3" width="612">
                                <p>'.$model->NomeResponsavel.'</p>
                                </td>
                            </tr>

                            <tr>
                                <td width="95">
                                    <p>Contato:</p>
                                </td>
                                <td width="214">
                                    <p>'.$model->TelefoneResponsavel.'.</p>
                                </td>
                                <td width="66">
                                    <p>Email:</p>
                                </td>
                                <td width="331">
                                    <p>'.$model->Email.'</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <table style="margin-left: auto; margin-right: auto; width: 600px;" border="2">                    
                    <tbody>
                    <tr>
                    <td style="width: 147.5px;">
                    <p>Origem:</p>
                    </td>
                    <td style="width: 179.5px;">
                    <p>Nota Fiscal:</p>
                    </td>
                    <td style="width: 225px;">
                    <p>Equipamento:</p>
                    </td>
                    <td style="width: 152px;">
                    <p>N&ordm;. de S&eacute;rie:</p>
                    </td>
                    </tr>
                    <tr>
                    <td style="width: 147.5px;">
                    <p>'.$model->OrigemCautela.'</p>
                    </td>
                    <td style="width: 179.5px;">
                    <p>'.$j17_equipamento['NotaFiscal'].'</p>
                    </td>
                    <td style="width: 225px;">
                    <p>&nbsp;</p>
                    </td>
                    <td style="width: 152px;">
                    <p>&nbsp;</p>
                    </td>
                    </tr>
                    <tr>
                    <td style="width: 147.5px;">
                    <p>Origem:</p>
                    </td>
                    <td style="width: 179.5px;">
                    <p>Nota Fiscal:</p>
                    </td>
                    <td style="width: 225px;">
                    <p>Equipamento:</p>
                    </td>
                    <td style="width: 152px;">
                    <p>N&ordm;. de S&eacute;rie:</p>
                    </td>
                    </tr>
                    <tr>
                    <td style="width: 147.5px;">
                    <p>&nbsp;</p>
                    </td>
                    <td style="width: 179.5px;">
                    <p>&nbsp;</p>
                    </td>
                    <td style="width: 225px;">
                    <p>&nbsp;</p>
                    </td>
                    <td style="width: 152px;">
                    <p>&nbsp;</p>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    

                    
                    <p style="text-align: justify;">Declaro assumir total responsabilidade por extravio ou danos verificados ap&oacute;s a retirada do equipamento; neste caso, providenciarei o reparo ou a reposi&ccedil;&atilde;o do item emprestado em prazo de 30 dias a contar da data de devolu&ccedil;&atilde;o. Afirmo ter verificado, antes da retirada, que o equipamento encontrava-se:&nbsp;</p>
                    <p style="text-align: left;"> em perfeitas condi&ccedil;&otilde;es de uso e bom estado de conserva&ccedil;&atilde;o&nbsp;</p>
                    <p>(&nbsp;&nbsp; ) com os seguintes problemas e/ou danos (descrev&ecirc;-los):</p>
                    <p>______________________________________________________________________________________________________</p>
                    <p>______________________________________________________________________________________________________</p>
                    <p>Validade da cautela: '.$model->ValidadeCautela.'</p>
                    
                    <p style="text-align: center;">Local: '.$model->ImagemCautela.'</p>
                    
                    <p style="text-align: center;">_________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________</p>
                    <p style="text-align: center;">Respons&aacute;vel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Coordenador</p>
                    
                    <p style="text-align: center;">&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;'.$model->DataDevolucao.' &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; _________________________</p>
                    <p style="text-align: center;">Data de Devolução:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Recebedor</p>


                    ');
       
        
                
        $pdf->Output('');

        $pdfcode = $pdf->output();
    }



    /**
     * Updates an existing Cautela model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idCautela]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cautela model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cautela model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cautela the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cautela::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
