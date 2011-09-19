<?php
require_once './require/initialization.php';
require_once './require/checkuser.php';
define('INFRAME', 'yes');

//获取客户列表
require_once Root_Path.'/require/class/DB.php';
$db = new DB();

$sql='select comName,domain,isAllow,endDate from account a left join clientInfo c on a.uid = c.uid';

if(0 == $_SESSION['usertype']){
	$sql .= ' order by a.uid desc';
}else{
	$sql .= 'where a.sid='.$_SESSION['userid'].' order by a.uid desc';
}

$clientList = $db->get_all($sql);
var_dump($clientList);
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
		</div>
	</div>
	<div id="footerBox">
		<? include 'footer.php';?>
	</div>
</div>