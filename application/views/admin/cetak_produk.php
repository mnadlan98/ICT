<?php
            $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetTitle('Sertifikat');
            // $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);

            $pdf->SetMargins(0, 0, 0, true);

            // set auto page breaks false
            $pdf->SetAutoPageBreak(false, 0);
            $pdf->SetAuthor('Author');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage('L', 'A4');

            $bMargin = $pdf->getBreakMargin();
            // get current auto-page-break mode
            $auto_page_break = $pdf->getAutoPageBreak();
            // disable auto-page-break
            $pdf->SetAutoPageBreak(false, 0);
            // set bacground image
            
            $img_file = K_PATH_IMAGES.'Sertif2.png';
            $pdf->Image($img_file,$x='', $y='', $w=300, $h=210,$type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false);
            // restore auto-page-break status
            $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
            $pdf->setCellHeightRatio(1);
            // set the starting point for the page content
            $pdf->setPageMark();
            $html='';
                $html .= '<ul><li><li><li><li><li><li></ul><span style="color:black;text-align:center;font-weight:light;font-size:24pt;">CERTIFICATE OF</span>
                    <br /><span style="color:black;text-align:center;font-weight:bold;font-size:38pt;">PARTICIPATION</span>
                    <br /><span></span>
                    <br /><span style="color:red;text-align:center;font-weight:bold;font-size:15pt;">Management PT. Telekomunikasi Indonesia, Tbk</span>
                    <br /><span style="color:red;text-align:center;font-weight:bold;font-size:15pt;">'.$peserta['nama_witel'].'</span>
                    <br /><p style="color:black;text-align:center;font-weight:light;font-size:15pt;"><i>This to certify that</i></p>       
                    <br /><span style="color:black;text-align:center;font-weight:light;font-size:70pt;"><u>'.$peserta['nama_peserta'].'</u></span>
                    <br /><ul><li></ul><span style="color:red;text-align:center;font-weight:light;font-size:14pt;">Has participated in ICT Tour from  '.$peserta['nama_sekolah'].'</span>
                    <br /><span style="color:black;text-align:center;font-weight:light;font-size:14pt;">'.$peserta['tanggal_tour'].'</span>
                    <br /><p style="color:black;text-align:center;font-weight:light;font-size:12pt;">'.$peserta['lokasi_tour'].', '.$peserta['tanggal'].'</p>
                    <br /><span></span>
                    <br /><span></span>
                    <br /><span></span>
                    <br /><span></span>
                    <br /><span style="color:red;text-align:center;font-weight:bold;font-size:15pt;">'.$peserta['nama_pejabat'].'</span>
                    <br /><span style="color:red;text-align:center;font-weight:bold;font-size:15pt;">'.$peserta['gelar_pejabat'].'</span>';                   ;
          
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('daftar_produk.pdf', 'I');

            // $pdf->Output('filename.pdf', 'D'); //To force download

            
?>