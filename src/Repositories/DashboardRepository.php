<?PHP

namespace ConfrariaWeb\Dashboard\Repositories;

use ConfrariaWeb\Dashboard\Contracts\DashboardContract;
use ConfrariaWeb\Dashboard\Models\Dashboard;
use ConfrariaWeb\Dashboard\Models\DashboardWidget;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;
use ConfrariaWeb\Widget\Models\Widget;

class DashboardRepository implements DashboardContract
{

    use RepositoryTrait;

    function __construct(Dashboard $dashboard)
    {
        $this->obj = $dashboard;
    }

    public function where(array $data = [], $take = null)
    {
        $where = $this->obj;
        $where = isset($take) ? $where->paginate($take) : $where->get();
        return $where;
    }

    protected function syncs($obj, $data)
    {
        /*
       //dd($data['widgets']);
        //dd($obj->widgets()->sync($data['widgets']));
        if (isset($data['widgets'])) {
            foreach($data['widgets'] as $k => $widget) {
                //$wid = DashboardWidget::find($k);
                dd($k, $widget);
                //dd($data['widgets'][$widget->pivot->id]);
                //$widget->pivot->update($data['widgets'][$widget->pivot->id]);
                //$widget->pivot->options = $data['widgets'][$widget->pivot->id]['options']?? NULL;
                //$widget->pivot->save();
            }



            //$obj->widgets()->detach(array_keys($data['widgets']));
            //$obj->widgets()->attach($data['widgets']);

            //dd($data['widgets']);

            foreach($data['widgets'] as $k => $widget) {
                dd($obj);
                $obj->widgets()->where('id', $k)->sync($widget);
            }

        }
        */
    }

    protected function attach($obj, $data)
    {
        if (isset($data['widgets'])) {
            $obj->widgets()->attach($data['widgets']);
        }
    }

}
