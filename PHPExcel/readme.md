php导出数据文件
下载PHPExcel

导出步骤：
	新建一个excel表格  --> 实例化PHPExcel类

	创建sheet(内置表)  --> 调用以下三个方法
						createSheet()
						setActiveSheetIndex()
						getActiveSheet()

	填充数据            --> setCellActive()

	保存文件            --> PHPExcel_IOFactory::createWrite()
						save()
