<?php

class Image extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_image':
	 * @var integer $id
	 * @var string $link_image
	 * @var string $facebook_id
	 */
	public $id;
	public $link_image;
	public $id_group;
	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	// public function rules()
 //    {
 //        return array(
 //            array('image', 'file', 'types'=>'jpg, gif, png'),
 //        );
 //    }
	// return array( array('uploadedFile', 'file', 'types'=>'jpg, gif, png'),
 //                    array('image_name,image_type,image_size,image', 'safe'));
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{image}}';
	}
	
}

