<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Admin;

/**
 * AdminSearch represents the model behind the search form of `app\models\Admin`.
 */
class AdminSearch extends Admin
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'is_logged', 'deleted'], 'integer'],
            [['role', 'username', 'name', 'email', 'auth_key', 'password_hash', 'password_reset_hash', 'password_reset_token', 'latest_login', 'created_at', 'updated_at', 'deleted_at', 'avatar'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $additional = null)
    {
        $query = Admin::find()->where(['!=', 'admin.id', Yii::$app->user->identity->id]);

        if ($additional != null) {
            $query->andWhere($additional);
        }
        // add conditions that should always apply here
        if (Yii::$app->user->identity->role == "MERCHANT") {
            $query->andWhere(['role' => "MERCHANT"]);
            $query->andWhere(['merchant_id' => Yii::$app->user->identity->merchant_id]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'is_logged' => $this->is_logged,
            'latest_login' => $this->latest_login,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted' => $this->deleted,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'role', $this->role])
                ->andFilterWhere(['like', 'username', $this->username])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'auth_key', $this->auth_key])
                ->andFilterWhere(['like', 'password_hash', $this->password_hash])
                ->andFilterWhere(['like', 'password_reset_hash', $this->password_reset_hash])
                ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
                ->andFilterWhere(['like', 'avatar', $this->avatar]);

        return $dataProvider;
    }

}
