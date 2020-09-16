<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use TCPDF;
use TCPDF_FONTS;
use Request;


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

    public function postHoge(){
        if (Request::get('pdf')){
            $this->downloadPdf();
        }elseif (Request::get('csv')){
            $this->outputCSV();
        }

        return view('pdf');
    }

    public function downloadPdf()
    {

        for($i=1;$i<9;$i++){
            $equipment="機器".$i;
            $datas['equipments'][$i]['NAME']=$equipment;
            $datas['equipments'][$i]['id']=$i;
            foreach($datas['equipments'] as $key => $equipment){
                $datas['equipments'][$i]['id']=$i;
            }
        }

        // error_log(print_r($datas,true),3, "/Users/takuya/myaaa/debug.log");
        for($i=1;$i<31;$i++){
            $date="2020/08/".$i;
            $datas['date'][$i]=$date;
        }

        $timeLabel = ['10:00','15:00','19:00'];
        foreach($datas['date'] as $date){
            foreach($datas['equipments'] as $equipment){
                foreach($timeLabel as $label){
                    $id = $equipment['id'];
                    $pdfStruct[$date][$id][$label] = "50.5";
                }
            }
        }

        return response()->json($pdfStruct);
        error_log(print_r($datas['equipments'],true),3, "/Users/takuya/myaaa/debug.log");
        error_log(print_r($datas['equipments'],true),3, "/Users/takuya/myaaa/debug.log");

        // PDF 生成メイン　－　A4 縦に設定
        $pdf = new TCPDF("L", "mm", "A4", true, "UTF-8" );
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
        foreach($datas['equipments'] as $equipment){
            $pdf->MultiCell(30,5,$equipment['NAME'],1,0,1,'L');
        }
        $pdf->Cell(1,5,"",1,1,'L');
        
        $pdf->Cell(15,5,"日付",1,0,'L');
        for($i=0;$i<count($datas['equipments']);$i++){
            foreach($timeLabel as $label){
                $pdf->Cell(10,5,$label,1,0,'L');
            }
        }
        $pdf->Cell(1,5,"",1,1,'L');

        foreach($pdfStruct as $date => $line){
            $pdf->Cell(15,5,$date,1,0,'L');
            foreach($line as $id => $temp){
                foreach($temp as $temp_label => $temp_data){
                    $pdf->Cell(10,5,$temp_data,1,0,'L');
                }
            }
            $pdf->Cell(1,5,"",1,1,'L');
        }
        // 出力指定 ファイル名、拡張子、D(ダウンロード)
        $pdf->output('test' . '.pdf', 'D');
        return;
   }

   public function outputCSV(){
        error_log(print_r("hello",true),3, "/Users/takuya/myaaa/debug.log");
        return;

   }
}