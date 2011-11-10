<?php
function getParamFromRequest($param, $defaultValue = '') {
	return filterChar ( isset ( $_REQUEST [$param] ) ? $_REQUEST [$param] : $defaultValue );
}

/**
 * 验证GET中传入的page
 *
 * @return int $page
 */
function getPageFromGET($paramName = 'page') {
	$page = getParamFromRequest ( $paramName, 1 );
	$page = intval ( $page );
	if ($page <= 0) {
		$page = 1;
	}
	return $page;
}

function getClientIp() {
	return $_SERVER['REMOTE_ADDR'];
}

function filterChar($value) {
	if (is_string ( $value )) {
		return htmlspecialchars ( trim ( $value ) );
	} else if (is_array ( $value )) {
		foreach ( $value as $k => $v ) {
			$value [$k] = $this->filterChar ( $v );
		}
		return $value;
	}
	return $value;
}

function returnJsonData($data) {
	echo json_encode ( $data );
	exit(0);
}

function gbkToUtf8 ($value) {
    return iconv("gbk", "UTF-8", $value);
}

function utf8ToGbk ($value) {
    return iconv("UTF-8", "gbk", $value);
}

/**
 * 生成唯一的id
 */
function getUniqueId () {
    //这个方法待定
    return md5(uniqid(microtime()));
}
    
function showMessage($message, $forwardUrl = '', $param = array()) {
	$extrahead = $forwardUrl ? '<meta http-equiv="refresh" content="3;url=' . $forwardUrl . '">' : '';
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统提示</title>
<style type="text/css">
<!--
*{padding:0px;margin:0px;}
a, a:visited {text-decoration:none;color:#06c;}
a:hover {text-decoration:underline;color:#F60;}
body {font:100 12px/normal simsun;overflow:hidden;}
dl {margin:150px auto 0px;width:400px;padding:1px;border:1px solid #D2EEFB;background:#FFF;}
dt {text-indent:8px;font:800 12px/25px Arial;border-bottom:1px solid #D2EEFB;color:#666666;background:#E7F4FE;}
dd {padding:30px 0 30px 100px;text-align:left;background:url(/images/front/bg-tips.png) no-repeat 30px 50%;}
dd h5 {margin-bottom:10px;font:100 12px/17px simsun;}
-->
</style>
</head>
<body>
<dl>
	<dt>系统提示：</dt>
	<dd>
	<h5><?php
	echo $message;
	?></h5>
	<div>
		<?php
	if ($forwardUrl) {
		?>
			<?php
		echo $extrahead?>
			<a href="<?php
		echo $forwardUrl?>">如果你的浏览器没反应，请点击这里...</a>
		<?php
	} else {
		?>
			<a href="javascript:history.back(-1)">如果你的浏览器没反应，请点击这里...</a>
		<?php
	}
	?>
		</div>
	</dd>
</dl>
</body>
</html>
<?php
	exit ( 0 );
}
?>