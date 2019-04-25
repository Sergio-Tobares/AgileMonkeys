<?php

namespace frontend\controllers;

use Yii;
use app\models\Customers;
use app\models\CustomersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

/**
 * CustomersController implements the CRUD actions for Customers model.
 */
class CustomersController extends Controller
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
     * Lists all Customers models.
     * @return mixed
     */
    public function actionIndex()
    {
        // if the user rol does not allow him to be here the is redirected to home screen
        if (Yii::$app->user->identity->rol=='Pending') return $this->goHome();
        
        $searchModel = new CustomersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // the data proveder contains the customer list
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customers model.
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
     * Creates a new Customers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customers();
		
        //$model->scenario = 'create'; used only if a field is required just in one case
        
        if ($model->load(Yii::$app->request->post()))  {
        	// here we set the values to the fields that have "automatic" values
        	$model->created=time();
        	$model->updated=time();
        	$model->id_created=Yii::$app->user->identity->id;
        	$model->id_updated=Yii::$app->user->identity->id;
        	
        	$model->file = UploadedFile::getInstance($model, 'file'); // we get the file from the form
        	if ($model->file) { // if there is a file
        		$ruta=substr(Yii::getAlias('@app'),0).'/web/';        		
				// in order to have a clean directory structure web create a folder acording to the date
        		if (!file_exists ( $ruta.'upload/' ))
        			{mkdir($ruta.'upload/', 0777);}
        		if (!file_exists ( $ruta.'upload/'.Date('Y') ))
        			{mkdir($ruta.'upload/'.Date('Y'), 0777);}
        		if (!file_exists ( $ruta.'upload/'.Date('Y').'/'.Date('m') ))
        			{mkdir($ruta.'upload/'.Date('Y').'/'.Date('m'), 0777);}
        		if (!file_exists ( $ruta.'upload/'.Date('Y').'/'.Date('m').'/'.Date('d') ))
        			{mkdir($ruta.'upload/'.Date('Y').'/'.Date('m').'/'.Date('d'), 0777);}
        		 
        		$filename='upload/'.Date('Y').'/'.Date('m').'/'.Date('d').'/user_'.$model->created.'.'.$model->file->extension;
        		// the file is saved first in order to be resized
        		if ($model->file->saveAs($ruta.$filename)) $model->file=$filename;
        		$model->photo=$filename;
        		//we resize the image to optimize disk space but we this can also be skipped
        		$imagine = Image::getImagine();
        		$image = $imagine->open($ruta.$filename);
        		$image->thumbnail(new Box(300, 300))->save($ruta.$filename, ['quality' => 90]);
        	}
        	else {
        	    // there is no image and as it is not a required field we asign a blank one.
        	    $model->photo='imagenes/nofoto.jpg';
        	}
        	
        	if ($model->save()) return $this->redirect(['view', 'id' => $model->id_customer]);
        	else return $this->render('create', ['model' => $model,]);
        	
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Customers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
        	
        	$model->updated=time();        	
        	$model->id_updated=Yii::$app->user->identity->id;
        	// almost the same as create
        	$model->file = UploadedFile::getInstance($model, 'file'); // we get the file
        	if ($model->file) {
        		$ruta=substr(Yii::getAlias('@app'),0).'/web/';
        		// in order to have a clean directory structure web create a folder acording to the date
        		if (!file_exists ( $ruta.'upload/' ))
        			{mkdir($ruta.'upload/', 0777);}
        		if (!file_exists ( $ruta.'upload/'.Date('Y') ))
        			{mkdir($ruta.'upload/'.Date('Y'), 0777);}
        		if (!file_exists ( $ruta.'upload/'.Date('Y').'/'.Date('m') ))
        			{mkdir($ruta.'upload/'.Date('Y').'/'.Date('m'), 0777);}
        		if (!file_exists ( $ruta.'upload/'.Date('Y').'/'.Date('m').'/'.Date('d') ))
        			{mkdir($ruta.'upload/'.Date('Y').'/'.Date('m').'/'.Date('d'), 0777);}
        			
        		// first we have to delete the original file and then proceed with the rest o the process just
        		// like in the create
        		if (file_exists($model->photo)) unlink($model->photo);
        		 
        		$filename='upload/'.Date('Y').'/'.Date('m').'/'.Date('d').'/user_'.$model->created.'.'.$model->file->extension;
        		if ($model->file->saveAs($ruta.$filename)) $model->file=$filename;
        		$model->photo=$filename;
        		//we resize the image to optimize disk space but we this can also be skipped
        		$imagine = Image::getImagine();
        		$image = $imagine->open($ruta.$filename);
        		$image->thumbnail(new Box(300, 300))->save($ruta.$filename, ['quality' => 90]);
        	}
        	
        	if ($model->save()) return $this->redirect(['view', 'id' => $model->id_customer]);
        	else return $this->render('update', ['model' => $model,]);
        	
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Customers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        // check if the file exist to delete
        if (file_exists($model->photo)) unlink($model->photo); 

        $model->delete();
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Customers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
