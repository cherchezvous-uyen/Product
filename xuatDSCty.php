<?php
include ("MyClass/tmdt_class.php");
$p = new tmdt();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
<?php
$p->print_dscty("select *from congty order by tencty asc");
?>
</body>
</body>
</html>