<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySettingRequest;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settings = Setting::all(); 

        return view('frontend.settings.index', compact('settings'));
    } 

    public function update(Request $request)
    {  
        if(tenant('theme_id') == 1){
            if($request->setting_type == 'setting_1'){ 
                Setting::updateOrCreate(['key' => 'site_name'], ['value' => $request->site_name]);
                Setting::updateOrCreate(['key' => 'phone'], ['value' => $request->phone]);
                Setting::updateOrCreate(['key' => 'email'], ['value' => $request->email]);
                Setting::updateOrCreate(['key' => 'address'], ['value' => $request->address]);

                if ($request->has('logo')) {
                    if( $request->input('logo') != "undefined"){ 
                        $file = new File(storage_path('tmp/uploads/' . basename($request->input('logo')))); 
                        $extension = pathinfo($file, PATHINFO_EXTENSION);
                        $file_name =  time() . '_logo_settings.'. $extension;
                        $file->move('tenant/'.tenant('id').'/settings',$file_name);
                        Setting::updateOrCreate(['key' => 'logo'], ['value' => 'settings/' . $file_name]);
                    }
                }else{
                    Setting::updateOrCreate(['key' => 'logo'], ['value' => null]);
                }

                if ($request->has('icon')) {
                    if( $request->input('icon') != "undefined"){ 
                        $file = new File(storage_path('tmp/uploads/' . basename($request->input('icon')))); 
                        $extension = pathinfo($file, PATHINFO_EXTENSION);
                        $file_name =  time() . '_icon_settings.'. $extension;
                        $file->move('tenant/'.tenant('id').'/settings',$file_name);
                        Setting::updateOrCreate(['key' => 'icon'], ['value' => 'settings/' . $file_name]);
                    }
                }else{
                    Setting::updateOrCreate(['key' => 'icon'], ['value' => null]);
                }

            }elseif($request->setting_type == 'setting_2'){
                Setting::updateOrCreate(['key' => 'facebook'], ['value' => $request->facebook]);
                Setting::updateOrCreate(['key' => 'twitter'], ['value' => $request->twitter]);
                Setting::updateOrCreate(['key' => 'instagram'], ['value' => $request->instagram]);
                Setting::updateOrCreate(['key' => 'linkedin'], ['value' => $request->linkedin]);
                Setting::updateOrCreate(['key' => 'snapchat'], ['value' => $request->snapchat]); 
                Setting::updateOrCreate(['key' => 'tiktok'], ['value' => $request->tiktok]); 
            }elseif($request->setting_type == 'setting_4'){ 
                Setting::updateOrCreate(['key' => 'meta_title'], ['value' => $request->meta_title]);
                Setting::updateOrCreate(['key' => 'meta_description'], ['value' => $request->meta_description]);
                Setting::updateOrCreate(['key' => 'meta_keywords'], ['value' => implode(',',$request->meta_keywords)]); 
                if ($request->has('metaimage')) { 
                    if($request->input('metaimage') != "undefined"){ 
                        $file = new File(storage_path('tmp/uploads/' . basename($request->input('metaimage')))); 
                        $extension = pathinfo($file, PATHINFO_EXTENSION);
                        $file_name =  time() . '_metaimage_settings.'. $extension;
                        $file->move('tenant/'.tenant('id').'/settings',$file_name);
                        Setting::updateOrCreate(['key' => 'metaimage'], ['value' => 'settings/' . $file_name]);
                    }
                }else{
                    Setting::updateOrCreate(['key' => 'metaimage'], ['value' => null]);
                }
            }elseif($request->setting_type == 'setting_7'){
                Setting::updateOrCreate(['key' => 'about_us_1'], ['value' => $request->about_us_1]); 
                Setting::updateOrCreate(['key' => 'about_us_2'], ['value' => $request->about_us_2]); 
                Setting::updateOrCreate(['key' => 'about_us_3'], ['value' => $request->about_us_3]); 
                Setting::updateOrCreate(['key' => 'about_us_4'], ['value' => $request->about_us_4]); 
                Setting::updateOrCreate(['key' => 'about_us_5'], ['value' => $request->about_us_5]); 

                if ($request->has('about_us_image_1')) {
                    if( $request->input('about_us_image_1') != "undefined"){ 
                        $file = new File(storage_path('tmp/uploads/' . basename($request->input('about_us_image_1')))); 
                        $extension = pathinfo($file, PATHINFO_EXTENSION);
                        $file_name =  time() . '_about_us_image_1_settings.'. $extension;
                        $file->move('tenant/'.tenant('id').'/settings',$file_name);
                        Setting::updateOrCreate(['key' => 'about_us_image_1'], ['value' => 'settings/' . $file_name]);
                    }
                }else{
                    Setting::updateOrCreate(['key' => 'about_us_image_1'], ['value' => null]);
                }
                if ($request->has('about_us_image_2')) {
                    if( $request->input('about_us_image_2') != "undefined"){ 
                        $file = new File(storage_path('tmp/uploads/' . basename($request->input('about_us_image_2')))); 
                        $extension = pathinfo($file, PATHINFO_EXTENSION);
                        $file_name =  time() . '_about_us_image_2_settings.'. $extension;
                        $file->move('tenant/'.tenant('id').'/settings',$file_name);
                        Setting::updateOrCreate(['key' => 'about_us_image_2'], ['value' => 'settings/' . $file_name]);
                    }
                }else{
                    Setting::updateOrCreate(['key' => 'about_us_image_2'], ['value' => null]);
                }
            }elseif($request->setting_type == 'setting_11'){
                Setting::updateOrCreate(['key' => 'recaptcha_active'], ['value' => $request->recaptcha_active]); 
                Setting::updateOrCreate(['key' => 'recaptcha_site_key'], ['value' => $request->recaptcha_site_key]); 
                Setting::updateOrCreate(['key' => 'recaptcha_secret_key'], ['value' => $request->recaptcha_secret_key]);  
            }elseif($request->setting_type == 'setting_12'){ 
                if($request->important_links != null && count($request->important_links) > 0){
                    Setting::updateOrCreate(['key' => 'important_links'], ['value' => json_encode($request->important_links)]); 
                }else{
                    Setting::updateOrCreate(['key' => 'important_links'], ['value' => null]); 
                }
                Setting::updateOrCreate(['key' => 'footer_text'], ['value' => $request->footer_text]);  
                Setting::updateOrCreate(['key' => 'copy_right'], ['value' => $request->copy_right]);  
            }elseif($request->setting_type == 'setting_13'){  
                Setting::updateOrCreate(['key' => 'services_text'], ['value' => $request->services_text]);  
            }elseif($request->setting_type == 'setting_14'){  
                Setting::updateOrCreate(['key' => 'contact_us_text'], ['value' => $request->contact_us_text]);  
                if ($request->has('contactusimage')) {
                    if( $request->input('contactusimage') != "undefined"){ 
                        $file = new File(storage_path('tmp/uploads/' . basename($request->input('contactusimage')))); 
                        $extension = pathinfo($file, PATHINFO_EXTENSION);
                        $file_name =  time() . '_contactusimage_settings.'. $extension;
                        $file->move('tenant/'.tenant('id').'/settings',$file_name);
                        Setting::updateOrCreate(['key' => 'contactusimage'], ['value' => 'settings/' . $file_name]);
                    }
                }else{
                    Setting::updateOrCreate(['key' => 'contactusimage'], ['value' => null]);
                }
            }elseif($request->setting_type == 'setting_15'){  
                Setting::updateOrCreate(['key' => 'first_color'], ['value' => $request->first_color]);  
            }
        }else{
            
        }
        Artisan::call('cache:clear');
        
        return redirect()->route('frontend.settings.index',['setting_type' => $request->setting_type]);
    } 

    
    public function overWriteEnvFile($type, $val)
    { 
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"' . trim($val) . '"';
            if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
                file_put_contents($path, str_replace(
                    $type . '="' . env($type) . '"',
                    $type . '=' . $val,
                    file_get_contents($path)
                ));
            } else {
                file_put_contents($path, file_get_contents($path) . "\r\n" . $type . '=' . $val);
            }
        } 
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_create') && Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Setting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
