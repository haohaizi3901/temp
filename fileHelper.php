<?php
   
     /* 
      *����һ��  (1) ���ļ� fopen 
                             r    ֻ��������ģʽ�����ļ������ļ�ͷ��ʼ��
                             r+    �ɶ���д��ʽ���ļ������ļ�ͷ��ʼ��д
                             w    ֻд����д��ʽ���ļ���ͬʱ�Ѹ��ļ�������գ����ļ�ָ��ָ���ļ���ʼ����������ļ��Ѿ����ڣ���ɾ���ļ��������ݣ�������ļ������ڣ��������ļ�
                             w+    �ɶ���д��ʽ���ļ���ͬʱ�Ѹ��ļ�������գ����ļ�ָ��ָ���ļ���ʼ����������ļ������ڣ��������ļ�
                             a    ׷��    ��ֻд��ʽ���ļ������ļ�ָ��ָ���ļ�ĩβ����������ļ������ڣ��������ļ�
                             a+    ׷��    �Կɶ���д��ʽ���ļ������ļ�ָ��ָ���ļ�ĩβ����������ļ������ڣ��������ļ�
                             b    ������    ����������ģʽ�������ӡ�����ʹ�ø�ѡ��Ի�ø���̶ȵĿ���ֲ��
      
                   (2) ���ļ�  
                          ���ļ�һ��û�ж���ʱ����feof(�ļ�ָ��)�ж��Ƿ����ļ�ĩβ
                                      2.1 ����С�� fread(�ļ�ָ��,��ȡ�ļ���С)
                                       2.2 ���ж�  fgets(�ļ�ָ��)
                                       2.3 ����С��ȥ��html,php���     fgetss(�ļ�ָ��,��ȡ�ļ���С�����Եı�ǩ)
                  
                    (3) �ر��ļ� fclose(�ļ�ָ��)
      
      * ������ �� array file ( string $filename [, int $use_include_path [, resource $context ]] ) ���ļ����������У�һ��һ��������� rtrim�ɹ��ˣ�
      * �������� int readfile ( string $filename [, bool $use_include_path [, resource $context ]] )  ����һ���ļ���д�뵽�������
      * ������(�Ƽ�)��string file_get_contents ( string $filename [, bool $use_include_path [, resource $context [, int $offset [, int $maxlen ]]]] )
      * 
      * 
      * */

/*
 *  д�ļ� 
     $fp=fopen("user.txt",a);  //���ļ�
      fwrite($fp,"haoxiaozi,admin"); //д���ļ�
      fclose($fp); //�ر��ļ�
 * */


/*
 * mkdir($path,0777,true);
��һ�����������룬����Ҫ�����Ķ༶Ŀ¼��·����
�ڶ����������趨Ŀ¼��Ȩ�ޣ�Ĭ���� 0777����ζ�������ܵķ���Ȩ��
������������true��ʾ�������༶Ŀ¼��
 * */






  /*�ļ����������� */
   class fileHelper
   {
       //���ļ�ÿһ�ж�ȡ����������
       function readRows($path)
       {
           $fp=fopen($path,"r");
           if ($fp)
           {
               echo "�ļ���ʧ��";
               exit;
           }
           
           $array=array();
           while (!feof($fp))
           {
             $array[]=fgets($fp);
           }
           
           return $array;
       }
       
       //һ�ζ�ȡ�����ļ�����
       public function getAllText($path)
       {
           return readfile($path);
       }
       
       //�����ı���С��ȡ�ļ�,�����ȡ�����ʼ�filesize=all
       public function getAllContent($path,$filesize)
       {
           $fp=fopen($path,"r");
           if ($fp)
           {
           	   echo"�ļ��޷���";
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