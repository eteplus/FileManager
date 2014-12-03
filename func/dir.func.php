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

/**
 * 得到文件夹大小
 * 2014-12-03 13:56:56
 * @param string $path 文件路径
 * @return int
 */
function dirSize($path) {
    $sum = 0;
    global $sum;
    $handle = opendir($path);
    while(($item = readdir($handle)) !== false) {
        if($item != "." && $item != "..") {
            if(is_file($path."/".$item)) {
                $sum += filesize($path."/".$item);
            }
            if(is_dir($path."/".$item)) {
                $func = __FUNCTION__;
                $func($path."/".$item);
            }
        }
    }
    closedir($handle);
    return $sum;
}

/**
 * 复制文件夹
 * 2014-12-03 16:09:48
 * @param string $src 需要复制的文件夹
 * @param string $dst 目标文件夹
 * return string
 */
function copyFolder($src ,$dst) {

    //文件夹不存在，则创建多级目录
    if(!file_exists($dst)) {
        /**
         * $dst 文件路径
         * 0777 设定目录的路径
         * true 表示允许创建多级目录
         */
        mkdir($dst , 0777, true);
    }
    $handle = opendir($src);
    while(($item = readdir($handle)) !== false) {
        /**
         * 如果是文件夹，使用递归的方法把子文件夹下的文件进行复制
         */
        if($item != "." && $item != "..") {
            if(is_file($src."/".$item)) {
                copy($src."/".$item ,$dst."/".$item);
            }
            if(is_dir($src."/".$item)) {
                $func = __FUNCTION__;
                $func($src."/".$item, $dst."/".$item);
            }
        }
    }
    closedir($handle);
    return "复制成功";
}

/**
 * 剪切文件夹
 * 2014-12-03 16:52:19
 * @param string $src 需要剪切的文件夹
 * @param string $dst 目标文件夹
 * return string
 */
function cutFolder($src ,$dst) {
    echo $dst;
    if(file_exists($dst)) {
        if(is_dir($dst)) {
            if(!file_exists($dst."/".basename($src))) {
                if(rename($src ,$dst."/".basename($src))) {
                    return "剪切成功";
                }
                else {
                    return "剪切失败";
                }
            }
            else {
                return "存在同名文件夹";
            }
        }
        else {
            return $dst." 不是一个文件夹";
        }
    }
    else {
        return "目标文件夹不存在";
    }
}

/**
 * 重命名文件夹
 * 2014-12-03 16:39:45
 * @param string $oldname
 * @param string $newname
 * @return string
 */
function renameFolder($oldname, $newname) {
    //检查文件夹名称的合法性
    if(checkFilename(basename($newname))) {
        //检查当前目录下是否存在同名文件夹名称
        if(!file_exists($newname)) {
            if(rename($oldname, $newname)) {
                return "重命名成功";
            }
            else {
                return "重命名失败";
            }
        }
        else {
            return "存在同名文件夹";
        }
    }
    else {
        return "非法文件夹名称";
    }
}

/**
 * 创建文件夹
 * 2014-12-03 16:42:15
 * @param string $dirname
 * @return string
 */
function createFolder($dirname) {
    //检查文件夹名称的合法性
    if(checkFilename(basename($dirname))) {
        //检查当前目录下是否存在同名文件夹名称
        if(!file_exists($dirname)) {
            if(mkdir($dirname,0777,true)) {
                return "文件夹创建成功";
            }
            else {
                return "文件夹创建失败";
            }
        }
        else {
            return "存在同名文件夹";
        }
    }
    else {
        return "非法文件夹名称";
    }
}