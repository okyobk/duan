<?php

class Share extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_image':
	 * @var integer $id
	 * @var string $link_image
	 * @var string $facebook_id
	 */
	public $id;
	public $image;
	public $use_share;
	public $use_revice;
	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	// array('attachments', 'file', 
	// 'types'=>'doc,docx,pdf,txt',
	// 'maxSize'=>1024 * 1024 * 1, // 1MB
	// 'tooLarge'=>'The file was larger than 1MB. Please upload a smaller file.',
	// 'allowEmpty'=>1,
	// 	)	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{share}}';
	}
	
}

