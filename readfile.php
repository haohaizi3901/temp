<?php
        
     function readfileOne()
     {
        //���ļ�
        $fs=fopen("user.txt","r");
        if(!$fs)
        {
            echo "�ļ�������";
            exit;
        }
        //���ļ�
        // fgets()���� ÿ�ζ�ȡһ������  feof�ж��ļ��Ƿ����
        while(!feof($fs))
        {
            $bruce=fgets($fs);
            echo $bruce."</br>";
        }
        //�ر��ļ�     
        fclose($fs);
     }
  
     function readfiletwo(){

      $alltext=readfile("user.txt"); //���ص����ļ���С
      echo $alltext;   
    }
  
    function writetext()
    {
        $fp=fopen("user111.txt",a);
        fwrite($fp,"haoxiaozi,admin");
        fclose($fp);
    }
    
    //�����༶Ŀ¼
    function createdir()
    {
       $path="./".date("Y-m-d");
       if(!is_dir($path))
       {
           //���Ĵ���  iconv("UTF-8", "GBK", $path);
           mkdir($path,0777,true);
       }
    }
?>