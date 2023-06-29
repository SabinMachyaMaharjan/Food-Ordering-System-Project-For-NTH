<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SizeService;
use App\Http\Requests\SizeRequest;
use RealRashid\SweetAlert\Facades\Alert;
class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $sizeService;
    public function __construct(SizeService $service)
    {
        $this->sizeService=$service;
    }
    public function index()
    {
        //
        $sizes= $this->sizeService->findAll();
        return view('pages.admin.products.productSizes.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.admin.products.productSizes.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $response=$this->sizeService->addSize($request);
        Alert::toast($response['message'], $response['status']);
        return redirect('/admin/product-size');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $size=$this->sizeService->findById($id);
        return view('pages.admin.products.productSizes.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $response=$this->sizeService->updateSize($request,$id);
        Alert::toast($response['message'], $response['status']);
        return redirect('/admin/product-size/{product_size} ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $response=$this->sizeService->deleteRecordById($id);
        Alert::toast($response['message'], $response['status']);
        return redirect('/admin/product-size/{product_size} ');
    }
}
