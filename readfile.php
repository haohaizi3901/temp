<?php
        
     function readfileOne()
     {
        //打开文件
        $fs=fopen("user.txt","r");
        if(!$fs)
        {
            echo "文件不存在";
            exit;
        }
        //读文件
        // fgets()函数 每次读取一行数据  feof判断文件是否结束
        while(!feof($fs))
        {
            $bruce=fgets($fs);
            echo $bruce."</br>";
        }
        //关闭文件     
        fclose($fs);
     }
  
     function readfiletwo(){

      $alltext=readfile("user.txt"); //返回的是文件大小
      echo $alltext;   
    }
  
    function writetext()
    {
        $fp=fopen("user111.txt",a);
        fwrite($fp,"haoxiaozi,admin");
        fclose($fp);
    }
    
    //创建多级目录
    function createdir()
    {
       $path="./".date("Y-m-d");
       if(!is_dir($path))
       {
           //中文处理  iconv("UTF-8", "GBK", $path);
           mkdir($path,0777,true);
       }
    }
?>