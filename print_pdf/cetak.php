<?php 

   // include autoloader



    require_once 'dompdf/autoload.inc.php';
    require 'functions.php';

    $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");


    // reference the Dompdf namespace
    use Dompdf\Dompdf;

    $html = 
    '<html> 
    <body>
    <table border="1" cellpadding = "10">
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>jurusan</th>
          
        </tr>';
        $i=1;
        foreach($mahasiswa as $row){
            $html.='<tr>
                    <td>'.$i++ .'</td>
                    <td>'.$row["nama"] .'</td>
                    <td>'.$row["jurusan"].'</td>

                    <tr>';
        }
    $html .='
            </table>
            </body>
            </html>';

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation


    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('data.php',array("Attachmen"=>0));

?>