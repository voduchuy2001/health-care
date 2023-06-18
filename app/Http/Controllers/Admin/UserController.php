<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SetPageTitleHelper;
use App\Helpers\ToastrHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UpdateUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $user;

    public $perPage = 10;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        SetPageTitleHelper::setTitle('Người dùng');
        
        $data = $request['search_keywords'];

        if ($data) {
            $users = $this->user
                ->where(function ($query) use ($data) {
                    $query->where('email', 'like', '%' . $data . '%');
                })
                ->paginate($this->perPage);

            $users->appends(['search_keywords' => $data]);
        } else {
            $users = $this->user->orderByDesc('created_at')->paginate($this->perPage);
        }

        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        SetPageTitleHelper::setTitle('Cập nhật thông tin người dùng');

        $user = $this->user->findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUsersRequest $request, $id)
    {
        $data = $request->validated();
        
        $user = $this->user->findOrFail($id);

        if ($user->is_default === 1) {
            ToastrHelper::warning('Không thể cập nhật quyền cho tài khoản ' . $user->email);

            return redirect()->route('admin.user.index');
        }

        $user->update($data);

        ToastrHelper::success('Cập nhật', $user->email);

        return redirect()->route('admin.user.index');
    }
}
