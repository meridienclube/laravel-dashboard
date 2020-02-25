<?PHP

namespace ConfrariaWeb\Dashboard\Repositories;

use ConfrariaWeb\Dashboard\Contracts\DashboardContract;
use ConfrariaWeb\Dashboard\Models\Dashboard;
use ConfrariaWeb\Dashboard\Models\DashboardWidget;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;
use ConfrariaWeb\Widget\Models\Widget;
use Auth;
use Illuminate\Support\Facades\DB;

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

    public function storeWidget($data, $id)
    {
        $dashboard = $this->obj->find($id);
        $widgets = $data['widgets']?? null;
        if(isset($widgets)){
            $widgets = array_map(function($widget){
                $r['user_id'] = Auth::id();
                $r['widget_id'] = $widget;
                return $r;
              }, $widgets);

            $dashboard->widgets()->attach($widgets);
        }
        return $dashboard;
    }

    public function updateWidget($data, $id, $widget_id)
    {
        $widget = $data['widget']?? NULL;
        if(isset($widget)){
            $dashboard = DB::table('widgetgables')
            ->where('id', $widget_id)
            ->update($widget);
        }
        return true;
    }

}
