<?php

namespace app\controllers;

use app\models\Brigades;
use app\models\CallsBrigades;
use app\models\CallsSymptoms;
use Yii;
use app\models\Calls;
use app\models\CallsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * CallsController implements the CRUD actions for Calls model.
 */
class CallsController extends Controller
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
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Calls models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new CallsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Calls model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $newModel = new CallsSymptoms();
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Карта виклику #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Закрити',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
                'newModel' => $newModel
            ]);
        }
    }

    /**
     * Creates a new Calls model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Calls();
        $newModel = new CallsSymptoms();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Новий виклик",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'newModel' => $newModel
                    ]),
                    'footer'=> Html::button('Закрити',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Зберегти',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                $date = $request->post('Calls')['datetime'];
                $model->datetime = \DateTime::createFromFormat('d.m.Y H:i:s', $date)->getTimestamp();
                $model->save();
                $callId = $model->id;
                $brigades = new CallsBrigades();
                $brigades->calls_id = $callId;
                $brigades->brigades_id = 1;
                $brigades->save();
                $symptoms = $request->post('CallsSymptoms')['symptoms_id'];
                foreach ($symptoms as $symptom) {
                    $new = new CallsSymptoms();
                    $new->calls_id = $callId;
                    $new->symptoms_id = $symptom;
                    $new->save();
                }
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Новий виклик",
                    'content'=>'<span class="text-success">Виклик успішно доданий</span>',
                    'footer'=> Html::button('Закрити',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Новий виклик",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'newModel' => $newModel
                    ]),
                    'footer'=> Html::button('Закрити',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Зберегти',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'newModel' => $newModel
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Calls model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Карта виклику #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'newModel' => new CallsSymptoms()
                    ]),
                    'footer'=> Html::button('Закрити',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Зберегти',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Карта виклику #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                        'newModel' => new CallsSymptoms()
                    ]),
                    'footer'=> Html::button('Закрити',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Карта виклику #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'newModel' => new CallsSymptoms()
                    ]),
                    'footer'=> Html::button('Закрити',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Зберегти',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'newModel' => new CallsSymptoms()
                ]);
            }
        }
    }

    /**
     * Delete an existing Calls model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing Calls model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the Calls model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Calls the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Calls::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
