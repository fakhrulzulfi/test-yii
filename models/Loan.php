<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "loan".
 *
 * @property int $id
 * @property int $book_id
 * @property int $member_id
 * @property string|null $date
 * @property string|null $returned_on
 *
 * @property Book $book
 * @property Member $member
 */
class Loan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_id', 'member_id'], 'required'],
            [['book_id', 'member_id'], 'default', 'value' => null],
            [['book_id', 'member_id'], 'integer'],
            [['date', 'returned_on'], 'safe'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['book_id' => 'id']],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::class, 'targetAttribute' => ['member_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'member_id' => 'Member ID',
            'date' => 'Date',
            'returned_on' => 'Returned On',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::class, ['id' => 'book_id']);
    }

    /**
     * Gets query for [[Member]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Member::class, ['id' => 'member_id']);
    }
}
