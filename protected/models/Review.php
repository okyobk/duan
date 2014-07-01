<?php

class tbl_review extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_review':
	 * @var integer $id
	 * @var string $image_id
	 * @var string $user_id
	 * @var string $rating
	 */
	public $id;
	public $image_id;
	public $user_id;
	public $rating;
	public $date_rating;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}


