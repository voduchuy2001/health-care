<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ToastrHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServicePack\StoreServicePacksRequest;
use App\Http\Requests\Admin\ServicePack\UpdateServicePacksRequest;
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

        if (!empty($request->input('price'))) {
            $data['price'] = $request->input('price');
        } else {
            foreach ($data['service_ids'] as $id) {
                $service = $this->service->findOrFail($id);
                $data['price'] += $service->price;
            }
        }

        $servicePack = $this->servicePack->create($data);

        $servicePack->services()->sync($data['service_ids']);

        ToastrHelper::success('Thêm mới', $servicePack->name);

        return redirect()->route('admin.service-pack.index');
    }

    public function edit($id)
    {
        $servicePack = $this->servicePack->findOrFail($id);

        $services = $this->service->orderByDesc('created_at')->get();

        return view('admin.service-packs.edit', compact('servicePack', 'services'));
    }

    public function update(UpdateServicePacksRequest $request, $id)
    {
        $data = $request->validated();

        $servicePack = $this->servicePack->findOrFail($id);

        if (!empty($request->input('price'))) {
            $data['price'] = $request->input('price');
        } else {
            foreach ($data['service_ids'] as $id) {
                $service = $this->service->findOrFail($id);
                $data['price'] += $service->price;
            }
        }

        $servicePack->update($data);

        $servicePack->services()->sync($data['service_ids']);

        ToastrHelper::success('Cập nhật', $servicePack->name);

        return redirect()->route('admin.service-pack.index');
    }

    public function delete($id)
    {
        $servicePack = $this->servicePack->findOrFail($id);

        $servicePack->delete();

        $servicePack->services()->detach();

        ToastrHelper::success('Xóa', $servicePack->name);

        return redirect()->back();
    }
}
