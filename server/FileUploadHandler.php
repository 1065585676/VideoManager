<?php

if (empty($_FILES['videos'])) {
	echo json_encode(['error'=>"没有文件被上传。"]);
	//echo json_encode(['error' => $_POST['filetype']]);return;
	return;
}

$files = $_FILES['videos'];

// Loop through each file
$newFilePaths = array();
for($i=0; $i<count($files['name']); $i++) {
	// 1.判断文件上传是否错误
	switch ($files['error'][$i]) {
		case 0:
			break;
		case 1:
			echo json_encode(['error'=>"上传的文件超过了 PHP.ini 中 upload_max_filesize 选项限制的值。"]);
			return;
		case 2:
			echo json_encode(['error'=>"上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。"]);
			return;
		case 3:
			echo json_encode(['error'=>"文件只有部分被上传。"]);
			return;
		case 4:
			echo json_encode(['error'=>"没有文件被上传。"]);
			return;
		case 5:
			echo json_encode(['error'=>"找不到临时文件夹。"]);
			return;
		case 6:
			echo json_encode(['error'=>"上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。"]);
			return;
		case 7:
			echo json_encode(['error'=>"文件写入失败。"]);
			return;
		default:
			echo json_encode(['error'=>"未知错误"]);
			return;
	}

	$newFilePath = "ReceivedFiles/" . $files['name'][$i];
	if(!move_uploaded_file($files['tmp_name'][$i], $newFilePath)) {
		echo json_encode(['error'=>"Exc move_uploaded_file Error!"]);
		return;
	}
	$curPageUrl = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	$newFilePaths[$files['name'][$i]] = dirname($curPageUrl) . '/' . $newFilePath;
}

// return a json encoded response for plugin to process successfully
echo json_encode(['fileUrls'=>$newFilePaths]);

?>