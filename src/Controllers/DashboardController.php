<?php

namespace ConfrariaWeb\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    protected $data;

    public function __construct()
    {
        $this->data = [];
    }

    /*
    public function updateWidget(Request $request, $id, $widget_pivot_id)
    {
        $dashboard = resolve('DashboardService')->updateWidget($request->all(), $id, $widget_pivot_id);
        return redirect()
            ->route('dashboards.edit', $id)
            ->with('status', 'Dashboard editado com sucesso!');
    }

    public function storeWidget(Request $request, $id)
    {
        $dashboard = resolve('DashboardService')->createWidget($request->all(), $id);
        return redirect()
            ->route('dashboards.edit', $id)
            ->with('status', 'Dashboards criado com sucesso!');
    }
    */

    public function index()
    {
        $this->data['dashboard'] = $dashboard = resolve('DashboardService')->findBy('user_id', auth()->user()->id);
        $this->data['widgets'] = resolve('DashboardService')->widgets($dashboard);
        return view(config('cw_dashboard.views') . 'dashboards.index', $this->data);
    }

    public function create()
    {
        $data['widgets'] = resolve('WidgetService')->all();
        return view('meridien::dashboard.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $dashboard = resolve('DashboardService')->create($data);
        return redirect()
            ->route('dashboards.edit', $dashboard->id)
            ->with('status', 'Dashboards criado com sucesso!');
    }

    public function show($id)
    {
        $this->data['dashboard'] = $dashboard = resolve('DashboardService')->find($id);
        $this->data['widgets'] = resolve('DashboardService')->widgets($dashboard);
        return view(config('cw_dashboard.views') . 'dashboards.index', $this->data);
    }

    public function edit($id)
    {
        $this->data['widgets'] = resolve('WidgetService')->pluck();
        $this->data['dashboard'] = resolve('DashboardService')->find($id);
        return view(config('cw_dashboard.views') . 'dashboards.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        //dd($data);
        $dashboard = resolve('DashboardService')->update($data, $id);
        return redirect()
            ->route('dashboards.edit', $dashboard->id)
            ->with('status', 'Dashboard editado com sucesso!');
    }


    public function destroy($id)
    {
        //
    }
}
