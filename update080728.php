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
$lfile='update080728.lock';
if(!file_exists($lfile)){
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312" /><title>���� '.$app_n.'</title><link rel="stylesheet" type="text/css" title="Default" href="../styles.css" /></head><body><div id="body"><div id="top"><div id="logo">'.$app_n.'</div></div><div id="main"><div class="tcontent">';
	if($_SERVER['REQUEST_METHOD']=='POST'){
		require_once($c_file);
		echo '<div class="title">����MySQL���ݿ�</div><div class="gcontent"><ul>';
		$query=sprintf("alter table %s add ip varchar(255) default NULL", $dbprefix.'main');
		$result=mysql_query($query);
		echo '<li>�������ݱ� '.$dbprefix.'main��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);

		$query=sprintf("update %s set ip='%s'", $dbprefix.'main', '<a href="http://www.ip138.com/ips.asp?ip=[ip]" rel="external">[ip]</a>');
		$result=mysql_query($query);
		echo '<li>�������ݱ� '.$dbprefix.'main��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);

		$query=sprintf("alter table %s add vid int(5) NOT NULL default '0'", $dbprefix.'photo');
		$result=mysql_query($query);
		echo '<li>�������ݱ� '.$dbprefix.'photo��<span style="font-weight:bold;color:#'.($result==true?'036;">�ɹ�':'f00;">ʧ��').'</span></li>';
		unset($query);
		unset($result);
		echo '</ul><input type="button" value="���" class="button" onclick="location.href=\'../\';"/></div>';
		writeText($lfile,time());
	}else{
?>
	<div class="title">�� 1.0.5 ������ 1.0.6</div>
	<div class="lcontent">
		<form method="post">
			����������ֻ�ܴ� <strong>1.0.5</strong> ������ 1.0.6���汾̫�͵��û����������� 1.0.5����ʹ�ô���������<br/><br/>
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