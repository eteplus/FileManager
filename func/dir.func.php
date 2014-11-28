<?php
/**
 * Email:   eteplus@163.com
 * Author:  eteplus
 * Date:    2014/11/22
 * Time:    10:25
 */

/**
 * 打开并读取指定目录
 * @param $path
 * @return array
 */
function readDirectory($path) {
    $handle = opendir($path);
    while(($item = readdir($handle)) !== false) {
        // .  表示当前目录
        // .. 表示上级目录
        if($item != "." && $item != "..") {
            //is_file() 判断是否为文件
            if(is_file($path."/".$item)) {
                $arr['file'][] = $item;
            }
            //is_dir() 判断是否为目录
            if(is_dir($path."/".$item)) {
                $arr['dir'][] = $item;
            }
        }
    }
    closedir($handle);
    return $arr;
}