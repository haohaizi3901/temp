<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>列表</title>
    <meta  http-equiv="content-type" content="text/html;charset=utf-8"/>
    <?php
      include "sqlHelper.php";
    ?>
</head>
<body>
    <div>
        <ul>
            <?php
       
           $sql="select * from funinfo";
           $array=getArray($sql);
           if(count($array)>0)
           {
               foreach ($array as $key=>$val)
               {
                   echo "<li><span><a href='detail.php?id=".$val["id"]."' target='_blank'>".$val["name"]."</a>：".$val["content"]."</span></li>";
               }     
           }
    
          ?>
        </ul>
    </div>
   
</body>
</html>

