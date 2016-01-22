<?php



function excuteNoneQuery($sql)
{
    $server="localhost";
    $username="root";
    $pwd="sasa";
    $db="test";
    
    $conn=mysql_connect($server,$username,$pwd);
    
    if(!$conn)
    {
        die("连接数据库出现错误".mysql_error());
        exit;
    }
    mysql_select_db($db,$conn);
    $res=  mysql_query($sql,$conn);
    mysql_close($conn);
    if($res)
    {
        return  true;
    }
    else
    {
        return false;
    }
    
}


function getArray($sql)
{
    $server="localhost";
    $username="root";
    $pwd="sasa";
    $db="test";
    
    $conn=mysql_connect($server,$username,$pwd);
    mysql_select_db($db,$conn);
    $res=mysql_query($sql,$conn);
    $array=array();
    while($row=mysql_fetch_array($res))
    {
        $array[]=$row;
    }
    mysql_free_result($res);
    mysql_close($conn);
    
    return $array;
}
?>