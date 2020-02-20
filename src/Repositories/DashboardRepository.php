<?PHP

namespace ConfrariaWeb\Dashboard\Repositories;

use ConfrariaWeb\Dashboard\Contracts\DashboardContract;
use ConfrariaWeb\Dashboard\Models\Dashboard;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

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

    protected function attach($obj, $data)
    {
        if (isset($data['widgets'])) {
            $obj->widgets()->attach($data['widgets']);
        }
    }

}
