<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductImage;
use App\Models\Product;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository extends BaseRepository {
    public function model()
    {
        return User::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        $query->where('role', '=', 2);
        if (isset($searchParams['search'])) {
            $search = $searchParams['search'];
            $query->where('name', 'like', "$search%");
        }
        $users = $query->paginate(10);
        return view('admin.pages.user.users', compact('users'));
    }

    public function store($params) {
        $user = new $this->model;
        $params['password'] = Hash::make($params['password']);
        $params['role'] = 1;
        $user->fill($params);
        $user->save();
    }

    public function edit($id) {
        return $this->model->select('id', 'name', 'email', 'active')->where('id', $id)->firstOrFail();
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
        User::where('id', auth()->user()->id)->update([
            'password'=> Hash::make($params['newPassword'])
        ]);

        return 1;
    }

}
