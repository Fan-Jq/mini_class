<?php
/////////////////////////////////////////////////////////////////////////////
// ����ͬѧ¼ (http://mini_class.piscdong.com/)
//
// (c)PiscDong studio (http://www.piscdong.com/)
//
// ������ȫ��ѣ��뱣����δ��롣
// ������۱���������޸İ棬�������ñ���������޸İ�����κ���ҵ���
/////////////////////////////////////////////////////////////////////////////

require_once('inc.php');
$lfile='update080701.lock';
if(!file_exists($lfile)){
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312" /><title>���� '.$app_n.'</title><link rel="stylesheet" type="text/css" title="Default" href="../styles.css" /></head><body><div id="body"><div id="top"><div id="logo">'.$app_n.'</div></div><div id="main"><div class="tcontent">';
	if($_SERVER['REQUEST_METHOD']=='POST'){
		require_once($c_file);
		echo '<div class="title">����MySQL���ݿ�</div><div class="gcontent"><ul>';
		$query=sprintf("alter table %s change url url text NOT NULL", $dbprefix.'photo');
		$result=mysql_query($query);
		echo '<li>�������ݱ� '.$dbprefix.'photo��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);

		$query=sprintf("alter table %s add cdate varchar(255) default NULL", $dbprefix.'camp');
		$result=mysql_query($query);
		echo '<li>�������ݱ� '.$dbprefix.'camp��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);

		$query=sprintf("alter table %s add cloc varchar(255) default NULL", $dbprefix.'camp');
		$result=mysql_query($query);
		echo '<li>�������ݱ� '.$dbprefix.'camp��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);

		$query=sprintf("alter table %s add cpay varchar(255) default NULL", $dbprefix.'camp');
		$result=mysql_query($query);
		echo '<li>�������ݱ� '.$dbprefix.'camp��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);

		$query="create table {$dbprefix}cuser (
		id int(10) NOT NULL auto_increment,
		aid int(10) NOT NULL default '0',
		cid int(10) NOT NULL default '0',
		tid int(10) NOT NULL default '1',
		datetime int(15) NOT NULL default '0',
		UNIQUE KEY id (id)
		) ".(chksqlv()?'ENGINE=MyISAM DEFAULT CHARSET=gb2312':'type=MyISAM');
		$result=mysql_query($query);
		echo '<li>�������ݱ� '.$dbprefix.'cuser��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);
		echo '</ul><input type="button" value="���" class="button" onclick="location.href=\'../\';"/></div>';
		writeText($lfile,time());
	}else{
?>
	<div class="title">�� 1.0.4 ������ 1.0.5</div>
	<div class="lcontent">
		<form method="post">
			����������ֻ�ܴ� <strong>1.0.4</strong> ������ 1.0.5���汾̫�͵��û����������� 1.0.4����ʹ�ô���������<br/><br/>
			<div class="formline"><input type="submit" value="��һ��" id="formsubmit" class="button" /></div>
		</form>
	</div>
<?php
	}
	echo getsfoot();
}else{
	header('Location:../');
}
?>