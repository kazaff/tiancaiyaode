<?php
require_once './require/initialization.php';
require_once './require/checkuser.php';
define('INFRAME', 'yes');

//处理提交
$message = '';
if(!empty($_POST)){
	
	//验证必填项
	$warning = '请填写：';
	$isOK = TRUE;
	$MapArr = array('account'=>'登录账号','psw'=>'登录密码','comname'=>'公司名称','username'=>'联系人','mobile'=>'手机','endTime'=>'到期时间');
	foreach ($MapArr as $index => $val){
		if(empty($_POST[$index])){
			$isOK = FALSE;
			$warning .= $val.'，';
		}
	}
	//验证不通过
	if(!$isOK){
		$message = mb_substr($warning, 0, -1,'utf-8') . '！';
	}else{
		require_once Root_Path.'/require/class/DB.php';
		$db = new DB();
		$dataArr = array(
			'sid'		=> $_SESSION['userid'],
			'account'	=> $_POST['account'],
			'password'	=> $_POST['psw'],
			'domain'	=> $_POST['domain'],
			'isAllow'	=> $_POST['isAllow'],
			'startDate'	=> date('Y-m-d H:i:s'),
			'endDate'	=> $_POST['endTime']
		);
		$db->query('start transaction');
		
		if(!$db->insert('account', $dataArr)){
			$db->query('rollback');
			$message = '数据录入失败！';
		}else{
			$uid = $db->insert_id();	//获取上条语句插入后的主键
			$dataArr = array(
				'uid'	 	=> $uid,
				'comName'	=> $_POST['comname'],
				'boss'		=> $_POST['username'],
				'mobile'	=> $_POST['mobile'],
				'tel'		=> $_POST['tel'],
				'qq'		=> $_POST['qq'],
				'email'		=> $_POST['email'],
				'address'	=> $_POST['address'],
				'remark'	=> $_POST['remark']
			);
			if(!$db->insert('clientInfo', $dataArr)){
				$db->query('rollback');
				$message = '数据录入失败！';
			}else{
				$db->query('commit');
				header('Location: client_list.php');
			}
		}
	}
}
?>
<div id="bigBox">
	<div id="headerBox">
		<? include 'header.php';?>
	</div>
	<div id="mainBox">
		<div id="navBox">
			<? include 'navigation.php';?>
		</div>
		<div id="dataBox">
			<div id="toolBar">
				<a href="client_add.php" title="添加客户">财神来到</a>
			</div>
			<div id="dataForm">
				<div id="message">
					<?=$message?>
				</div>
				<form action="" method="post">
					<table>
						<tr>
							<td>登录账号：</td>
							<td><input type="text" name="account" /></td>
						</tr>
						<tr>
							<td>登录密码：</td>
							<td><input type="text" name="psw" /></td>
						</tr>
						<tr>
							<td>社团名称：</td>
							<td><input type="text" name="comname" /></td>
						</tr>
						<tr>
							<td>域名：</td>
							<td><input type="text" name="domain" /></td>
						</tr>
						<tr>
							<td>掌门：</td>
							<td><input type="text" name="username" /></td>
						</tr>
						<tr>
							<td>大哥大：</td>
							<td><input type="text" name="mobile" /></td>
						</tr>
						<tr>
							<td>报话机：</td>
							<td><input type="text" name="tel" /></td>
						</tr>
						<tr>
							<td>企鹅：</td>
							<td><input type="text" name="qq" /></td>
						</tr>
						<tr>
							<td>邮箱：</td>
							<td><input type="text" name="email" /></td>
						</tr>
						<tr>
							<td>地址：</td>
							<td>
								<textarea name="address"></textarea>
							</td>
						</tr>
						<tr>
							<td>到期时间：</td>
							<td><input type="text" name="endTime" /></td>
						</tr>
						<tr>
							<td>状态：</td>
							<td>
								<input type="radio" name="isAllow" value="1" />激活中
								<input type="radio" name="isAllow" value="0" />禁用中
							</td>
						</tr>
						<tr>
							<td>备注：</td>
							<td>
								<textarea name="remark"></textarea>
							</td>
						</tr>
						<tr>
							<td><input type="submit" value="添加" /></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<div id="footerBox">
		<? include 'footer.php';?>
	</div>
</div>