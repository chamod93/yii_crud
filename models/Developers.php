<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "developers".
 *
 * @property int $id
 * @property int $name
 * @property int $remarks
 * @property int $category
 */
class Developers extends \yii\db\ActiveRecord
{
   private $name;
   private $remarks;
   private $category;

   public function rules(){
       return [
           [['name','remarks','category'],'required']
       ];
   }
    
}
