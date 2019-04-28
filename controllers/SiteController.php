<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Posts;
use app\models\Developers;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        $posts = Posts::find()->all();
        
        return $this->render('home',['posts'=>$posts]);
    }

    public function actionCreate()
    {
        $post = new Posts();
        $formData = Yii::$app->request->post();
        if($post->load($formData)){
            if($post->save()){
                Yii::$app->getSession()->setFlash('message','Post Published Successfully');
                return $this->redirect(['index']) ;
            }
            else{
                Yii::$app->getSession()->setFlash('message','Failed to Post');
            }
        }

        return $this->render('create',['post'=>$post]);
        }

    public function actionView($id){
        $post = Posts::findOne($id);
        return $this->render('view',['post'=>$post]);
    }

    public function actionUpdate($id){
        $post = Posts::findOne($id);
        if($post->load(Yii::$app->request->post())&& $post->save()){
            Yii::$app->getSession()->setFlash('message','Post Updated Successfully');
            return $this->redirect(['index','id'=>$post->id]);
        }
        else{
            return $this->render('update',['post'=>$post]);
        }
        return $this->render('update',['post'=>$post]);
    }

    public function actionDelete($id){
        $post = Posts::findOne($id)->delete();
        if($post){
            Yii::$app->getSession()->setFlash('message','Post Deleted Successfully');
            return $this->redirect(['index']);
        }
    }

    public function actionUsers(){
        $developers = Developers::find()->all();
        return $this->render('users',['developers'=>$developers]);
    }

    public function actionUcreate(){
        $developers = new Developers(); 
        $formData = Yii::$app->request->post();
        if($developers->load($formData)){
            if($developers->save()){
                Yii::$app->getSession()->setFlash('message','Post Published Successfully');
                return $this->redirect(['users']) ;
            }
            else{
                Yii::$app->getSession()->setFlash('message','Failed to Post');
            }
        }
        return $this->render('ucreate',['developers'=>$developers]);
    }

    public function actionUview($id){
        $developers = Developers::findOne($id);
        return $this->render('uview',['developers'=>$developers]);
    }

    public function actionUupdate($id){
        $developers = Developers::findOne($id);
        if($developers->load(Yii::$app->request->post())&& $developers->save()){
            Yii::$app->getSession()->setFlash('message','Post Updated Successfully');
            return $this->redirect(['users','id'=>$developers->id]);
        }
        else{
            return $this->render('uupdate',['developers'=>$developers]);
        }
        return $this->render('uupdate',['developers'=>$developers]);
    }

    public function actionUdelete($id){
        $developers = Developers::findOne($id)->delete();
        if($developers){
            Yii::$app->getSession()->setFlash('message','Post Deleted Successfully');
            return $this->redirect(['users']);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
