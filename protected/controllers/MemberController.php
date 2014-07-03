<?php
class MemberController extends Controller 
{	
	public function actionShowMember()
	{
		$model = User::model()->findAll(array('order' => 'id DESC'));
		if($model !== NULL)
		{
			$this->render('showmember', array("list_member" => $model));
		}
		else {
			$empty_member = "No member";
			$this->render('showmember', array("empty_member" => $empty_member));
		}
	}

}
