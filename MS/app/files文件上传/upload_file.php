<?php
header("content-type:text/html; Charset=utf8");
	// print_r($_FILES);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 200000)){
  if ($_FILES["file"]["error"] > 0){
	    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		    }else{
			    // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
			    // echo "Type: " . $_FILES["file"]["type"] . "<br />";
			    // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
			    // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
			    
		    $data = time().rand(0,999999);
			$fileName=$_FILES['file']['name'];//得到上传文件的名字
			$name=explode('.',$fileName);//将文件名以'.'分割得到后缀名,得到一个数组
			$newPath=$data.'.'.$name[1];//得到一个新的文件为'20070705163148.jpg',即新的路径
		
		    if (file_exists("upload/" . $newPath)){  // 判断文件是否存在  $newPath = $_FILES['file']['name'] 换新的
		      	echo $_FILES["file"]["name"] . " 文件已经存在,生成随机数不重复 ";
		      }else{
		      move_uploaded_file($_FILES["file"]["tmp_name"],
		      	"upload/" . $newPath);  // 将文件移动到哪里(原位置,新位置)
		      echo "图片url: " . "upload/" . $newPath;
		      }
		      echo "<script>alert('上传成功')</script>";
	    }
  }else{
  echo "不是图片";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="upload_file.php" method="post"
			enctype="multipart/form-data">
			<label for="file">Filename:</label>
			<input type="file" name="file" id="file" /> 
			<br />
			<input type="submit" name="submit" value="Submit" />
	</form>
</body>
</html>


