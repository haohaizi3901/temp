<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>����</title>
</head>
<body>
        
        <?php
           include "sqlHelper.php";
           
           $id=$_GET["id"];
           $sql="";
           if(!empty($id))
           {
             $sql="select a.id,a.`name`,b.`name` typename,a.content,a.example
 from funinfo a left join retype b on  a.returntype=b.id where a.id=".$id;  
           }
           $array=getArray($sql);
           $arrynew=$array[0];
           
        ?>

       <div>
           <table>
               <tr><td>�������ƣ�</td><td><?php echo $arrynew["name"]; ?></td></tr>
               <tr><td>����ֵ����</td><td><?php echo $arrynew["typename"]; ?></td></tr>
               <tr><td>������</td><td><?php echo $arrynew["content"]; ?></td></tr>
               <tr><td>���ӣ�</td><td><?php echo $arrynew["example"]; ?></td></tr>
           </table>
       </div>
</body>
</html>

