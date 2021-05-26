<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\LandmarkContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Http;
use App\Models\Landmark;

class LandmarkController extends BaseController
{
    protected $productRepository;

    public function __construct(
        LandmarkContract $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $landmarks = $this->productRepository->listLandmarks();

        $this->setPageTitle('Landmarks', 'Landmark List');
        return view('admin.landmarks.index', compact('landmarks'));
    }

    public function create()
    {
        /*$brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');*/

        $this->setPageTitle('Landmarks', 'Create Landmark');
        return view('admin.landmarks.create');/*, compact('categories', 'brands'));*/
    }

    public function fetch()
    {
        $response = Http::withHeaders([
            'secret-key' => '$2b$10$APDq0mxwrHh2KlXwpCEaJ.4xHXMqLNU7nwfDwKtZ9AxcxZziSS/tW'
        ])->get('https://api.jsonbin.io/b/609018e392cb9267d0cb1794/5');

        $landmark = json_decode($response->body());
            foreach($landmark as $land){
                $landmark = new Landmark;
                $landmark->name = $land->name;
                $landmark->address = $land->address;
                $landmark->save();
            }
        
            if (!$landmark) {
                return $this->responseRedirectBack('Error occurred while importing landmark.', 'error', true, true);
            }
            
            return $this->responseRedirect('admin.landmarks.index', 'Duomenys importuoti sėkmingai' ,'success',false, false);
    }

    public function store(Request $request)
    {
        $params = $request->except('_token');
        $product = $this->productRepository->createLandmark($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }
        
        return $this->responseRedirect('admin.landmarks.index', 'Product added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $landmark = $this->productRepository->findLandmarkById($id);
        /*$brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');*/

        $this->setPageTitle('Landmarks', 'Edit Landmark');
        return view('admin.landmarks.edit', compact('landmark'));
    }

    public function update(Request $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->updateLandmark($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.landmarks.index', 'Product updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $product = $this->productRepository->deleteLandmark($id);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while deleting category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.landmarks.index', 'Category deleted successfully' ,'success',false, false);
    }
}
