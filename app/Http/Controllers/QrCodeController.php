<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Storage;
use QrCode; 

class QrCodeController extends Controller
{
    public function generateImage() 
    {
		$filename = Carbon::now()->timestamp . '.png';
        $data['url_filename'] = 'url-' . $filename;
        $path = public_path('images/qr-code/');
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
		QrCode::format('png')->size(300)
	                         ->generate('https://henrywar.blogspot.com/', $path . $data['url_filename']);
        $data['url_merged_filename'] = 'url-merged-' . $filename;
		QrCode::format('png')->size(300)
                             ->merge(public_path('images/logo.png'), 0.3, true)
	                         ->generate('https://henrywar.blogspot.com/', $path . $data['url_merged_filename']);

        $data['url_merged_background_filename'] = 'url-merged-background-' . $filename;
		QrCode::format('png')->size(300)
                             ->backgroundColor(255,255,204)
                             ->merge(public_path('images/logo.png'), 0.3, true)
	                         ->generate('https://henrywar.blogspot.com/', $path . $data['url_merged_background_filename']);

        $data['sms_filename'] = 'sms-' . $filename;
		Storage::disk('public_qr_code')->put($data['sms_filename'], QrCode::format('png')->encoding('UTF-8')->size(300)->SMS('0931262951', __('Women take part in Japan\'s 1,250-year-old \'naked festival\' for first time')));
		
        return view('qr-code', $data);
    }
}
