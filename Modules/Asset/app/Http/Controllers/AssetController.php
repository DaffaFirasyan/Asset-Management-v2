<?php

namespace Modules\Asset\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Asset\Services\AssetService;
use Modules\Asset\Http\Requests\StoreAssetRequest;
use Modules\Asset\Http\Requests\UpdateAssetRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * AssetController
 * 
 * Handles HTTP requests for asset management.
 * Follows Single Responsibility Principle - only handles request/response.
 * Business logic is delegated to AssetService.
 * Validation is handled by Form Request classes.
 */
class AssetController extends Controller
{
    /**
     * @var AssetService
     */
    protected AssetService $service;

    /**
     * Constructor with dependency injection
     */
    public function __construct(AssetService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of assets
     */
    public function index(): View
    {
        $assets = $this->service->getAllAssets();
        
        return view('asset::index', compact('assets'));
    }

    /**
     * Show the form for creating a new asset
     */
    public function create(): View
    {
        return view('asset::create');
    }

    /**
     * Store a newly created asset
     * Validation is automatically handled by StoreAssetRequest
     */
    public function store(StoreAssetRequest $request): RedirectResponse
    {
        $this->service->storeAsset($request->validated());
        
        return redirect()
            ->route('assets.index')
            ->with('success', 'Aset berhasil disimpan!');
    }

    /**
     * Display the specified asset
     */
    public function show(string $id): View
    {
        $asset = $this->service->getAssetById($id);
        
        return view('asset::show', compact('asset'));
    }

    /**
     * Show the form for editing the specified asset
     */
    public function edit(string $id): View
    {
        $asset = $this->service->getAssetById($id);
        
        return view('asset::edit', compact('asset'));
    }

    /**
     * Update the specified asset
     * Validation is automatically handled by UpdateAssetRequest
     */
    public function update(UpdateAssetRequest $request, string $id): RedirectResponse
    {
        $this->service->updateAsset($id, $request->validated());
        
        return redirect()
            ->route('assets.index')
            ->with('success', 'Aset berhasil diupdate!');
    }

    /**
     * Remove the specified asset
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->service->deleteAsset($id);
        
        return redirect()
            ->route('assets.index')
            ->with('success', 'Aset berhasil dihapus!');
    }
}