<?php
/////////////////////////////////////////////////////////////////////////////
// ����ͬѧ¼ (http://www.piscdong.com/?m=mini_class)
//
// (c)PiscDong studio (http://www.piscdong.com/)
//
// ������ȫ��ѣ��뱣����δ��롣
// ������۱���������޸İ棬�������ñ���������޸İ�����κ���ҵ���
/////////////////////////////////////////////////////////////////////////////

require_once('inc.php');
$lfile='update071125.lock';
if(!file_exists($lfile)){
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312" /><title>���� '.$app_n.'</title><link rel="stylesheet" type="text/css" title="Default" href="../styles.css" /></head><body><div id="body"><div id="top"><div id="logo">'.$app_n.'</div></div><div id="main"><div class="tcontent">';
	if($_SERVER['REQUEST_METHOD']=='POST'){
		require_once($c_file);
		echo '<div class="title">����MySQL���ݿ�</div><div class="gcontent"><ul>';
		$query=sprintf("alter table %s add rid int(10) NOT NULL default '0'", $dbprefix.'topic');
		$result=mysql_query($query);
		echo '<li>�������ݱ� '.$dbprefix.'topic��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);

		$query=sprintf("alter table %s add lasttime int(15) NOT NULL default '0'", $dbprefix.'topic');
		$result=mysql_query($query);
		echo '<li>�������ݱ� '.$dbprefix.'topic��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);

		$query=sprintf("update %s set lasttime=datetime", $dbprefix.'topic');
		$result=mysql_query($query);
		echo '<li>�������ݱ� '.$dbprefix.'topic��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);

		$query="create table {$dbprefix}skin (
		id int(10) NOT NULL auto_increment,
		path varchar(255) NOT NULL,
		title varchar(255) default NULL,
		sfile varchar(255) NOT NULL,
		UNIQUE KEY id (id)
		) ".((isset($charset_conn) && $charset_conn==1)?'ENGINE=MyISAM DEFAULT CHARSET=gb2312':'type=MyISAM');
		$result=mysql_query($query);
		echo '<li>�������ݱ� '.$dbprefix.'skin��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);

		$query=sprintf('insert into %s (path, title, sfile) values (%s, %s, %s)', $dbprefix.'skin',
			SQLString('blue', 'text'),
			SQLString('��ɫ����', 'text'),
			SQLString('styles.css', 'text'));
		$result=mysql_query($query);
		echo '<li>д�������� '.$dbprefix.'skin��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);

		$query=sprintf("alter table %s add skin int(10) NOT NULL default '0'", $dbprefix.'main');
		$result=mysql_query($query);
		echo '<li>�������ݱ� '.$dbprefix.'main��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);

		$query=sprintf("alter table %s add photo varchar(255) default NULL", $dbprefix.'member');
		$result=mysql_query($query);
		echo '<li>�������ݱ� '.$dbprefix.'member��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);

		$query=sprintf("alter table %s add pupload int(5) NOT NULL default '0'", $dbprefix.'member');
		$result=mysql_query($query);
		echo '<li>�������ݱ� '.$dbprefix.'member��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);
		echo '</ul><input type="button" value="���" class="button" onclick="location.href=\'../\';"/></div>';
		writeText($lfile,time());
	}else{
?>
	<div class="title">�� 1.0.1 ������ 1.0.2</div>
	<div class="lcontent">
		<form method="post">
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