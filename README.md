fileManager (在线文件管理)
------------------------
``index.php`` :  _入口文件，文件展示主页面_  
``common.func.php`` : _公共功能模块_  
``file.func.php`` : _文件功能模块_  
``dir.func.php`` : _目录功能模块_  

*（PHP函数学习笔记）*  

	bool date_default_timezone_set ('PRC')
	设定用于所有日期时间函数的默认时区为

	string file_get_contents (string $filename,FILE_USE_INCLUDE_PATH);
	将整个文件读入到一个字符串中
	$filename : 要读取的文件的名称
	return : 成功时返回数据，失败时返回 FALSE

	int file_put_contents ( string $filename ,mixed $data)
	将一个字符串写入文件中
	$filename : 要被写入数据的文件名  
	$data : 要写入的数据。类型可以是 string，array 或者是 stream 资源
	return : 成功时返回写入到文件内数据的字节数，失败时返回 FALSE

	string date (string $format [, int $timestamp ])
	返回将整数 timestamp 按照给定的格式字串而产生的字符串,如果没有给出时间戳则使用本地当前时间。换句话说，timestamp 是可选的，默认值为 time()[当前系统时间]。
	$format = "Y-m-d H:i:s" ([具体请查官方文档](http://php.net/manual/zh/function.date.php))

	bool is_readable ( string $filename )
	判断给定文件名是否存在并且可读
	$filename :  文件的路径
	return : 如果由 filename 指定的文件或目录存在并且可读则返回 TRUE，否则返回 FALSE

	bool is_writable ( string $filename )
	判断给定的文件名是否可写
	$filename : 要检查的文件名称
	return : 如果文件 filename 存在并且可写则返回 TRUE, 否则返回 FALSE

	bool is_executable ( string $filename )
	判断给定文件名是否可执行
	$filename :  文件的路径
	return : 如果文件存在且可执行则返回 TRUE，错误时返回 FALSE

	string filetype ( string $filename )
	返回文件的类型
	$filename :  文件的路径
	return : 可能的值有 fifo，char，dir，block，link，file 和 unknown , 如果出错则返回 FALSE
	(如果 stat 调用失败或者文件类型未知的话 filetype() 还会产生一个 E_NOTICE 消息)

	int filesize ( string $filename )
	取得指定文件的大小
	$filename : 文件的路径
	return : 返回文件大小的字节数，如果出错返回 FALSE 并生成一条 E_WARNING 级的错误

	int filectime ( string $filename )
	取得文件的创建的时间
	$filename : 文件的路径
	return : 返回文件创建的时间， 或者在失败时返回 FALSE。 时间以 Unix 时间戳的方式返回

	int filemtime ( string $filename )
	取得文件上次修改的时间
	$filename : 文件的路径
	return : 返回文件上次被修改的时间， 或者在失败时返回 FALSE。时间以 Unix 时间戳的方式返回，可用于 date()

	int fileatime ( string $filename )
	取得文件上次访问的时间
	$filename : 文件的路径
	return : 返回文件上次被访问的时间， 或者在失败时返回 FALSE。时间以 Unix 时间戳的方式返回

	array explode ( string $delimiter , string $string)
	此函数返回由字符串组成的数组，每个元素都是 string 的一个子串，它们被字符串 delimiter 作为边界点分割出来。
	$delimiter : 边界上的分隔字符
	$string : 输入的字符串
	return : 返回由字符串组成的数组,如果 delimiter 为空字符串（""），explode() 将返回 FALSE

	string strtolower ( string $str )
	将 string 中所有的字母字符转换为小写并返回
	$str :  输入的字符串
	return : 返回转换后的小谢字符串

	mixed end ( array &$array )
	end() 将 array 的内部指针移动到最后一个单元并返回其值
	$array : 传递的数组
	return : 返回最后一个元素的值，或者如果是空数组则返回 FALSE

	bool in_array ( mixed $needle , array $haystack [, bool $strict = FALSE ] )
	在 haystack 中搜索 needle，如果没有设置 strict 则使用宽松的比较(检查数组中是否存在某个值)
	$needle : 	待搜索的值
	$haystack : 需要查找的数组
	$strict : 如果第三个参数 strict 的值为 TRUE 则 in_array() 函数还会检查 needle 的类型是否和 haystack 中的相同
	return : 如果找到 needle 则返回 TRUE，否则返回 FALSE

	string basename ( string $path [, string $suffix ] )
	返回路径中的文件名部分
	$path : 文件路径
	$suffix : 如果文件名是以suffix结束的，那这一部分也会被去掉
	return : 返回 $path 的基本的文件名

	string dirname ( string $path )
	返回路径中的目录部分
	$path : 文件路径
	return : 返回 path 的父目录。 如果在 path 中没有斜线，则返回一个点（'.'），表示当前目录

	mixed highlight_file ( string $filename [, bool $return = false ] )
	使用PHP内置的语法高亮器所定义的颜色，打印输出或者返回 filename 文件中语法高亮版本的代码
	$filename : 欲高亮文件的路径
	$return : 设置该参数为 TRUE 使函数返回高亮后的代码				
	return : 如果 return 设置为 TRUE，高亮后的代码不会被打印输出而是以字符串的形式返回。 高亮成功返回 TRUE，否则返回 FALSE

	mixed pathinfo ( string $path [, int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME ] )
	返回文件路径的信息
	$path : 文件路径
	$options : 如果没有指定 options 默认是返回全部的单元
	return : 如果没有传入 options ，将会返回包括以下单元的数组 array：dirname，basename 和 extension（如果有），以 及filename

	mixed microtime ([ bool $get_as_float ] )
	返回当前 Unix 时间戳和微秒数
	如果给出了 get_as_float 参数并且其值等价于 TRUE，microtime() 将返回一个浮点数

	string uniqid ([ string $prefix = "" [, bool $more_entropy = false ]] )
	获取一个带前缀、基于当前时间微秒数的唯一ID
	$prefix : prefix为空，则返回的字符串长度为13。more_entropy 为 TRUE，则返回的字符串长度为23
	$more_entropy : 如果设置为 TRUE，uniqid() 会在返回的字符串结尾增加额外的煽（使用combined linear congruential generator）。 使得唯一ID更具唯一性。
	return : 返回字符串形式的唯一ID

	string md5 ( string $str [, bool $raw_output = false ] )
	计算字符串的 MD5 散列值
	$str : 原始的字符串
	$raw_output : 如果可选的raw_output被设置为 TRUE ,那么 MD5 报文摘要将以16字节长度的原始二进制格式返回
	return : 以 32 字符十六进制数字形式返回散列值

	string substr ( string $string , int $start [, int $length ] )
	返回字符串 string 由 start 和 length 参数指定的子字符串
	$string : 输入的字符串
	$start : 如果 start 是非负数，返回的字符串将从 string 的 start 位置开始，从 0 开始计算。例如，在字符串 “abcdef” 中，在位置 0 的字符是 “a”，位置 2 的字符串是 “c” 等等。
	如果 start 是负数，返回的字符串将从 string 结尾处向前数第 start 个字符开始。
	如果 string 的长度小于或等于 start，将返回 FALSE
	$length : 如果提供了正数的 length，返回的字符串将从 start 处开始最多包括 length 个字符（取决于 string 的长度）。
    如果提供了负数的 length，那么 string 末尾处的许多字符将会被漏掉（若 start 是负数则从字符串尾部算起）。
    如果 start 不在这段文本中，那么将返回一个空字符串。
    如果提供了值为 0，FALSE 或 NULL 的 length，那么将返回一个空字符串。
    如果没有提供 length，返回的子字符串将从 start 位置开始直到字符串结尾
    return : 返回提取的子字符串， 或者在失败时返回 FALSE

    float round ( float $val [, int $precision = 0 [, int $mode = PHP_ROUND_HALF_UP ]] )
    返回将 val 根据指定精度 precision（十进制小数点后数字的数目）进行四舍五入的结果。precision 也可以是负数或零（默认值）
    $val : 要处理的值
    $precision : 可选的十进制小数点后的数目
    $mode : PHP_ROUND_HALF_UP、 PHP_ROUND_HALF_DOWN PHP_ROUND_HALF_EVEN 或 PHP_ROUND_HALF_ODD
    return : 返回四舍五入后的值

    int preg_match ( string $pattern , string $subject [, array &$matches [, int $flags = 0 [, int $offset = 0 ]]] )
    搜索subject与pattern给定的正则表达式的一个匹配
    $pattern : 要搜索的模式，字符串类型
    $subject : 输入字符串
    $matches : 如果提供了参数matches，它将被填充为搜索结果。 $matches[0]将包含完整模式匹配到的文本， $matches[1] 将包含第一个捕获子组匹配到的文本，以此类推
    $flags : PREG_OFFSET_CAPTURE
    如果传递了这个标记，对于每一个出现的匹配返回时会附加字符串偏移量(相对于目标字符串的)。 注意：这会改变填充到matches参数的数组，使其每个元素成为一个由 第0个元素是匹配到的字符串，第1个元素是该匹配字符串 在目标字符串subject中的偏移量
    $offset : 通常，搜索从目标字符串的开始位置开始。可选参数 offset 用于 指定从目标字符串的某个未知开始搜索(单位是字节)
    return : 返回 pattern 的匹配次数。 它的值将是0次（不匹配）或1次，因为preg_match()在第一次匹配后 将会停止搜索。preg_match_all()不同于此，它会一直搜索subject 直到到达结尾。 如果发生错误preg_match()返回 FALSE

    bool file_exists ( string $filename )
    检查文件或目录是否存在
    $filename : 文件或目录的路径
    return : 存在则返回 TRUE ,否则返回 FALSE

    bool touch ( string $filename [, int $time = time() [, int $atime ]] )
    尝试将由 filename 给出的文件的访问和修改时间设定为给出的 time。 注意访问时间总是会被修改的，不论有几个参数
    （如果文件不存在，则创建）
    $filename : 要设定的文件名
    $time : 要设定的时间。如果没有提供参数 $time 则会使用当前系统时间
    $atime : 如果给出了这个参数，则给定文件的访问时间会被设为 $atime，否则会设置为 $time。
    如果没有给出这两个参数，则使用当前系统时间
    return : 成功时返回 TRUE , 失败时返回 FALSE

    bool rename ( string $oldname , string $newname )
    重命名一个文件或目录, 尝试把 $oldname 重命名为 $newname
    $oldname : 旧的名字
    $newname : 新的名字
    return : 成功时返回 TRUE , 失败时返回 FALSE

    bool unlink ( string $filename )
    删除文件
    $filename : 文件的路径
    return : 成功时返回 TRUE , 失败时返回 FALSE

    bool copy ( string $source , string $dest )
    拷贝文件, 将文件从 $source 拷贝到 $dest
    $source : 源文件的路径
    $dest : 目标路径, 如果 $dest 是一个 URL，则如果封装协议不支持覆盖已有的文件时拷贝操作会失败
    return : 成功时返回 TRUE , 失败时返回 FALSE

    bool is_uploaded_file ( string $filename )
    判断文件是否是通过 HTTP POST 上传的
    为了能使 is_uploaded_file() 函数正常工作，必段指定类似于 $_FILES['userfile']['tmp_name'] 的变量，而在从客户端上传的文件名 $_FILES['userfile']['name'] 不能正常运作
    $filename : 要检查的文件名
    return : 成功时返回 TRUE , 失败时返回 FALSE

    bool move_uploaded_file ( string $filename , string $destination )
    将上传的文件移动到新位置
    本函数检查并确保由 $filename 指定的文件是合法的上传文件（即通过 PHP 的 HTTP POST 上传机制所上传的）。如果文件合法，则将其移动为由 $destination 指定的文件
    $filename : 上传的文件的文件名
    $destination : 移动文件到这个位置
    return : 成功时返回 TRUE。
	如果 filename 不是合法的上传文件，不会出现任何操作，move_uploaded_file() 将返回 FALSE。
	如果 filename 是合法的上传文件，但出于某些原因无法移动，不会出现任何操作，move_uploaded_file() 将返回 FALSE。此外还会发出一条警告

	resource opendir ( string $path )
	打开目录句柄
	$path : 要打开的目录的路径
	return : 如果成功则返回目录句柄的 resource，失败则返回 FALSE
	如果 path 不是一个合法的目录或者因为权限限制或文件系统错误而不能打开目录，opendir() 返回 FALSE 并产生一个 E_WARNING 级别的 PHP 错误信息。可以在 opendir() 前面加上“@”符号来抑制错误信息的输出

	void closedir ( resource $dir_handle )
	关闭目录句柄
	$dir_handle : 目录句柄的 resource，之前由 opendir() 打开

	string readdir ([ resource $dir_handle ] )
	从目录句柄中读取条目 (返回目录中下一个文件的文件名。文件名以在文件系统中的排序返回)
	$dir_handle : 目录句柄的 resource，之前由 opendir() 打开
	return : 成功则返回文件名 或者在失败时返回 FALSE

	bool is_file ( string $filename )
	判断给定文件名是否为一个正常的文件
	$filename : 文件的路径
	return : 如果文件存在且为正常的文件则返回 TRUE，否则返回 FALSE

	bool is_dir ( string $filename )
	判断给定文件名是否是一个目录
	$filename : 文件的路径, 如果文件名存在并且为目录则返回 TRUE。如果 $filename 是一个相对路径，则按照当前工作目录检查其相对路径
	return : 如果文件名存在，并且是个目录，返回 TRUE，否则返回 FALSE

	bool mkdir ( string $pathname [, int $mode = 0777 [, bool $recursive = false ] )
	尝试新建一个由 $pathname 指定的目录
	$pathname : 目录的路径
	$mode : 默认的 mode 是 0777，意味着最大可能的访问权,设置目录的权限
	$rescursive : 是否嵌套创建目录
	return : 成功时返回 TRUE， 失败时返回 FALSE

-----------------------------------------------

	Heredoc技术（常用在输出包含大量HTML语法文档的时候）
	以<<<EOF标记开始，以EOF标记结束
	结束标记必须顶头写，不能有缩进和空格，且在结束标记末尾要有分号 
	example :
		$str = <<<EOF
	    <form action="index.php?action=doCutFile" method = "post">
	        <input type="text"  name="dstname" placeholder="将文件剪切到"/>
	        <input type="hidden" name="path" value="{$path}" />
	        <input type="hidden" name="filename" value="{$filename}" />
	        <input type="submit" value="剪切文件" />
	    </form>
	EOF;
	    echo $str;



