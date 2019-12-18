<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class QrCodeController extends Controller
{
    public function generateImage() 
    {
		$filename = Carbon::now()->timestamp . '.png';

        $data['url_filename'] = 'url-' . $filename;
		QrCode::format('png')->size(300)
	                         ->generate('https://henrywar.blogspot.com/', public_path('images/qr-code/' . $data['url_filename']));

        $data['url_merged_filename'] = 'url-merged-' . $filename;
		QrCode::format('png')->size(300)
                             ->merge(public_path('images/logo.png'), 0.3, true)
	                         ->generate('https://henrywar.blogspot.com/', public_path('images/qr-code/' . $data['url_merged_filename']));

        $data['url_merged_background_filename'] = 'url-merged-background-' . $filename;
		QrCode::format('png')->size(300)
                             ->backgroundColor(255,255,204)
                             ->merge(public_path('images/logo.png'), 0.3, true)
	                         ->generate('https://henrywar.blogspot.com/', public_path('images/qr-code/' . $data['url_merged_background_filename']));

        $data['sms_filename'] = 'sms-' . $filename;
		Storage::disk('public_qr_code')->put($data['sms_filename'], QrCode::format('png')->encoding('UTF-8')->size(300)->SMS('0931262951', '日本樂天集團今年買下La New旗下負責營運中華職棒球隊Lamigo桃猿的子公司大高熊育樂股份有限公司全部股份'));
		
        return view('qrCodeImage', $data);
    }
}
