<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCreativeWorkRequest;
use App\Http\Requests\StoreCreativeWorkRequest;
use App\Http\Requests\UpdateCreativeWorkRequest;
use App\Models\CreativeWork;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CreativeWorksController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('creative_work_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $creativeWorks = CreativeWork::with(['media'])->get();

        return view('frontend.creativeWorks.index', compact('creativeWorks'));
    }

    public function create()
    {
        abort_if(Gate::denies('creative_work_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.creativeWorks.create');
    }

    public function store(StoreCreativeWorkRequest $request)
    {
        $creativeWork = CreativeWork::create($request->all());

        if ($request->input('image', false)) {
            $creativeWork->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $creativeWork->id]);
        }

        return redirect()->route('frontend.creative-works.index');
    }

    public function edit(CreativeWork $creativeWork)
    {
        abort_if(Gate::denies('creative_work_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.creativeWorks.edit', compact('creativeWork'));
    }

    public function update(UpdateCreativeWorkRequest $request, CreativeWork $creativeWork)
    {
        $oldLocale = app()->getLocale();
        if($request->has('lang') && in_array($request->lang,array_keys(config('panel.available_languages')))){ 
            app()->setLocale($request->lang);
        }

        $creativeWork->update($request->all());

        app()->setLocale($oldLocale);

        if ($request->input('image', false)) {
            if (! $creativeWork->image || $request->input('image') !== $creativeWork->image->file_name) {
                if ($creativeWork->image) {
                    $creativeWork->image->delete();
                }
                $creativeWork->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($creativeWork->image) {
            $creativeWork->image->delete();
        }
        
        toast('تم التحديث بنجاح','success');
        return redirect()->route('frontend.creative-works.edit', [$creativeWork->id, 'lang' => $request->lang]);
    }

    public function show(CreativeWork $creativeWork)
    {
        abort_if(Gate::denies('creative_work_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.creativeWorks.show', compact('creativeWork'));
    }

    public function destroy(CreativeWork $creativeWork)
    {
        abort_if(Gate::denies('creative_work_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $creativeWork->delete();

        return back();
    }

    public function massDestroy(MassDestroyCreativeWorkRequest $request)
    {
        $creativeWorks = CreativeWork::find(request('ids'));

        foreach ($creativeWorks as $creativeWork) {
            $creativeWork->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('creative_work_create') && Gate::denies('creative_work_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CreativeWork();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
