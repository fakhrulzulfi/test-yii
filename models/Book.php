<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $name
 * @property string|null $author
 * @property int|null $year
 * @property int|null $count
 * @property bool|null $is_available
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Loan[] $loans
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['year', 'count'], 'default', 'value' => null],
            [['year', 'count'], 'integer'],
            [['is_available'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'author'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'author' => 'Author',
            'year' => 'Year',
            'count' => 'Count',
            'is_available' => 'Is Available',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Loans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoans()
    {
        return $this->hasMany(Loan::class, ['book_id' => 'id']);
    }
}
