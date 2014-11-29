<?php
/**
 * Email:   eteplus@163.com
 * Author:  eteplus
 * Date:    2014/11/22
 * Time:    10:25
 */
require_once './func/dir.func.php';
require_once './func/file.func.php';
require_once './func/common.func.php';
date_default_timezone_set('PRC');
$path = 'file';
$info = readDirectory($path);
$action = @$_REQUEST["action"];
$filename = @$_REQUEST["filename"];
$redirect = "index.php?path={$path}";
//创建文件
if($action == "createFile") {
    //echo $path;
    //echo $filename;
    $message = createFile($path.'/'.$filename);
    alertMessage($message ,$redirect);
}
elseif($action == "showContent") {
    //查看文件内容
    $content = file_get_contents($filename,FILE_USE_INCLUDE_PATH);
    //echo "<textarea readonly='readonly' cols='100' rows='10'>{$content}</textarea>";
    //高亮显示PHP代码
    //高亮显示文本中的代码
    //highlight_file($filename);
    if(strlen($content)){
        //高亮显示字符串中的PHP代码
        $HightLightContent = highlight_string($content, true);
        $str = <<<EOF
<table width="100%" bgcolor="pink" cellpadding="5" cellspacing='0'>
    <tr>
        <td>{$HightLightContent}</td>
    </tr>
</table>
EOF;
        echo $str;
    }
    else {
        alertMessage("文件没有内容，请编辑后再查看",$redirect);
    }
}
elseif($action == "editContent") {
    //修改文件内容
    $content = file_get_contents($filename);
    $str = <<<EOF
    <form aciton='index.php' method='post'>
        <textarea name='content' cols='190' rows='10'>{$content}</textarea><br />
        <input type="hidden" name="action" value="doEdit"/>
        <input type='hidden' name='filename' value='{$filename}'/>
        <input type="submit" value="修改文件内容"/>
    </form>
EOF;
    echo $str;
}
elseif($action == "doEdit") {
    //修改文件内容操作
    $content = $_REQUEST['content'];
    echo $content;
    if(file_put_contents($filename,$content)) {
        $message = "文件修改成功";
    }
    else {
        $message = "文件修改失败";
    }
    alertMessage($message ,$redirect);
}
?>
<!DOCTYPE html>
<hmtl>
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
        <title>在线文件管理器</title>
        <link rel="stylesheet" href="css/cikonss.css"/>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <link rel="stylesheet" href="css/jquery-ui.css"/>
        <style type="text/css">
            body,p,div,ul,ol,table,dl,dd,dt{
                margin:0;
                padding: 0;
            }
            a{
                text-decoration: none;
            }
            ul,li{
                list-style: none;
                float: left;
            }
            #top{
                width:100%;
                height:48px;
                margin:0 auto;
                background: #E2E2E2;
            }
            #navi a{
                display: block;
                width:48px;
                height: 48px;
            }
        </style>
        <script type="text/javascript">
            function show(dis){
                var doc = document;
                doc.getElementById(dis).style.display="block";
            }
            function showPicture(filename ,src) {
                //console.log(filename);
                //console.log(src);
                $("#showImg").attr("src",src);
                $("#showImgDiv").dialog(
                    {
                        height:"auto",
                        width:"auto",
                        position:{my:"center" ,at:"center" ,collision:"fit"},
                        modal:false, //是否模式对话框
                        draggable:true, //是否允许拖拽
                        resizable:true, //是否允许拖动
                        title:filename, //对话框标题
                        show:"slide",
                        hide:"explode"
                    }
                );
            }
        </script>
    </head>
    <body>
    <div id="showImgDiv" style="display: none"><img src="" id="showImg" alt=""/></div>
    <h1>在线文件管理器</h1>
    <div id="top">
        <ul id="navi">
            <li><a href="index.php" title="主目录"><span style="margin-left: 8px; margin-top: 0px; top: 4px;" class="icon icon-small icon-square"><span class="icon-home"></span></span></a></li>
            <li><a href="#"  onclick="show('createFile')" title="新建文件" ><span style="margin-left: 8px; margin-top: 0px; top: 4px;" class="icon icon-small icon-square"><span class="icon-file"></span></span></a></li>
            <li><a href="#"  onclick="show('createFolder')" title="新建文件夹"><span style="margin-left: 8px; margin-top: 0px; top: 4px;" class="icon icon-small icon-square"><span class="icon-folder"></span></span></a></li>
            <li><a href="#" onclick="show('uploadFile')"title="上传文件"><span style="margin-left: 8px; margin-top: 0px; top: 4px;" class="icon icon-small icon-square"><span class="icon-upload"></span></span></a></li>
            <?php
            $back=($path=="file")?"file":dirname($path);
            ?>
            <li><a href="#" title="返回上级目录" onclick="goBack('<?php echo $back;?>')"><span style="margin-left: 8px; margin-top: 0px; top: 4px;" class="icon icon-small icon-square"><span class="icon-arrowLeft"></span></span></a></li>
        </ul>
    </div>
        <form action="index.php" method="post" enctype="multipart/form-data">
        <table width="100%" border="1" cellpadding="5" cellspacing="0" bgcolor="#ABCDEF" align="center">
            <tr id="createFile"  style="display:none;">
                <td>请输入文件名称</td>
                <td >
                    <input type="text"  name="filename" />
                    <input type="hidden" name="path" value="<?php echo $path;?>"/>
                    <input type="hidden" name="action" value="createFile"/>
                    <input type="submit" value="创建文件" />
                </td>
            </tr>
            <tr id="createFolder"  style="display:none;">
                <td>请输入文件夹名称</td>
                <td >
                    <input type="text" name="dirname" />
                    <input type="hidden" name="path"  value="<?php echo $path;?>"/>
                    <input type="submit"  value="创建文件夹"/>
                </td>
            </tr>

            <tr id="uploadFile" style="display:none;">
                <td >请选择要上传的文件</td>
                <td ><input type="file" name="myFile" />
                    <input type="submit" value="上传文件" />
                </td>
            </tr>
            <tr>
                <td>编号</td>
                <td>名称</td>
                <td>类型</td>
                <td>大小</td>
                <td>可读</td>
                <td>可写</td>
                <td>可执行</td>
                <td>创建时间</td>
                <td>修改时间</td>
                <td>访问时间</td>
                <td>操作</td>
            </tr>
            <?php
                if($info['file']) {
                    $i = 1;
                    foreach ($info['file'] as $val) {
                            $paths = $path.'/'.$val;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td><!--编号-->
                            <td><?php echo $val; ?></td><!--名称-->
                            <td><!--类型-->
                                <?php $src = filetype($paths)=='file' ? 'file_ico.png':'folder_ico.png'; ?>
                                <img src="images/<?php echo $src;?>" alt="" width="32" height="32"/>
                            </td>
                            <td><!--大小-->
                                <?php echo transByte(filesize($paths)); //获取文件大小?>
                            </td>
                            <td><!--可读-->
                                <?php
                                    $is_read = is_readable($paths);
                                    if($is_read) {
                                        echo '<img src="images/correct.png?>" alt=""   width="32" height="32"/>';
                                    }
                                    else {
                                        echo '<img src="images/ban.png?>" alt=""   width="32" height="32"/>';
                                    }
                                ?>
                            </td>
                            <td><!--可写-->
                                <?php
                                $is_write = is_writable($paths);
                                if($is_write) {
                                    echo '<img src="images/correct.png?>" alt="" width="32" height="32"/>';
                                }
                                else {
                                    echo '<img src="images/ban.png?>" alt=""   width="32" height="32"/>';
                                }
                                ?>
                            </td>
                            <td><!--可执行-->
                                <?php
                                $is_execut = is_executable($paths);
                                if($is_execut) {
                                    echo '<img src="images/correct.png?>" alt=""  width="32" height="32"/>';
                                }
                                else {
                                    echo '<img src="images/ban.png?>" alt=""  width="32" height="32"/>';
                                }
                                ?>
                            </td>
                            <td><!--创建时间-->
                                <?php
                                    echo date("Y-m-d H:i:s",filectime($paths));
                                ?>
                            </td>
                            <td><!--修改时间-->
                                <?php
                                    echo date("Y-m-d H:i:s",filemtime($paths));
                                ?>
                            </td>
                            <td><!--访问时间-->
                                <?php
                                echo date("Y-m-d H:i:s",fileatime($paths));
                                ?>
                            </td>
                            <td><!--查看、修改、重命名、复制、剪切、删除、下载-->
                                <?php
                                //得到扩展名
                                /**
                                 * string strtolower(string $str) 将 string 中所有的字母字符转换为小写并返回
                                 * array explode ( string $delimiter , string $string [, int $limit ] )
                                 *  此函数返回由字符串组成的数组，每个元素都是 string 的一个子串，它们被字符串 delimiter 作为边界点分割出来
                                 * mixed end ( array &$array )
                                 *  end() 将 array 的内部指针移动到最后一个单元并返回其值
                                 * in_array — 检查数组中是否存在某个值
                                 */
                                $ext = strtolower(end(explode(".",$val)));
                                $imageExt = array("gif","jpg", "jpeg", "png","bmp");
                                if(in_array($ext ,$imageExt)) {
                                    ?>
                                    <a href="#" onclick="showPicture('<?php echo $val; ?>','<?php echo $paths ?>')">
                                        <img src="images/show.png" alt="" title="查看" width="32" height="32"/></a>
                                <?php
                                }
                                else {
                                ?>
                                <a href="index.php?action=showContent&filename=<?php echo $paths; ?>"><img src="images/show.png" alt="" title="查看" width="32" height="32"/></a>
                                <?php } ?>
                                <a href="index.php?action=editContent&filename=<?php echo $paths; ?>"><img src="images/edit.png" alt="" title="修改" width="32" height="32"/></a>
                                <a href=""><img src="images/rename.png" alt="" title="重命名" width="32" height="32"/></a>
                                <a href=""><img src="images/copy.png" alt=""  title="复制" width="32" height="32"/></a>
                                <a href=""><img src="images/cut.png" alt="" title="剪切" width="32" height="32"/></a>
                                <a href=""><img src="images/delete.png" alt="" title="删除" width="32" height="32"/></a>
                                <a href=""><img src="images/download.png" alt="" title="下载" width="32" height="32"/></a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                }
            ?>
        </table>
        </form>
    </body>
</hmtl>