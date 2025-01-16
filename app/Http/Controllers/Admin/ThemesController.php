<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyThemeRequest;
use App\Http\Requests\StoreThemeRequest;
use App\Http\Requests\UpdateThemeRequest;
use App\Models\Theme;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ThemesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('theme_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $themes = Theme::with(['media'])->get();

        return view('admin.themes.index', compact('themes'));
    }

    public function create()
    {
        abort_if(Gate::denies('theme_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.themes.create');
    }

    public function store(StoreThemeRequest $request)
    {
        $theme = Theme::create($request->all());

        foreach ($request->input('photo', []) as $file) {
            $theme->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $theme->id]);
        }

        return redirect()->route('admin.themes.index');
    }

    public function edit(Theme $theme)
    {
        abort_if(Gate::denies('theme_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.themes.edit', compact('theme'));
    }

    public function update(UpdateThemeRequest $request, Theme $theme)
    {
        $theme->update($request->all());

        if (count($theme->photo) > 0) {
            foreach ($theme->photo as $media) {
                if (! in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $theme->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $theme->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        return redirect()->route('admin.themes.index');
    }

    public function show(Theme $theme)
    {
        abort_if(Gate::denies('theme_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.themes.show', compact('theme'));
    }

    public function destroy(Theme $theme)
    {
        abort_if(Gate::denies('theme_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $theme->delete();

        return back();
    }

    public function massDestroy(MassDestroyThemeRequest $request)
    {
        $themes = Theme::find(request('ids'));

        foreach ($themes as $theme) {
            $theme->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('theme_create') && Gate::denies('theme_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Theme();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
