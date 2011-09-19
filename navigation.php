<?php 
	defined('INFRAME')?'':header('Location: logout.php');
?>
<ul>
	<li><?=$_SESSION['username']?>，万万岁</li>
	<li><a href="client_list.php" title="客户管理">关心客户</a></li>
	<?
		if(0 == $_SESSION['usertype']){
	?>
	<li><a href="" title="员工管理">关心员工</a></li>
	<?
		}
	?>
	<li><a href="" title="文章管理">关心文章</a></li>
	<li><a href="" title="个人资料">改变自己</a></li>
	<li><a href="logout.php" title="安全退出">下班回家</a></li>
</ul>