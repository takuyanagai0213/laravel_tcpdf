<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCPDF;
use TCPDF_FONTS;

class DocumentController extends Controller
{
    public function index()
    {
        return view('pdf');
    }
    public function edit()
    {
        return view('pdf_edit');
    }


    public function createPDFdata(Request $request)
    {
        $target_DT = substr("2020/09/01",0,7).'/01';

        $target_TS = strtotime($target_DT);
        
        $finishTS = $target_TS + 60*60*24*32;
        error_log(print_r("hello",true),3, "/Users/takuya/myaaa/debug.log");

        $dates = array();
        // if(empty($dates)){
        //     $message = 'error';
        //     return response()->json($message);
        // }
        for($i = $target_TS; $i < $finishTS; $i++){
            if(date('Y/m/01',$i) !== $target_DT)continue;
            $DT = strval(date('Y/m/d',$i));
            array_push($dates, $DT);
            $i += 60*60*24;
        }
        $page = 1;
        $equipment_count = 0;
        for($i=1;$i<1000;$i++){
            if($equipment_count >= 4){
                $equipment_count = 0;
                $page++;
            }
            $equipment="機器".$i;
            $pdfStruct[$page]['equipments'][$i]['NAME']=$equipment;
            $pdfStruct[$page]['equipments'][$i]['id']=$i;
            $equipment_count++;
        }
        // error_log(print_r($pdfStruct,true),3, "/Users/takuya/myaaa/debug.log");
        $timeLabel = ['10:00','15:00','19:00'];
        $equipment_count = 0;
        foreach($pdfStruct as $page => $equipmentPerPage){
            foreach($equipmentPerPage['equipments'] as $equipment){
                $id = $equipment['id'];
                foreach($dates as $date){
                    foreach($timeLabel as $label){
                        $pdfStruct[$page]['data'][$date][$id][$label] = "50.5";
                    }
                }
            }
        }
        // error_log(print_r(filesize($pdfStruct),true),3, "/Users/takuya/myaaa/debug.log");
        // if(isset($request->flag)){
        //     error_log(print_r("hello1",true),3, "/Users/takuya/myaaa/debug.log");
            // return response()->json($pdfStruct);
        // }else{
        //     error_log(print_r("hello",true),3, "/Users/takuya/myaaa/debug.log");

            return $pdfStruct;
        // }
    }
    public function createPDF(Request $request)
    {
        error_log(print_r($_POST,true),3, "/Users/takuya/myaaa/debug.log");
        // if(){
            
            // }
        $pdfStruct = $this->createPDFdata($request);

        foreach($pdfStruct as $page => $pagePerData){
            foreach($pagePerData['data'] as $date => $tempPerEquip){
                if($_POST['date'] !== $date)continue;
                foreach($tempPerEquip as $id => $tempAll){
                    if(intval($_POST['id']) !== intval($id))continue;
                    foreach($tempAll as $timeLabel => $temp){
                        if($_POST['time'] !== $timeLabel)continue;
                        $pdfStruct[$page]['data'][$date][$id][$timeLabel] = $_POST['temp'];
                    }
                }
            }
        }
        error_log(print_r($pdfStruct,true),3, "/Users/takuya/myaaa/debug.log");

        // $pdfStruct = $_POST;
        $timeLabel = ['10:00','15:00','19:00'];

        // PDF 生成メイン　－　A4 縦に設定
        $pdf = new TCPDF("P", "mm", "A4", true, "UTF-8" );
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // PDF プロパティ設定
        $pdf->SetTitle('Title aiueo あいうえお');

        // 日本語フォント設定
        $pdf->setFont('kozminproregular','',5);

        // ページ追加
        $pdf->addPage();
        // セルを使って表を描いていく
        $pdf->SetFillColor(0, 191, 255);

        $pdf->Cell(15,5,"",1,0,'L');
        // $page = 1;
        foreach($pdfStruct as $page => $pagePerData){
            
            foreach($pagePerData['equipments'] as $equipment){
                $pdf->MultiCell(30,5,$equipment['NAME'],1,0,1,'L');
            }
            $pdf->Cell(1,5,"",1,1,'L');
            
            $pdf->Cell(15,5,"日付",1,0,'L');
            for($i=0;$i<count($pagePerData['equipments']);$i++){
                foreach($timeLabel as $label){
                    $pdf->Cell(10,5,$label,1,0,'L');
                }
            }
            $pdf->Cell(1,5,"",1,1,'L');
            
            foreach($pagePerData['data'] as $date => $line){
                $pdf->Cell(15,5,$date,1,0,'L');
                foreach($line as $id => $temp){
                    foreach($temp as $temp_label => $temp_data){
                        $pdf->Cell(10,5,$temp_data,1,0,'L');
                    }
                }
                $pdf->Cell(1,5,"",1,1,'L');
            }
            $pdf->addPage();
        }

        // 出力指定 ファイル名、拡張子、D(ダウンロード)
        $pdf->output('/Users/takuya/myaaa/test' . '.pdf', 'F'); 
        $message = 'success';
        return response()->json($message);
    }
    public function downloadPDF(Request $request)
    {
        return response()->download('/Users/takuya/myaaa/test.pdf')->deleteFileAfterSend(true);
    }

    public function get_profile(Request $request) {
        header("Access-Control-Allow-Origin: *");  //CORS
        header("Access-Control-Allow-Headers: Origin, X-Requested-With");
        $profiles = array('test','test');
        return response()->json($profiles[0]);
    }
}