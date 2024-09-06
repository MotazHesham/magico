<?php

namespace App\Http\Controllers\Frontend; 

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Page;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductsController extends Controller
{ 
    public function index(Request $request)
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Product::with(['page'])->select(sprintf('%s.*', (new Product)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'product_show';
                $editGate      = 'product_edit';
                $deleteGate    = 'product_delete';
                $crudRoutePart = 'products';

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
            $table->addColumn('page_page_name', function ($row) {
                return $row->page ? $row->page->page_name : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });
            $table->editColumn('colors', function ($row) {
                return $row->colors ? $row->colors : '';
            });
            $table->editColumn('sizes', function ($row) {
                return $row->sizes ? $row->sizes : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'page']);

            return $table->make(true);
        }

        return view('frontend.products.index');
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('page_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.products.create', compact('pages'));
    }

    public function store(StoreProductRequest $request)
    { 
        $validatedRequest = $request->all(); 
        $validatedRequest['colors'] = implode(',',$request->colors);
        $validatedRequest['sizes'] = implode(',',$request->sizes);
        $validatedRequest['predictions'] = implode(',',$request->predictions); 
        $product = Product::create($validatedRequest);

        return redirect()->route('frontend.products.index');
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('page_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product->load('page');

        return view('frontend.products.edit', compact('pages', 'product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedRequest = $request->all(); 
        $validatedRequest['colors'] = implode(',',$request->colors);
        $validatedRequest['sizes'] = implode(',',$request->sizes);
        $validatedRequest['predictions'] = implode(',',$request->predictions); 
        $product->update($validatedRequest);

        return redirect()->route('frontend.products.index');
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('page');

        return view('frontend.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        $products = Product::find(request('ids'));

        foreach ($products as $product) {
            $product->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
