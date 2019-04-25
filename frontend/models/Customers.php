<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property integer $id_customer
 * @property string $name
 * @property string $surname
 * @property string $photo
 * @property integer $id_created
 * @property integer $id_updated
 * @property integer $created
 * @property integer $updated
 */
class Customers extends \yii\db\ActiveRecord
{
    
	public $file; // variable used to upload the picture
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	//['file', 'required', 'on' => 'create'], if we want to make it required just on create
            [['name', 'surname', 'photo', 'id_created', 'id_updated', 'created', 'updated'], 'required'],
            [['id_created', 'id_updated', 'created', 'updated'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['surname'], 'string', 'max' => 100],
            [['photo'], 'string', 'max' => 250],
            // for security reasons file will only acept jpg files
            [['file'], 'file', 'extensions' => 'jpg', 'mimeTypes' => 'image/jpeg', 'maxFiles' => 1, 'skipOnEmpty' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_customer' => 'Customer ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'photo' => 'Photo',
            'id_created' => 'Who Created',
            'id_updated' => 'Who Updated',
            'created' => 'Created at',
            'updated' => 'Updated at',
            'file' => 'Photo',
        ];
    }
    
    // relations that allow to access the related data from this model without the need to make another query
    public function getCreatedby()
    {
    	return $this->hasOne(User::className(), ['id' => 'id_created']);
    }
    public function getUpdatedby()
    {
    	return $this->hasOne(User::className(), ['id' => 'id_updated']);
    }



}
