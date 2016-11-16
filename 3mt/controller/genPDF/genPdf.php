<?php

function genPdf($competitorData = null)
 {
 	if($competitorData != null){
		require $_SERVER['DOCUMENT_ROOT'].'/3mt/controller/genPDF/fpdf.php' ;
		define('FPDF_FONTPATH',$_SERVER['DOCUMENT_ROOT'].'/3mt/controller/genPDF/font/');
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetMargins(0,0,0);
		$pdf->Image($_SERVER['DOCUMENT_ROOT'].'/3mt/controller/genPDF/bg.png', 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());
		$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
		$pdf->SetFont('THSarabunNew','',16);
		$height = 74;
		$pdf->SetXY(0,$height);
		$pdf->Cell(40);
			$pdf->Cell(10,11,iconv('UTF-8','cp874',$competitorData['name']." ".$competitorData['last']),0,1);

		$pdf->SetXY(0,$height+11);
		$pdf->Cell(40);
			$pdf->Cell(10,10,iconv('UTF-8','cp874',$competitorData['faculty']),0,1);

		$pdf->SetXY(0,$height+22);
		$pdf->Cell(40);
			$pdf->Cell(10,10,iconv('UTF-8','cp874',$competitorData['field-of-study']),0,1);

		$pdf->SetXY(0,$height+33);
		$pdf->Cell(80);
			$pdf->Cell(10,10,iconv('UTF-8','cp874',$competitorData['graduate']),0,1);

		$pdf->SetXY(0,$height+43);
		$pdf->Cell(60);
			$pdf->MultiCell(130,11,iconv('UTF-8','cp874',$competitorData['topic']),0,1);

		$pdf->SetXY(0,$height+65);
		$pdf->Cell(50);
			$pdf->Cell(40,10,iconv('UTF-8','cp874',$competitorData['advisor']),0,1);

		$pdf->Output('D',"3MTCU_".$competitorData['name']." ".$competitorData['last'].".pdf");
 	}
}

	function getUTF8($str){
	 	return iconv('UTF-8','tis-620',$str);
	}
	
	function getData($id){
		include $_SERVER['DOCUMENT_ROOT'].'/3mt/controller/connectDB.php';
		if(!$conn->connect_error){
			$sql = "SELECT firstname, lastname, faculty, field_of_study, topic, advisor, graduate FROM competitor WHERE id='$id'";
			$result = $conn->query($sql);
			if($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        return array('name'=>$row['firstname'],'last'=>$row['lastname'],'faculty'=>$row['faculty'],'field-of-study'=>$row['field_of_study'],'topic'=>$row['topic'],'advisor'=>$row['advisor'],'graduate'=>$row['graduate']);
			    }
			}
			else{
				$conn->close();
			    return null;
			}
			$conn->close();
		}
	}

	if(isset($_GET) && array_key_exists('id',$_GET)){
		genPdf(getData($_GET['id'])); 
	}
 ?>

