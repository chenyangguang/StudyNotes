<html>
<head>
<meta = http-equiv="Content-type" content="text/html; charset=utf-8">
</head>
<body>
<?php
//1 传入页码
//echo "<pre>";
//echo $_SERVER;
//echo </pre>
//
$page = $_GET['p'];
//2 根据页码取出数据：php -> mysql处理
$host = "localhost";
$username = 'root';
$password = '';
$db = 'page';
$pageSize = 10;
$showPage = 5; //显示几个页码

//连接数据库
$conn = mysql_connect($host, $username, $password);
if (!$conn) {
	echo "connect failed";
	exit;
}

mysql_select_db($db);
mysql_query("SET NAMES UTF8");
$limit = 10;
$sql = "SELECT * FROM page LIMIT " . ($page-1)*$limit.",10";
$result = mysql_query($sql);
echo "<table>";
echo "<tr><td>Id</td><td>Name</td></tr>";


while ($row = mysql_fetch_assoc($result)) {
	echo "<tr>";
	echo "<td>{$row['id']}</td>";
	echo "{$row['name']}, '<br />'<td>";
	echo "</tr>";
}
echo "</table>";
mysql_free_result($result);

$total_sql = "SELECT COUNT(*) FROM page";
$total_result = mysql_fetch_array(mysql_query($total_sql));
$total = $total_result[0];

$total_pages = ceil($total/$pageSize);
mysql_close($conn);

//计算偏移量
$pageoffset  = ($showPage-1)/2;
$start = 1;
$end = $total_pages;

if ($page > 1) {
	$page_banner = "<a href='".$_SERVER['PHP_SELF']."?p=1>首页</a>";
	$page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=.($page-1)'>上一页</a>";
}


if ($total_pages > $showPage) {
	if ($page > $pageoffset+1) {
		$page_banner .= '...';
	}

	if ($page > $pageoffset) {
		$start = $page - $pageoffset;
		$end = $total_pages > $page + $pageoffset ? $page+$pageoffset : $total_pages;
	}else {
		$start = 1;
		$end = $total_pages > $showPage ? $showPage : $total_pages;
	}

	if ($page + $pageoffset > $total_pages) {
		$start = $start - ($page+$pageoffset-$end);
	}
}

for ($i = $start; $i <= $end; $i++) {
	$page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
}
if ($total_pages > $showPage && $total_pages > $page + $pageoffset) {
	$page_banner .= '...';
}

if ($page < $total_pages) {
	$page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=.($page+1)'>下一页</a>";
	$page_banner = "<a href='".$_SERVER['PHP_SELF']."?p=$total_pages> 尾页</a>";
}

mysql_close($conn);

$page_banner = "<a href='".$_SERVER['PHP_SELF']."?p=.($page-1)'>上一页</a>";
echo $page_banner;
//3 显示数据+分页条
?>
<body>
	<html>
