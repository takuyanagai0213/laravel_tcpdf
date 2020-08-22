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
        // ダミーデータ設定
        // $datas['test01'] = "01 - あいうえお - left";
        // $data['test02'] = "02 - あいうえお - center";
        // $data['test03'] = "03 - あいうえお - right";

        // $data=null;
        $datas['date'] = [
            "2020/08/01",
            "2020/08/01",
            "2020/08/01",
            "2020/08/01",
            "2020/08/01",
            "2020/08/01",
            "2020/08/01",
            "2020/08/01",
            "2020/08/01",
            "2020/08/01",
            "2020/08/01",
            "2020/08/01",
            "2020/08/01",
            "2020/08/01",
            "2020/08/01"
        ];
        $datas['equipments'] = ['機器A', '機器A', '機器A', '機器A', '機器A', '機器A'];
        // PDF 生成メイン　－　A4 縦に設定
        $pdf = new TCPDF("L", "mm", "A4", true, "UTF-8" );
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // PDF プロパティ設定
        $pdf->SetTitle('Title aiueo あいうえお');

        // 日本語フォント設定
        $pdf->setFont('kozminproregular','',10);

        // ページ追加
        $pdf->addPage();
        // error_log(print_r($datas,true),3, "/Users/takuya/myaaa/debug.log");
        // HTMLを描画、viewの指定と変数代入 - pdf_test.blade.php
        $pdf->writeHTML(view("pdf_test")->with('datas', $datas)->render());

        // 出力指定 ファイル名、拡張子、D(ダウンロード)
        $pdf->output('test' . '.pdf', 'D');
        return;
   }

   public function outputCSV(){
        error_log(print_r("hello",true),3, "/Users/takuya/myaaa/debug.log");
        return;

   }
}