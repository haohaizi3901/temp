<html xmlns="http://www.w3.org/1999/xhtml">
<head><title></title>
    <meta  http-equiv="content-type"  content="text/html;charset=utf-8">
</head>
<body>
    <?php
 
    $fp=fopen("../user.txt","r");
    if(!$fp)
    {
        echo "文件打开失败";
        exit;
    }
     $dataArray=array();
     $i=0;
      while(!feof($fp)){
          $row=fgets($fp);
          $cells=explode(",",$row);
         $dataArray[$i]=array("name"=>$cells[0],"pwd"=>$cells[1]);
         $i++;
    }
  
    $sql="insert into userinfo(`name`,pwd) values ";
    foreach ($dataArray as $key=>$value)
    {
    	$sql.="('".$value["name"]."','".trim($value["pwd"])."'),";
    }
    
    $sql=trim($sql,",");
    
    //创建数据库连接
    $conn=mysql_connect("localhost","root","sasa");
    if(!$conn)
    {
        die("数据库连接失败".mysql_error);
    }
    //选择需要操作的数据库
    mysql_select_db("test",$conn);
    //执行sql语句
    $res=mysql_query($sql,$conn);
    //关闭数据库连接
    mysql_close();
             
?>
</body>
</html>

