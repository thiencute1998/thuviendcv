<?php

namespace App\Repositories\Admin;

use App\Models\About;
use App\Repositories\BaseRepository;

class AboutRepository extends BaseRepository {
    public function model()
    {
        return About::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        $about = $query->first();
        return view('admin.pages.about.about', compact('about'));
    }

    public function update($params) {
        $config = $this->model->firstOrFail();
        $config->fill($params);
        $config->save();
    }

}
