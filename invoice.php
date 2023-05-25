<?php
    include("FPDF/fpdf.php");
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial", "B", 11);
    $pdf->Image("logo image.png", 97, 8, 17, 17, "png", "http://localhost/Login/Nirvana/home.php");
    $pdf->SetXY(20, 30);

    $order_token=$_GET['order_token'];

    include("connexion.php");
    $sql="SELECT * FROM articles NATURAL JOIN orders NATURAL JOIN client WHERE order_token='$order_token'";
    $query=mysqli_query($conn, $sql);
    $query2=mysqli_query($conn, $sql);

    if(mysqli_num_rows($query)>0){
        $tab=mysqli_fetch_array($query);

        $pdf->SetFillColor(220, 220, 220);

        
        $textCellContent=array("Order N : ", "Date :", "Client name :", "Address :");
        $textCellWidth=array(18, 12, 25, 19);
        $dataCellWidth=array(35, 38, 28, 114);
        $dataCellContent=array( $order_token, $tab['date_commande'], $tab['Fname']." ".$tab['Lname'], $tab['adress']);

        for($i=0; $i<count($textCellContent); $i++){
            $pdf->SetTextColor(90, 94, 170);
            $pdf->Cell($textCellWidth[$i], 10, $textCellContent[$i], 0, 0, "C");
            $pdf->SetTextColor(56, 56, 56);
            $pdf->Cell($dataCellWidth[$i], 10, $dataCellContent[$i], 0, 1, "C");
            $pdf->SetX(20);
        }

        $pdf->Ln();
        $pdf->SetX(75);
        $pdf->SetTextColor(90, 94, 170);
        $pdf->SetDrawColor(90, 94, 170);

        $pdf->SetFontSize(18);
        $pdf->SetLineWidth(0.7);
        $pdf->Cell(50, 10, "Purchase order", "B", 1, "C");
        $pdf->Ln();

        $pdf->SetFillColor(90, 94, 170);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFontSize(13);
        $pdf->SetLineWidth(0.3);

        $tab1=array('SL.', 'Item Description', 'Price', 'Qty.', 'Total');
        $tab2=array(15, 110, 22.5, 20, 22.5);
        $pdf->SetDrawColor(203, 199, 255);
        for($i=0; $i<count($tab1);$i++){
            $pdf->Cell($tab2[$i], 10, $tab1[$i], 1, 0, "C", true);
        }
        $pdf->Ln();

        $pdf->SetFontSize(10);
        $pdf->SetTextColor(56, 56, 56);
        $pdf->SetFillColor(209, 206, 245);

        $j=1;
        $total=0;

        while($tab3=mysqli_fetch_assoc($query2)){
            $i=0;
            if($j%2==0){
                $isFill=true;
            }else{
                $isFill=false;
            }
                $pdf->Cell($tab2[$i], 10, $j, 1, 0, "C", $isFill);
                $pdf->Cell($tab2[$i+1], 10, $tab3['name_article'], 1, 0, "C", $isFill);
                $pdf->Cell($tab2[$i+2], 10, $tab3['price'], 1, 0, "C", $isFill);
                $pdf->Cell($tab2[$i+3], 10, $tab3['quantity'], 1, 0, "C", $isFill);
                $pdf->Cell($tab2[$i+4], 10, $tab3['price']*$tab3['quantity'], 1, 1, "C", $isFill);
            $total+=$tab3['price']*$tab3['quantity'];
            $i++;
            $j++;
        }
        $pdf->SetX(157.5);
        $pdf->SetFontSize(12);
        $pdf->Cell($tab2[3], 10,"Total", 1, 0, "C", false);
        $pdf->Cell($tab2[4], 10,$total, 1, 0, "C", false);

    }else{
        $pdf->SetFontSize(18);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFillColor(90, 94, 170);
        $pdf->Ln(20);
        $pdf->Cell(190, 10, "Order #$order_token has been cancelled", 0, 1, "C", true);
    }

    $pdf->Output();
?>