<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_master".
 *
 * @property string $id
 * @property string $type_id 1=>Admin, 2=>Carer, 3=>Family
 * @property string $first_name
 * @property string $last_name
 * @property string $display_name
 * @property string $email
 * @property string $password
 * @property string $dob
 * @property string $age_privacy 0=>Private, 1=>Public
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zipcode
 * @property string $image
 * @property string $phone
 * @property string $id_proofimage
 * @property string $reset_password_token
 * @property string $active_token
 * @property string $last_login
 * @property int $login_count
 * @property string $online_status 0=>Offline, 1=>Online
 * @property string $status 0=>Inactive, 1=>Active, 2=>Suspended, 3=>Deleted
 * @property string $created_at
 * @property string $updated_at
 */
class UserMaster extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {

    public $auth_key;
    public $old_password;
    public $new_password;
    public $retype_password;
    public $confirm_password;
    public $date;
    public $month;
    public $year;
    public $zipcode1;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user_master';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['first_name', 'last_name'], 'required', 'message' => '{attribute} incomplete', 'on' => ['admin_update_profile', 'reg_carer', 'reg_family', 'create_carer', 'update_carer', 'create_family', 'update_family']],
            [['first_name', 'last_name'], 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'Only contain word characters'],
            [['phone'], 'match', 'pattern' => '/^[0-9\s]+$/', 'message' => 'Only contain numeric characters'],
            ['email', 'required', 'message' => '{attribute} incomplete', 'on' => ['admin_forgot_password', 'admin_update_profile', 'reg_carer', 'reg_family', 'forgot_password', 'create_carer', 'update_carer', 'create_family', 'update_family']],
            ['email', 'email', 'on' => ['admin_forgot_password', 'admin_update_profile', 'reg_carer', 'reg_family', 'forgot_password', 'create_carer', 'update_carer', 'create_family', 'update_family']],
            ['email', 'checkMail', 'on' => ['admin_forgot_password', 'update_carer', 'update_family']],
            [['new_password', 'confirm_password'], 'required', 'message' => '{attribute} incomplete', 'on' => ['reset_password']],
            [['display_name'], 'required', 'message' => '{attribute} incomplete', 'on' => ['reg_carer', 'reg_family', 'create_carer', 'update_carer', 'create_family', 'update_family']],
            [['password', 'retype_password', 'address', 'zipcode', 'phone','suburb'], 'required', 'message' => '{attribute} incomplete', 'on' => ['reg_carer', 'reg_family']],
            [['date', 'month', 'year'], 'required', 'message' => '{attribute} incomplete', 'on' => ['reg_carer']],
            ['email', 'checkEmail', 'on' => ['reg_carer', 'reg_family', 'create_carer', 'create_family']],
            ['display_name', 'checkDisplayname', 'on' => ['reg_carer', 'reg_family', 'create_carer', 'create_family']],
            ['display_name', 'updateDisplayname', 'on' => ['update_carer', 'update_family']],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'on' => ['admin_update_profile', 'reg_carer', 'reg_family']],
            [['image'], 'image', 'minWidth' => 250, 'minHeight' => 250, 'on' => ['admin_update_profile', 'reg_carer', 'reg_family']],
            [['phone'], 'number', 'min' => 1, 'on' => ['reg_carer', 'create_carer', 'update_carer', 'create_family', 'update_family']],
            [['phone'], 'number', 'min' => 1],
            [['zipcode'], 'number', 'min' => 1, 'on' => ['reg_carer']],
            ['email', 'userEmailCheck', 'on' => ['forgot_password']],
            [['email'], 'unique', 'on' => ['admin_update_profile']],
            [['old_password', 'new_password', 'retype_password'], 'required', 'message' => '{attribute} incomplete', 'on' => ['admin_password']],
            ['old_password', 'findPasswords', 'on' => ['admin_password', 'change_password']],
            ['retype_password', 'compare', 'compareAttribute' => 'new_password', 'on' => ['admin_password']],
            ['confirm_password', 'compare', 'compareAttribute' => 'new_password', 'on' => ['reset_password']],
            [['password'], 'string', 'min' => 6, 'on' => ['reg_carer', 'reg_family']],
            ['retype_password', 'compare', 'compareAttribute' => 'password', 'on' => ['reg_carer', 'reg_family']],
            [['new_password'], 'string', 'min' => 6, 'on' => ['admin_password', 'reset_password']],
            [['type_id', 'age_privacy', 'online_status', 'status'], 'string'],
            [['dob', 'last_login', 'created_at', 'updated_at', 'latitude', 'longitude'], 'safe'],
            [['login_count'], 'integer'],
            [['first_name', 'last_name', 'display_name', 'email', 'password', 'address', 'reset_password_token', 'active_token'], 'string', 'max' => 255],
            [['city', 'state', 'country'], 'string', 'max' => 100],
            [['zipcode', 'phone', 'abn'], 'string', 'max' => 50],
//            change password
            [['old_password', 'new_password', 'retype_password'], 'required', 'message' => '{attribute} incomplete', 'on' => ['change-password']],
            [['new_password'], 'string', 'min' => 6, 'on' => ['change-password']],
            ['old_password', 'findPasswords', 'on' => ['change-password']],
//            update_profile_basic
            [['display_name', 'first_name', 'last_name', 'address', 'zipcode','suburb', 'dob', 'email', 'phone'], 'required', 'message' => '{attribute} incomplete', 'on' => ['update_profile_basic']],
            [['image', 'id_proofimage'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'on' => ['update_profile_basic']],
            [['display_name', 'first_name', 'last_name', 'address', 'phone', 'email', 'zipcode','suburb'], 'required', 'message' => '{attribute} incomplete', 'on' => ['update_family_info']],
//            [['display_name','first_name', 'last_name','address','phone','date','month','year', 'email'], 'required', 'message' => '{attribute} incomplete', 'on' => ['update_family_info']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'display_name' => 'Display name',
            'email' => 'Email',
            'password' => 'Password',
            'retype_password' => 'Retype password',
            'new_password' => 'New password',
            'confirm_password' => 'Confirm password',
            'dob' => 'Date of birth',
            'age_privacy' => 'Age privacy',
            'address' => 'Address',
            'city' => 'Suburb/Town',
            'state' => 'State',
            'country' => 'Country',
            'zipcode' => 'Postcode',
            'image' => 'Image',
            'phone' => 'Phone number',
            'abn' => 'ABN',
            'id_proofimage' => 'Id Proofimage',
            'reset_password_token' => 'Reset Password Token',
            'active_token' => 'Active Token',
            'last_login' => 'Last Login',
            'login_count' => 'Login Count',
            'online_status' => 'Online Status',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function adminFindByEmail($email) {
        return self::findOne(['email' => $email, 'type_id' => '1', 'status' => '1']);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new \yii\base\NotSupportedException();
    }

    public function getId() {
        return $this->id;
    }

    public function getAuthKey() {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey) {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password) {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function checkCurrentPassword($attribute, $params) {
        $user = UserMaster::find()->where(['id' => Yii::$app->user->id])->one();
        $password = $user->password;
        if (Yii::$app->getSecurity()->validatePassword($this->old_password, $password) != 1)
            $this->addError($attribute, 'Current Password is incorrect.');
    }

    public function findPasswords($attribute, $params) {
        $user = UserMaster::find()->where(['id' => Yii::$app->user->id])->one();
        $password = $user->password;
        if (Yii::$app->getSecurity()->validatePassword($this->old_password, $password) != 1)
            $this->addError($attribute, 'Old Password is incorrect.');
    }

    public function checkEmail($attribute, $params) {
        if (isset($this->email) && $this->email != '') {
            $email = strtolower($this->email);
            $check = self::find()
                    ->where("email = '$email' and status <> '3'")
                    ->one();
            if (count($check) > 0) {
                $this->addError($attribute, 'This Email is already in use.');
            }
        }
    }

    public function checkMail($attribute, $params) {
        if (isset($this->email) && $this->email != '') {
            $email = strtolower($this->email);
            $check = self::find()
                    ->where("email = '$email' and id <> '" . $this->id . "' and status <> '3'")
                    ->one();
            if (count($check) > 0) {
                $this->addError($attribute, 'This Email is not available.');
            }
        }
    }

    public function userEmailCheck($attribute, $params) {
        if (isset($this->email) && $this->email != null) {
            $email = self::find()
                    ->where(['email' => $this->email, 'status' => '1'])
                    ->andWhere(['<>', 'type_id', '1'])
                    ->one();
            if (!count($email) > 0) {
                $this->addError($attribute, 'Email is not found.');
            }
        }
    }

    public function checkDisplayname($attribute, $params) {
        if (isset($this->display_name) && $this->display_name != null) {
            $name = self::find()
                    ->where(['=', 'display_name', $this->display_name])
                    ->andWhere(['type_id' => $this->type_id])
                    ->andWhere(['<>', 'status', "3"])
                    ->one();
            if (count($name) > 0) {
                $this->addError($attribute, 'This name already exists. Please try another.');
            }
        }
    }

    public function updateDisplayname($attribute, $params) {
        if (isset($this->display_name) && $this->display_name != null) {
            $name = self::find()
                    ->where(['<>', 'id', $this->id])
                    ->andWhere(['=', 'display_name', $this->display_name])
                    ->andWhere(['type_id' => $this->type_id])
                    ->andWhere(['<>', 'status', "3"])
                    ->one();
            if (count($name) > 0) {
                $this->addError($attribute, 'This name already exists. Please try another.');
            }
        }
    }

    public function getCarerdetails() {
        return $this->hasOne(CarerDetails::className(), array("user_id" => "id"));
    }

    public function getFamilydetails() {
        return $this->hasOne(FamilyDetails::className(), array("user_id" => "id"));
    }

}
