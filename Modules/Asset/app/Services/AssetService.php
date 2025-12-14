<?php

namespace Modules\Asset\Services;

use Modules\Asset\Repositories\AssetRepository;
use Illuminate\Database\Eloquent\Collection;
use Modules\Asset\Models\Asset;

/**
 * AssetService
 * 
 * Handles business logic for asset management.
 * Acts as a layer between Controller and Repository.
 * Contains only business logic, no HTTP concerns.
 */
class AssetService
{
    /**
     * @var AssetRepository
     */
    protected AssetRepository $repository;

    /**
     * Constructor with dependency injection
     */
    public function __construct(AssetRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all assets with optional filtering
     * 
     * @return Collection
     */
    public function getAllAssets(): Collection
    {
        return $this->repository->getAll();
    }

    /**
     * Create a new asset
     * 
     * @param array $data Validated asset data
     * @return Asset
     */
    public function storeAsset(array $data): Asset
    {
        // Additional business logic can be added here
        // Example: logging, notifications, etc.
        
        return $this->repository->create($data);
    }

    /**
     * Get a single asset by ID
     * 
     * @param string|int $id
     * @return Asset
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getAssetById(string|int $id): Asset
    {
        return $this->repository->findById($id);
    }

    /**
     * Update an existing asset
     * 
     * @param string|int $id
     * @param array $data Validated asset data
     * @return Asset
     */
    public function updateAsset(string|int $id, array $data): Asset
    {
        // Additional business logic can be added here
        // Example: change tracking, audit logs, etc.
        
        return $this->repository->update($id, $data);
    }

    /**
     * Delete an asset
     * 
     * @param string|int $id
     * @return bool
     */
    public function deleteAsset(string|int $id): bool
    {
        // Additional business logic can be added here
        // Example: checking dependencies, soft delete confirmation, etc.
        
        return $this->repository->delete($id);
    }
}