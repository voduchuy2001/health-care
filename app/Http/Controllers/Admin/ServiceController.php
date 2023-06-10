<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ToastrHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Services\StoreServicesRequest;
use App\Http\Requests\Admin\Services\UpdateServicesRequest;
use App\Models\Service;
use App\Traits\ImageTrait;

class ServiceController extends Controller
{
    use ImageTrait;

    protected $perPage = 10;

    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $services = $this->service->orderByDesc('created_at')->paginate($this->perPage);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(StoreServicesRequest $request)
    {
        $data = $request->validated();

        $data['image'] = $this->uploadImage($request, 'image', 'images');

        $service = $this->service->create($data);

        ToastrHelper::success('Thêm mới', $service->name);

        return redirect()->route('admin.service.index');
    }

    public function edit($id)
    {
        $service = $this->service->findOrFail($id);

        return view('admin.services.edit', compact('service'));
    }

    public function update(UpdateServicesRequest $request, $id)
    {
        $data = $request->validated();

        $service = $this->service->findOrFail($id);

        if ($request['image']) {
            $this->deleteImage($service->image);
            $data['image'] = $this->uploadImage($request, 'image', 'images');
        }

        $service->update($data);

        ToastrHelper::success('Cập nhật', $service->name);

        return redirect()->route('admin.service.index');
    }

    public function delete($id)
    {
        $service = $this->service->findOrFail($id);

        $this->deleteImage($service->image);
        $service->delete();

        ToastrHelper::success('Xóa', $service->name);

        return redirect()->route('admin.service.index');
    }
}
