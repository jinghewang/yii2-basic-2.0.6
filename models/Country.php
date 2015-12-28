<?php

namespace app\models;

use hlt\helpers\BDataHelper;
use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $code
 * @property string $name
 * @property integer $population
 * @property string $createtime
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * This method is called at the beginning of inserting or updating a record.
     * The default implementation will trigger an [[EVENT_BEFORE_INSERT]] event when `$insert` is true,
     * or an [[EVENT_BEFORE_UPDATE]] event if `$insert` is false.
     * When overriding this method, make sure you call the parent implementation like the following:
     *
     * ```php
     * public function beforeSave($insert)
     * {
     *     if (parent::beforeSave($insert)) {
     *         // ...custom code here...
     *         return true;
     *     } else {
     *         return false;
     *     }
     * }
     * ```
     *
     * @param boolean $insert whether this method called while inserting a record.
     * If false, it means the method is called while updating a record.
     * @return boolean whether the insertion or updating should continue.
     * If false, the insertion or updating will be cancelled.
     */
    public function beforeSave($insert)
    {
        if ($this->isNewRecord){
            $this->createtime = self::getCurrentTime();
        }
        return parent::beforeSave($insert);
    }

    /*
   * 获取当前时间
   */
    public static function getCurrentTime($format = 'Y-m-d H:i:s')
    {
        date_default_timezone_set('PRC');
        return date($format, time());
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['population'], 'integer'],
            [['createtime'], 'safe'],
            [['code'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => '国家代码',
            'name' => '国家名称',
            'population' => '国家人口',
            'createtime' => '创建时间',
        ];
    }
}
