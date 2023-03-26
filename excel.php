<?php 
 include 'layouts/config.php';
 require 'vendor/autoload.php';

 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 use PhpOffice\PhpSpreadsheet\Writer\Xls;
 use PhpOffice\PhpSpreadsheet\Writer\Csv;
?>

<?php
                  if(isset($_POST["export_excel_btn"])){
                    $file_ext_name = $_POST["export_file_type"];
                    $fileName = "slgs-data";
                    $groups = "SELECT * FROM bl_el_criteria";
                    $query_run = mysqli_query($link, $groups);
                     
                        $spreadsheet = new Spreadsheet();
                        $sheet = $spreadsheet->getActiveSheet();
                        $activeWorksheet = $spreadsheet->getActiveSheet();
                        $activeWorksheet->setCellValue('A1', 'GROUP CODE');
                        $activeWorksheet->setCellValue('B1', 'GROUP NAME');
                        $activeWorksheet->setCellValue('C1', 'REGION');
                        $activeWorksheet->setCellValue('D1', 'DISTRICT');
                        $activeWorksheet->setCellValue('E1', 'TA');
                        $activeWorksheet->setCellValue('F1', 'GVH');
                        $activeWorksheet->setCellValue('G1', 'CLUSTER');
                        $activeWorksheet->setCellValue('H1', 'DATE ESTABLISHED');
                        $activeWorksheet->setCellValue('I1', 'COHORT');
                        $activeWorksheet->setCellValue('J1', 'MALES');
                        $activeWorksheet->setCellValue('K1', 'FEMALES');
                        $activeWorksheet->setCellValue('L1', 'MEMBERS');

                        $activeWorksheet->setCellValue('M1', 'TOTAL SAVINGS');
                        $activeWorksheet->setCellValue('O1', 'TOTAL MEMBERS');
                        $activeWorksheet->setCellValue('P1', 'GROUP RECORDS');
                        $activeWorksheet->setCellValue('Q1', 'FUNCTIONAL COMMITTEES');
                        $activeWorksheet->setCellValue('R1', 'CONSTITUTION');
                        $activeWorksheet->setCellValue('S1', 'ESMPS');
                        $activeWorksheet->setCellValue('T1', 'ON BUSINESS');
                        $activeWorksheet->setCellValue('U1', 'ON SANITATION');
                        
                        $rowCount = 2;
                        foreach($query_run as $data){
                           $sheet->setCellValue('A'.$rowCount, $data["groupID"]);
                           $sheet->setCellValue('B'.$rowCount, $data["groupname"]);
                           $sheet->setCellValue('C'.$rowCount, $data["regionName"]);
                           $sheet->setCellValue('D'.$rowCount, $data["DistrictName"]);
                           $sheet->setCellValue('E'.$rowCount, $data["TAName"]);
                           $sheet->setCellValue('F'.$rowCount, $data["gvhID"]);
                           
                           $sheet->setCellValue('G'.$rowCount, $data["clusterID"]);
                           $sheet->setCellValue('H'.$rowCount, $data["DateEstablished"]);
                           $sheet->setCellValue('I'.$rowCount, $data["cohort"]);
                           $sheet->setCellValue('J'.$rowCount, $data["MembersM"]);
                           $sheet->setCellValue('K'.$rowCount, $data["MembersF"]);
                           $sheet->setCellValue('L'.$rowCount, $data["MembersM"]+$data["MembersF"]);

                           $sheet->setCellValue('M'.$rowCount, $data["amount"]);
                           $sheet->setCellValue('O'.$rowCount, $data["members"]);
                           $sheet->setCellValue('P'.$rowCount, $data["group_records"]);
                           $sheet->setCellValue('Q'.$rowCount, $data["functional_committees"]);
                           $sheet->setCellValue('R'.$rowCount, $data["constitution"]);
                           $sheet->setCellValue('S'.$rowCount, $data["esmps"]);
                           $sheet->setCellValue('T'.$rowCount, $data["on_businesses"]);
                           $sheet->setCellValue('U'.$rowCount, $data["on_sanitation"]);
                           $rowCount++;
                        }
                        if($file_ext_name == 'xlsx'){
                            $writer = new Xlsx($spreadsheet);
                            $final_filename = $fileName.'.xlsx';
                        }elseif($file_ext_name == 'xls'){
                            $writer = new Xls($spreadsheet);
                            $final_filename = $fileName.'.xls';
                        }elseif($file_ext_name == 'csv'){
                            $writer = new Csv($spreadsheet);
                            $final_filename = $fileName.'.csv';
                        }
                        
                        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                        header('Content-Disposition: attachment; filename="'.urlencode($final_filename).'"');
                        // $writer->save($final_filename);
                        ob_implicit_flush(1);
                        ob_clean();
                        $writer->save('php://output');

                      
                  }
                ?>