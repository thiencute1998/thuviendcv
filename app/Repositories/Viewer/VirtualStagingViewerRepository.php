<?php

namespace App\Repositories\Viewer;

use App\Models\Product;
use App\Repositories\BaseRepository;
define('VIRTUAL_STAGING', 2);
class VirtualStagingViewerRepository extends BaseRepository {
    public function model()
    {
        return Product::class;
    }

    public function index($slug = null) {
        $query = $this->model->where('status', 1);
        if ($slug) {
            $query->where('slug', $slug);
        }
        $products = Product::where('service_id', VIRTUAL_STAGING)->where('status', 1)->get();
        $productDetail = $query->where('service_id', VIRTUAL_STAGING)->with('productImages')->orderBy('id','asc')->first();
        $slug = $productDetail->slug;
        return view('viewer.pages.services.virtual_staging', compact('products', 'productDetail', 'slug'));
    }
}
