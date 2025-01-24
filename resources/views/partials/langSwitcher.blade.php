<input type="hidden" name="lang" value="{{ currentEditingLang() }}">
<ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
    @foreach (config('panel.available_languages') as $langLocale => $langName) 
        <li class="nav-item">
            <a class="nav-link @if(currentEditingLang() == $langLocale) active @endif" href="{{ url()->current() }}?lang={{ $langLocale }}">
                {{ $langName }}
            </a>
        </li> 
    @endforeach
</ul>