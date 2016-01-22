<?php
   
     /* 
      *方法一：  (1) 打开文件 fopen 
                             r    只读——读模式，打开文件，从文件头开始读
                             r+    可读可写方式打开文件，从文件头开始读写
                             w    只写——写方式打开文件，同时把该文件内容清空，把文件指针指向文件开始处。如果该文件已经存在，将删除文件已有内容；如果该文件不存在，则建立该文件
                             w+    可读可写方式打开文件，同时把该文件内容清空，把文件指针指向文件开始处。如果该文件不存在，则建立该文件
                             a    追加    以只写方式打开文件，把文件指针指向文件末尾处。如果该文件不存在，则建立该文件
                             a+    追加    以可读可写方式打开文件，把文件指针指向文件末尾处。如果该文件不存在，则建立该文件
                             b    二进制    用于于其他模式进行连接。建议使用该选项，以获得更大程度的可移植性
      
                   (2) 读文件  
                          读文件一次没有读完时，用feof(文件指针)判断是否是文件末尾
                                      2.1 按大小读 fread(文件指针,读取文件大小)
                                       2.2 按行读  fgets(文件指针)
                                       2.3 按大小读去掉html,php标记     fgetss(文件指针,读取文件大小，忽略的标签)
                  
                    (3) 关闭文件 fclose(文件指针)
      
      * 方法二 ： array file ( string $filename [, int $use_include_path [, resource $context ]] ) 将文件读入数组中，一行一项（包括换行 rtrim可过滤）
      * 方法三： int readfile ( string $filename [, bool $use_include_path [, resource $context ]] )  读入一个文件并写入到输出缓冲
      * 方法四(推荐)：string file_get_contents ( string $filename [, bool $use_include_path [, resource $context [, int $offset [, int $maxlen ]]]] )
      * 
      * 
      * */

/*
 *  写文件 
     $fp=fopen("user.txt",a);  //打开文件
      fwrite($fp,"haoxiaozi,admin"); //写入文件
      fclose($fp); //关闭文件
 * */


/*
 * mkdir($path,0777,true);
第一个参数：必须，代表要创建的多级目录的路径；
第二个参数：设定目录的权限，默认是 0777，意味着最大可能的访问权；
第三个参数：true表示允许创建多级目录。
 * */






  /*文件操作帮助类 */
   class fileHelper
   {
       //把文件每一行读取放入数组中
       function readRows($path)
       {
           $fp=fopen($path,"r");
           if ($fp)
           {
               echo "文件打开失败";
               exit;
           }
           
           $array=array();
           while (!feof($fp))
           {
             $array[]=fgets($fp);
           }
           
           return $array;
       }
       
       //一次读取所有文件类容
       public function getAllText($path)
       {
           return readfile($path);
       }
       
       //根据文本大小获取文件,如果读取所有问价filesize=all
       public function getAllContent($path,$filesize)
       {
           $fp=fopen($path,"r");
           if ($fp)
           {
           	   echo"文件无法打开";
               exit;
           }
           if (strtolower($filesize)=="all")
           {
           	  $filesize=filesize($fp);
           } 
           
           $content=fread($fp,$filesize);
           return $content;         
       }
       
      
       
       
       
       
   }  
?>