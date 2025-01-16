<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContactuRequest;
use App\Http\Requests\StoreContactuRequest;
use App\Http\Requests\UpdateContactuRequest;
use App\Models\Contactu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContactusController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('contactu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Contactu::query()->select(sprintf('%s.*', (new Contactu)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'contactu_show';
                $editGate      = 'contactu_edit';
                $deleteGate    = 'contactu_delete';
                $crudRoutePart = 'contactus';

                return view('partials.datatablesActions_frontend', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('subject', function ($row) {
                return $row->subject ? $row->subject : '';
            });
            $table->editColumn('message', function ($row) {
                return $row->message ? $row->message : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('frontend.contactus.index');
    }

    public function create()
    {
        abort_if(Gate::denies('contactu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.contactus.create');
    }

    public function store(StoreContactuRequest $request)
    {
        $contactu = Contactu::create($request->all());

        return redirect()->route('frontend.contactus.index');
    }

    public function edit(Contactu $contactu)
    {
        abort_if(Gate::denies('contactu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.contactus.edit', compact('contactu'));
    }

    public function update(UpdateContactuRequest $request, Contactu $contactu)
    {
        $contactu->update($request->all());

        return redirect()->route('frontend.contactus.index');
    }

    public function show(Contactu $contactu)
    {
        abort_if(Gate::denies('contactu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.contactus.show', compact('contactu'));
    }

    public function destroy(Contactu $contactu)
    {
        abort_if(Gate::denies('contactu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactu->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactuRequest $request)
    {
        $contactus = Contactu::find(request('ids'));

        foreach ($contactus as $contactu) {
            $contactu->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}