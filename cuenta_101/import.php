<?php
include "database.php";
include "class.upload.php";

//set_time_limit(60);

if (isset($_FILES["name"])) {
    $up = new Upload($_FILES["name"]);
    if ($up->uploaded) {
        $up->Process("./uploads/");
        if ($up->processed) {
            /// leer el archivo excel
            require_once 'PHPExcel/Classes/PHPExcel.php';
            $archivo = "uploads/" . $up->file_dst_name;
            $inputFileType = PHPExcel_IOFactory::identify($archivo);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($archivo);
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            for ($row = 2; $row <= $highestRow; $row++) {
                $x_no = $sheet->getCell("A" . $row)->getValue();
                $x_name = $sheet->getCell("B" . $row)->getValue();
                $x_lastname = $sheet->getCell("C" . $row)->getValue();
                $x_address1 = $sheet->getCell("D" . $row)->getValue();
                $x_address2 = $sheet->getCell("E" . $row)->getValue();
                $x_email = $sheet->getCell("F" . $row)->getValue();
                $x_phone1 = $sheet->getCell("G" . $row)->getValue();
                $x_phone2 = $sheet->getCell("H" . $row)->getValue();
                $x_marca = $sheet->getCell("I" . $row)->getValue();
                $x_patente = $sheet->getCell("J" . $row)->getValue();
                $x_cc = $sheet->getCell("L" . $row)->getValue();
                $x_traslado = $sheet->getCell("N" . $row)->getValue();
                $x_siniestro = $sheet->getCell("O" . $row)->getValue();
                $x_solicitado = $sheet->getCell("P" . $row)->getValue();
                $x_completado = $sheet->getCell("Q" . $row)->getValue();
                $x_destino = $sheet->getCell("R" . $row)->getValue();
                $x_reloj = $sheet->getCell("S" . $row)->getValue();
                $x_peaje = $sheet->getCell("T" . $row)->getValue();
                $x_equipaje = $sheet->getCell("U" . $row)->getValue();
                $x_adicional = $sheet->getCell("V" . $row)->getValue();
                $x_plus = $sheet->getCell("W" . $row)->getValue();
                $x_total = $sheet->getCell("X" . $row)->getValue();
                $x_operador = $sheet->getCell("Y" . $row)->getValue();

                $sql = "insert into person (no, 
                                            name, 
                                            estado, 
                                            address1, 
                                            address2, 
                                            email1, 
                                            phone1, 
                                            phone2, 
                                            marca,                                       
                                            patente, 
                                            cc,
                                            traslado,
                                            siniestro,
                                            solicitado,
                                            completado,
                                            destino,
                                            reloj,
                                            peaje,
                                            equipaje,
                                            adicional,
                                            plus,
                                            total,
                                            operador,
                                            created_at) value ";
                $sql .= " (\"$x_no\",
                        \"$x_name\",
                        \"$x_lastname\",
                        \"$x_address1\",
                        \"$x_address2\",
                        \"$x_email\",
                        \"$x_phone1\",
                        \"$x_phone2\",
                        \"$x_marca\",                        
                        \"$x_patente\",
                        \"$x_cc\",
                        \"$x_traslado\",
                        \"$x_siniestro\", 
                        \"$x_solicitado\",
                        \"$x_completado\",
                        \"$x_destino\",
                        \"$x_reloj\",
                        \"$x_peaje\",
                        \"$x_equipaje\",
                        \"$x_adicional\",
                        \"$x_plus\",
                        \"$x_total\",
                        \"$x_operador\",
                        NOW())";
                $con->query($sql);
            }
            unlink($archivo);
        }
    }
}
echo "<script>
window.location = './index.php';
</script>
";
