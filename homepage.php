<?php
require_once './require/initialization.php';
require_once './require/checkuser.php';
define('INFRAME', 'yes');
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
			<!-- 页面独立数据 -->
		</div>
	</div>
	<div id="footerBox">
		<? include 'footer.php';?>
	</div>
</div>