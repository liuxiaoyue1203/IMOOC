<?php
//1.验证MySQLi扩展是否已经开启
//phpinfo();
//2.检测扩展是否已经加载
var_dump(extension_loaded('mysqli'));
var_dump(extension_loaded('curl'));
echo '<hr/>';
//3.检测函数是否存在
var_dump(function_exists('mysqli_connect'));
echo '<hr/>';
//4.得到当前已经开启的扩展
print_r(get_loaded_extensions());
echo '<hr/>';



