<?PHP

namespace ConfrariaWeb\Dashboard\Services;

use ConfrariaWeb\Vendor\Traits\ServiceTrait;
use ConfrariaWeb\Dashboard\Models\Dashboard;
use ConfrariaWeb\Dashboard\Contracts\DashboardContract;

class DashboardService
{
    use ServiceTrait;

    public function __construct(DashboardContract $dashboard)
    {
        $this->obj = $dashboard;
    }

    public function widgets(Dashboard $dashboard = null)
    {
        if (isset($dashboard)) {
            foreach ($dashboard->widgets as $k => $widget) {
                $widget->data = null;
                if (!isset($widget->service)) {
                    unset($dashboard->widgets[$k]);
                    continue;
                }
                $data = resolve($widget->service . 'Service');
                $data->set($widget);
                $widget->data = $data->get();
            }
            return $dashboard->widgets;
        }
        return NULL;
    }


    /*
    function createWidget($data, $id, $errorsRedirect = true, $dashboard = null)
    {
        $data['sync']['optionsValues'] = $this->formatOptionsForRelationships(isset($data['sync']['optionsValues']) ? $data['sync']['optionsValues'] : []);
        $dashboard = $this->obj->createWidget($data, $id);
        return $dashboard;
    }

    function updateWidget($data, $id, $widget_pivot_id, $errorsRedirect = true, $dashboard = null)
    {
        $data['sync']['optionsValues'] = $this->formatOptionsForRelationships(isset($data['sync']['optionsValues']) ? $data['sync']['optionsValues'] : []);
        $dashboard = $this->obj->updateWidget($data, $id, $widget_pivot_id);
        return $dashboard;
    }
    */

}
