<?php  
/**
 * Email:   eteplus@163.com
 * Author:  eteplus
 * Date:    2014/11/25
 * Time:    15:52
 */

/**
 * 提示操作信息的，并且跳转
 * @param  string $message 提示信息
 * @param  string $url     跳转的地址
 * @return string 
 */
function alertMessage($message, $url) {
	echo "<script type='text/javascript'> alert('{$message}');location.href='{$url}';</script>";
}

/**
 * 截取文件扩展名
 * 2014-12-03 13:46:15
 * @param string $filename 文件名
 * @return string
 */
function getExt($filename) {
    $val = pathinfo($filename,PATHINFO_EXTENSION);
    return strtolower($val);
}
?>