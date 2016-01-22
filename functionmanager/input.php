<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>录入</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <style>
        .div {
            margin: 10px auto;
            height: 500px;
            width: 300px;
        }
    </style>
    <?php 
    include "sqlHelper.php";
    ?>
    <script type="text/javascript" src="jquery-2.2.0.js"></script>
</head>
<body>
    <div class="div">
        <form action="input.php" method="post" onsubmit="checkInput()">
            <table>
                <tr>
                    <td>函数名称</td>
                    <td>
                        <input type="text" name="fc_name" /></td>
                </tr>
                <tr>
                    <td>返回值类型</td>
                    <td>
                        <select name="retype">
                            <?php
                            $typesql="select * from retype";    
                            $array=getArray($typesql);
                            if(count($array)>0)
                            {
                                foreach ($array as $key=>$val)
                                {
                                    echo "<option value='".$val["id"]."'>".$val["name"]."</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>描述：</td>
                    <td>
                        <textarea name="description">

                    </textarea></td>
                </tr>
                <tr>
                    <td>例子：</td>
                    <td>
                        <textarea name="example"></textarea></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="btnadd" value="添加"  /></td>
                    <td>
                        <input type="reset" name="reset" value="重置" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
<script type="text/javascript">

    function checkInput() {
        var name = $("#fc_name").val();
        var retype=$("#retype").val();
        if (name == "undefined" || name == "") {
            alert("函数名称不能为空");
            return false;
        }

        if (retype == "undefined" || retype == "") {
            alert("返回值类型不能为空");
            return false;
        }

    }

</script>


<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    
    $name= $_POST["fc_name"];
    $retype=$_POST["retype"];
    $description=$_POST["description"];
    $example=$_POST["example"];
    
    if(!isset($name))
    {
        echo "<script>alert('函数名称不能为空');</script>";
        exit;
    }
    if(!isset($retype))
    {
        echo "<script>alert('函数返回值不能为空');</script>";
        exit;
    }
    if (isset($description)&&isset($example))
    {
        $sql="insert into funinfo(`name`,returntype,content,example) values('".$name."','".$retype."','".trim($description)."','".trim($example)."')";
    }else if(isset($description))
    {
        $sql="insert into funinfo(`name`,returntype,content) values('".$name."','".$retype."','".trim($description)."')";
    }else if(isset($example))
    {
        $sql="insert into funinfo(`name`,returntype,content) values('".$name."','".$retype."','".trim($example)."')";
    }
    
    $res=excuteNoneQuery($sql);
    
    if ($res)
    {
    	echo "<script>alert('添加成功')</script>";
    }else
    {
    	echo "<script>alert('添加失败')</script>";
    }
    
}

?>