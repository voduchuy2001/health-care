<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ToastrHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServicePack\StoreServicePacksRequest;
use App\Models\Service;
use App\Models\ServicePack;

class ServicePackController extends Controller
{
    public $servicePack, $service;

    public $perPage = 10;

    public function __construct(ServicePack $servicePack, Service $service)
    {
        $this->servicePack = $servicePack;
        $this->service = $service;
    }

    public function index()
    {
        $servicePacks = $this->servicePack->orderByDesc('created_at')->paginate($this->perPage);

        return view('admin.service-packs.index', compact('servicePacks'));
    }

    public function create()
    {
        $services = $this->service->orderByDesc('created_at')->get();

        if (empty($services)) {
            ToastrHelper::warning('Vui lòng thêm các dịch vụ trước.');

            return view('admin.service.index');
        }

        return view('admin.service-packs.create', compact('services'));
    }

    public function store(StoreServicePacksRequest $request)
    {
        $data = $request->validated();

        $servicePack = $this->servicePack->create($data);

        $servicePack->service()->sync($data['services']);

        ToastrHelper::success('Thêm mới', $servicePack->name);

        return redirect()->route('admin.service-pack.index');
    }

    public function delete($id) 
    {
        $servicePack = $this->servicePack->findOrFail($id);

        $servicePack->delete();

        $servicePack->service()->detach();

        ToastrHelper::success('Xóa', $servicePack->name);

        return redirect()->back();
    }
}
