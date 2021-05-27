<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\RouteContract;
use App\Contracts\TransportContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Http;
use App\Models\Route;
use App\Models\Segment;
use Illuminate\Support\Facades\DB;

class RouteController extends BaseController
{
    protected $productRepository;
    protected $transportRepository;

    public function __construct(
        RouteContract $productRepository,
        TransportContract $transportRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->transportRepository = $transportRepository;
    }

    public function index()
    {
        $routes = $this->productRepository->listRoutes();
        $transports = $this->transportRepository->listTransports();

        $this->setPageTitle('Routes', 'Route List');
        return view('admin.routes.index', compact('routes', 'transports'));
    }

    public function create()
    {
        /*$brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');*/

        $this->setPageTitle('Routes', 'Create Route');
        return view('admin.routes.create');/*, compact('categories', 'brands'));*/
    }

    public function fetch()
    {
        $response = Http::withHeaders([
            'secret-key' => '$2b$10$APDq0mxwrHh2KlXwpCEaJ.4xHXMqLNU7nwfDwKtZ9AxcxZziSS/tW'
        ])->get('https://api.jsonbin.io/b/609d306d83c4596e5cac36d3/12');

        $route = json_decode($response->body());
            foreach($route as $r){
                $route = new Route;
                $route->route_code = $r->route_code;
                $route->name = $r->name;
                $route->start_point = $r->start_point;
                $route->end_point = $r->end_point;
                $route->start_time = $r->start_time;
                $route->end_time = $r->end_time;
                $route->url = $r->url;
                $route->transport = $r->transport;
                $route->save();
                foreach($r->segments as $seg){
                    $segments = new Segment;
                    $segments->name = $seg->name;
                    $segments->arrival_time = $seg->arrival_time;
                    $segments->lat = $seg->lat;
                    $segments->lng = $seg->lng;
                    $segments->route_id = $r->route_code;
                    $segments->save();
                }
            }
        
            if (!$route) {
                return $this->responseRedirectBack('Error occurred while importing landmark.', 'error', true, true);
            }
            
            return $this->responseRedirect('admin.routes.index', 'Duomenys importuoti sėkmingai' ,'success',false, false);
    }

    public function store(Request $request)
    {
        $params = $request->except('_token');
        $product = $this->productRepository->createRoute($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }
        
        return $this->responseRedirect('admin.transports.index', 'Product added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $route = $this->productRepository->findRouteById($id);
        $segments = DB::table('segments')->get();
        /*$brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');*/

        $this->setPageTitle('Routes', 'Edit Route');
        return view('admin.routes.edit', compact('route', 'segments'));
    }

    public function update(Request $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->updateRoute($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.routes.index', 'Product updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $product = $this->productRepository->deleteRoute($id);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while deleting category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.routes.index', 'Category deleted successfully' ,'success',false, false);
    }
}
