<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductImage;
use App\Models\Product;
use App\Models\Admin;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminRepository extends BaseRepository {
    public function model()
    {
        return User::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        $query->where('role', '=', 1);
        if (isset($searchParams['search'])) {
            $search = $searchParams['search'];
            $query->where('name', 'like', "$search%");
        }
        $admins = $query->paginate(10);
        return view('admin.pages.admin.admins', compact('admins'));
    }

    public function store($params) {
        $user = new $this->model;
        $params['password'] = Hash::make($params['password']);
        $params['role'] = 1;
        $user->fill($params);
        $user->save();
    }

    public function edit($id) {
        return $this->model->select('id', 'name', 'email')->where('id', $id)->firstOrFail();
    }

    public function update($params, $id) {
        $user = $this->model->find($id);
        $user->fill($params);
        $user->save();
    }

    public function delete($id) {
        $this->model->where('id', $id)->delete();
    }

    public function editPassword() {
        $user = auth()->user();
        return view('admin.pages.user.edit_password', compact('user'));
    }

    public function updatePassword($params) {
        Admin::where('id', auth()->user()->id)->update([
            'password'=> Hash::make($params['newPassword'])
        ]);

        return 1;
    }

}
