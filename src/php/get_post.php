<?php
$servername = "localhost";
$username = "root";
$password = "sogood.123";
$dbname='yemu_blog';
// 创建连接
$conn = new mysqli($servername, $username, $password,$dbname);
mysqli_set_charset($conn,'utf8');//设置编码方式为utf8
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
// echo "连接成功";
// echo $servername;
$sql='select * from post order by id desc;';
$result = $conn->query($sql);
$data=array();//创建一个数组
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        array_push($data,$row);//将查询内容压进data数组中
    }
} else {
    echo "0 结果";
}
// print_r($data);
$conn->close();
echo json_encode($data,JSON_UNESCAPED_UNICODE);//已json形式返回
?>