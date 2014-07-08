<?php
class MemberController extends Controller 
{	
	public function actionShowMember()
	{
		$users = Userduan::model()->findAll(array('order' => 'id DESC'));
		if($users !== NULL)
		{
			$this->render('showmember', array("list_member" => $users));
		}
		else {
			$empty_member = "No member";
			$this->render('showmember', array("empty_member" => $empty_member));
		}
	}

}
