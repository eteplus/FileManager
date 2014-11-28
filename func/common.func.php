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
?>