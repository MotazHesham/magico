
<div class="card">
    <div class="card-header">
        {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link @if (request('setting_type', 'setting_1') == 'setting_1') active @endif" href="#setting_1" role="tab"
                    data-toggle="tab">
                    عام
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request('setting_type') == 'setting_2') active @endif" href="#setting_2" role="tab"
                    data-toggle="tab">
                    روابط السوشيال ميديا
                </a>
            </li> 
            <li class="nav-item">
                <a class="nav-link @if (request('setting_type') == 'setting_4') active @endif" href="#setting_4" role="tab"
                    data-toggle="tab">
                    تحسين محركات البحث
                </a>
            </li> 
            <li class="nav-item">
                <a class="nav-link @if (request('setting_type') == 'setting_7') active @endif" href="#setting_7" role="tab"
                    data-toggle="tab">
                    عن الشركة
                </a>
            </li>  
            <li class="nav-item">
                <a class="nav-link @if (request('setting_type') == 'setting_11') active @endif" href="#setting_11" role="tab"
                    data-toggle="tab">
                    Recaptcha Setting
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request('setting_type') == 'setting_12') active @endif" href="#setting_12" role="tab"
                    data-toggle="tab">
                    footer
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request('setting_type') == 'setting_13') active @endif" href="#setting_13" role="tab"
                    data-toggle="tab">
                    نص خدمتنا
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request('setting_type') == 'setting_14') active @endif" href="#setting_14" role="tab"
                    data-toggle="tab">
                    تواصل معنا
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request('setting_type') == 'setting_15') active @endif" href="#setting_15" role="tab"
                    data-toggle="tab">
                    الالوان
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane @if (request('setting_type', 'setting_1') == 'setting_1') active @endif" role="tabpanel" id="setting_1">
                <form method="POST" action="{{ route('frontend.settings.update') }}" enctype="multipart/form-data"
                    class="p-4">
                    @csrf
                    <input type="hidden" name="setting_type" value="setting_1">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>اسم الموقع</label>
                            <input class="form-control" type="text" name="site_name"
                                value="{{ get_setting('site_name') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>رقم الجوال</label>
                            <input class="form-control" type="text" name="phone"
                                value="{{ get_setting('phone') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>البريد الألكتروني</label>
                            <input class="form-control" type="email" name="email"
                                value="{{ get_setting('email') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>العنوان</label>
                            <textarea class="form-control" name="address" id="address">{{ get_setting('address') }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>اللوجو</label>
                            <div class="needsclick dropzone" id="logo-dropzone">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>icon</label>
                            <div class="needsclick dropzone" id="icon-dropzone">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="tab-pane @if (request('setting_type') == 'setting_2') active @endif" role="tabpanel" id="setting_2">
                <form method="POST" action="{{ route('frontend.settings.update') }}" enctype="multipart/form-data"
                    class="p-4">
                    @csrf
                    <input type="hidden" name="setting_type" value="setting_2">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>SnapChat</label>
                            <input class="form-control" type="text" name="snapchat"
                                value="{{ get_setting('snapchat') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>LinkedIn</label>
                            <input class="form-control" type="text" name="linkedin"
                                value="{{ get_setting('linkedin') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Instagram</label>
                            <input class="form-control" type="text" name="instagram"
                                value="{{ get_setting('instagram') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>x.com</label>
                            <input class="form-control" type="text" name="twitter"
                                value="{{ get_setting('twitter') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Facebook</label>
                            <input class="form-control" type="text" name="facebook"
                                value="{{ get_setting('facebook') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>TikTok</label>
                            <input class="form-control" type="text" name="tiktok"
                                value="{{ get_setting('tiktok') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            </div> 
            <div class="tab-pane @if (request('setting_type') == 'setting_4') active @endif" role="tabpanel" id="setting_4">
                <form method="POST" action="{{ route('frontend.settings.update') }}" enctype="multipart/form-data"
                    class="p-4">
                    @csrf
                    <input type="hidden" name="setting_type" value="setting_4">
                    <div class="form-group">
                        <label>Meta Title</label>
                        <input class="form-control" type="text" name="meta_title"
                            value="{{ get_setting('meta_title') }}">
                    </div>
                    <div class="form-group">
                        <label>Meta Description</label>
                        <input class="form-control" type="test" name="meta_description"
                            value="{{ get_setting('meta_description') }}">
                    </div>
                    <div class="form-group">
                        <label>Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords[]" placeholder="Keywords ..."
                            data-role="tagsinput" value="{{ get_setting('meta_keywords') }}">
                    </div>
                    <div class="form-group">
                        <label>Meta Image</label>
                        <div class="needsclick dropzone" id="metaimage-dropzone">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            </div>  
            <div class="tab-pane @if (request('setting_type') == 'setting_7') active @endif" role="tabpanel" id="setting_7">
                <form method="POST" action="{{ route('frontend.settings.update') }}" enctype="multipart/form-data"
                    class="p-4">
                    @csrf
                    <input type="hidden" name="setting_type" value="setting_7">
                    <div class="form-group">
                        <label>نص 1</label>
                        <input class="form-control" type="text" name="about_us_1" value="{{ get_setting('about_us_1') }}">
                    </div>
                    <div class="form-group">
                        <label>نص 2</label>
                        <textarea class="form-control" name="about_us_2">{{ get_setting('about_us_2') }}</textarea> 
                    </div>
                    <div class="form-group">
                        <label>نص 3</label>
                        <input class="form-control" type="text" name="about_us_3" value="{{ get_setting('about_us_3') }}">
                    </div>
                    <div class="form-group">
                        <label>نص 4</label>
                        <textarea class="form-control" name="about_us_4">{{ get_setting('about_us_4') }}</textarea>  
                    </div>
                    <div class="form-group">
                        <label>نص 5</label>
                        <textarea class="form-control ckeditor" name="about_us_5" id="about_us_5">{{ get_setting('about_us_5') }}</textarea>
                    </div>
                    <div class="row"> 
                        <div class="form-group col-md-6">
                            <label>صورة 1</label>
                            <div class="needsclick dropzone" id="aboutusimage1-dropzone">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>صورة 2</label>
                            <div class="needsclick dropzone" id="aboutusimage2-dropzone">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            </div>  
            <div class="tab-pane @if (request('setting_type') == 'setting_11') active @endif" role="tabpanel" id="setting_11">
                <form method="POST" action="{{ route('frontend.settings.update') }}" enctype="multipart/form-data"
                    class="p-4">
                    @csrf
                    <input type="hidden" name="setting_type" value="setting_11">
                    <div class="form-group">
                        <label>تفعيل Google Recaptcha</label>
                        <br>
                        <label class="c-switch c-switch-pill c-switch-success">
                            <input type="checkbox" name="recaptcha_active" class="c-switch-input"
                                {{ get_setting('recaptcha_active') ? 'checked' : null }}>
                            <span class="c-switch-slider"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Site Key</label>
                        <input class="form-control" type="text" name="recaptcha_site_key"
                            value="{{ get_setting('recaptcha_site_key') }}">
                    </div>
                    <div class="form-group">
                        <label>Secret Key</label>
                        <input class="form-control" type="text" name="recaptcha_secret_key"
                            value="{{ get_setting('recaptcha_secret_key') }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="tab-pane @if (request('setting_type') == 'setting_12') active @endif" role="tabpanel" id="setting_12">
                <form method="POST" action="{{ route('frontend.settings.update') }}" enctype="multipart/form-data"
                    class="p-4">
                    @csrf
                    <input type="hidden" name="setting_type" value="setting_12">
                    <div class="form-group">
                        <label>نص </label>
                        <textarea class="form-control" name="footer_text" id="footer_text">{{ get_setting('footer_text') }}</textarea>
                    </div> 
                    <div class="form-group">
                        <label>Copy Right </label>
                        <textarea class="form-control" name="copy_right" id="copy_right">{{ get_setting('copy_right') }}</textarea>
                    </div> 
                    <div class="row" id="dynamic-links-container">
                        @if (get_setting('important_links'))
                            @foreach (json_decode(get_setting('important_links'), true) as $key => $link)
                                <div class="link-row form-group col-md-12 d-flex">
                                    <div class="form-group col-md-4">
                                        <label>اسم الرابط</label>
                                        <input class="form-control" type="text"
                                            name="important_links[{{ $key }}][name]"
                                            placeholder="اسم الرابط" value="{{ $link['name'] }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>الرابط</label>
                                        <input class="form-control" type="text"
                                            name="important_links[{{ $key }}][link]" placeholder="الرابط"
                                            value="{{ $link['link'] }}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button type="button" class="btn btn-danger remove-row mt-4">x</button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="link-row form-group col-md-12 d-flex">
                                <div class="form-group col-md-4">
                                    <label>اسم الرابط</label>
                                    <input class="form-control" type="text" name="important_links[0][name]"
                                        placeholder="اسم الرابط">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>الرابط</label>
                                    <input class="form-control" type="text" name="important_links[0][link]"
                                        placeholder="الرابط">
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-danger remove-row mt-4">x</button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="text-center">

                        <button type="button" class="btn btn-success" id="add-more">إضافة المزيد</button>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="tab-pane @if (request('setting_type') == 'setting_13') active @endif" role="tabpanel" id="setting_13">
                <form method="POST" action="{{ route('frontend.settings.update') }}" enctype="multipart/form-data"
                    class="p-4">
                    @csrf
                    <input type="hidden" name="setting_type" value="setting_13"> 
                    <div class="form-group">
                        <label>نص خدمتنا</label>
                        <textarea class="form-control ckeditor" name="services_text" id="services_text">{{ get_setting('services_text') }}</textarea>
                    </div> 
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            </div>  
            <div class="tab-pane @if (request('setting_type') == 'setting_14') active @endif" role="tabpanel" id="setting_14">
                <form method="POST" action="{{ route('frontend.settings.update') }}" enctype="multipart/form-data"
                    class="p-4">
                    @csrf
                    <input type="hidden" name="setting_type" value="setting_14"> 
                    <div class="form-group">
                        <label>صورة </label>
                        <div class="needsclick dropzone" id="contactusimage-dropzone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>نص تواصل معنا</label>
                        <textarea class="form-control" name="contact_us_text" id="contact_us_text">{{ get_setting('contact_us_text') }}</textarea>
                    </div> 
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            </div>  
            <div class="tab-pane @if (request('setting_type') == 'setting_15') active @endif" role="tabpanel" id="setting_15">
                <form method="POST" action="{{ route('frontend.settings.update') }}" enctype="multipart/form-data"
                    class="p-4">
                    @csrf
                    <input type="hidden" name="setting_type" value="setting_15"> 
                    <div class="form-group">
                        <label>First color</label>
                        <input class="form-control" type="color" name="first_color"
                            value="{{ get_setting('first_color') }}">
                    </div> 
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>