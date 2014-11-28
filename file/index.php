<?php
/**
 * Email:   eteplus@163.com
 * Author:  eteplus
 * Date:    2014/11/22
 * Time:    10:25
 */
require './func/dir.func.php';
$path = 'file';
$info = readDirectory($path);
//print_r($info);
?>
<hmtl>
    <head>
        <meta charset="utf-8"/>
        <title>在线文件管理器</title>
    </head>
    <body>
        <table width="100%" border="1" cellpadding="5" cellspacing="0" bgcolor="#ABCDEF" align="center">
            <tr>
                <td>编号</td>
                <td>名称</td>
                <td>类型</td>
                <td>大小</td>
                <td>可读</td>
                <td>可写</td>
                <td>可执行</td>
                <td>创建时间</td>
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
                            <td><?php echo $i; ?></td>
                            <td><?php echo $val; ?></td>
                            <td>
                                <?php $src = filetype($paths)=='file' ? 'file_ico.png':'folder_ico.png'; ?>
                                <img src="images/<?php echo $src;?>" alt=""/>
                            </td>
                            <td>
                                <?php echo filesize($paths); //获取文件大小?>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                }
            ?>
        </table>
    </body>
</hmtl>