<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCreateRequest;
use App\Http\Requests\StoreProductUpdateRequest;
use App\Models\StoreProduct;
use App\Repositories\StoreProductRepository;
use Illuminate\Http\Request;
use Psy\Util\Str;

class StoreController extends BaseController
{
    private $storeProductRepository;

    public function __construct()
    {
        parent::__construct();

        $this->storeProductRepository = app(StoreProductRepository::class);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->storeProductRepository->getAllWithPaginate();
//        dd(__METHOD__, $paginator);

        return view('Store.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        {
            $item = new StoreProduct();
//            dd(__METHOD__, $item);

            return view('Store.edit',
                compact('item'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductCreateRequest $request)
    {

        $data = $request->input();
        //dd(__METHOD__, $data);
        $item = (new StoreProduct())->create($data);

        if($item) {
            return redirect()->route('store.cat.edit', [$item->id])
                ->with(['success' => 'Save successful']);
        } else {
            return back()->withErrors(['msg' => 'Error saving'])
                ->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->storeProductRepository->getEdit($id);
        //dd(__METHOD__, $item);

        return view('Store.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd(__METHOD__, $id);
        $item = $this->storeProductRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        return view('Store.edit',
            compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreProductUpdateRequest $request, $id)
    {
        $item = $this->storeProductRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Record id=[{$id}] not found"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('store.cat.edit', $item->id)
                ->with(['success' => 'Save successful']);
        } else {
            return back()
                ->withErrors(['msg' => 'Error Saving'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //soft-delete
        $result = StoreProduct::destroy($id);
        //dd(__METHOD__, $result);

        if ($result) {

            return redirect()
                ->route('store.cat.index')
                ->with(['success' => 'Post ' . $id . ' has ben deleted! <a href="' . route('store.cat.restore', $id) . '">Restore</a>']);
        } else {
            return back()->withErrors(['msg' => 'Error deleting']);
        }
    }

    public function restore($id)
    {
        $result = StoreProduct::withTrashed()
            ->where('id', $id)
            ->restore();
        if ($result) {
            return redirect()
                ->route('store.cat.edit', $id)
                ->with(['success' => "Cat id[$id] restored"]);
        } else {
            return back()->withErrors(['msg' => 'Error. Can not restore' ]);
        }
    }
}
