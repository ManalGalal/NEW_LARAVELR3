<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Traits\Common;

class CarController extends Controller
{
    use Common;
    private $columns = ['title', 'description', 'published'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('addCar', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $cars = new Car();
        // $cars->title = $request->title;
        // $cars->description = $request->description;
        // if(isset($request->published)){
        //     $cars->published = 1;
        // }else{
        //     $cars->published = 0;
        // }
        
        // $cars->save();
        // $data = $request->only($this->columns);

        
            $messages = $this->messages();
            $data = $request->validate([
                'title' => 'required|string|max:50',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048', // Allow null for updating without changing the image
                'category_id' => 'required',
            ], $messages);


            $fileName = $this->uploadFile($request->image, 'assets/images');    
            $data['image'] = $fileName;
            $data['published'] = isset($request->published);
            Car::create($data);
            return redirect('cars');
        }

    
            //=============================================
    /* My alternative code that is used to show image and store it in storage 
            // Find the existing car by ID
            $car = Car::findOrFail($id);
    
            // Check if a new image is provided
            if ($request->hasFile('image')) {
                // Upload the new image and update the 'image' field
                $fileName = $this->uploadFile($request->file('image'), 'assets/images');
                $data['image'] = $fileName;
    
            
            }
    
            // Update other fields
            $data['published'] = $request->has('published');
            
            // Update the car record
            $car->update($data);
    
            return redirect('cars')->with('success', 'Car updated successfully');   */

        // $messages = $this->messages();
        // $data = $request->validate([
        //      'title'=>'required|string|max:50',
        //      'description'=> 'required|string',
        //      'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        //     ], $messages);
        // $fileName = $this->uploadFile($request->image, 'assets/images');    
        // $data['image'] = $fileName;
        // $data['published'] = isset($request->published);
        // Car::create($data);
        // return redirect('cars');
        //==========================================
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('showCar', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $car = Car::findOrFail($id);
        // return view('updateCar', compact('car'));

            $car = Car::findOrFail($id);
            $categories = Category::all(); // Assuming you have a Category model
            $selectedValue = $car->category_id;
        
            return view('updateCar', compact('car', 'categories', 'selectedValue'));

    }

    /**
     * Update the specified resource in storage.
     */
    
        public function update(Request $request, string $id)
        
            // Validate the request data

            {
                $messages = $this->messages();
                $data = $request->validate([
                     'title'=>'required|string|max:50',
                     'description'=> 'required|string',
                     'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
                     'category_id' => 'required',
                    ], $messages);
        
                if($request->hasFile('image')){
                    $fileName = $this->uploadFile($request->image, 'assets/images');  
                    $data['image'] = $fileName;
                    unlink("assets/images/" . $request->oldImage);
                }
                
                $data['published'] = isset($request->published);
                Car::where('id', $id)->update($data);
                return redirect('cars');
            }

        //     // return dd($request);
        //     $messages = $this->messages();
        //     $request->validate([
        //         'title' => 'required|string|max:50',
        //         'description' => 'required|string',
        //         'category_id' => 'required',
        //         'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        //     ], $messages);
        //     if($request->hasFile('image')){
        //         $fileName = $this->uploadFile($request->image, 'assets/images');  
        //         $data['image'] = $fileName;
        //         unlink("assets/images/" . $request->oldImage);
        //     }
            
        //     $data['published'] = isset($request->published);
        //     Car::where('id', $id)->update($data);
        //     return redirect('cars');
        // }    
        //=====================================
        //     // Find the existing car by ID
        //     $car = Car::findOrFail($id);
        
        //     // Check if a new image is provided
        //     if ($request->hasFile('image')) {
        //         // Upload the new image and update the 'image' field
        //         $fileName = $this->uploadFile($request->file('image'), 'assets/images');
        //         $car->image = $fileName;
        
        //         // Remove the old image file if needed
        //         // (you may need to implement a file deletion logic based on your requirements)
        //         // Storage::delete('assets/images/' . $car->image);
        //     }
        
        //     // Update other fields
        //     $car->title = $request->title;
        //     $car->description = $request->description;
        //     $car->published = $request->has('published');
        //     $car->save();
        
        //     return redirect('cars')->with('success', 'Car updated successfully');
        // }
        
            //=====================================


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return redirect('cars');
    }

    /**
     * Trashed List.
     */
    public function trashed()
    {
        $cars = Car::onlyTrashed()->get();
        return view('trashed', compact('cars'));
    }

    /**
     * Trashed List.
     */
    public function forceDelete(string $id)
    {
        Car::where('id', $id)->forceDelete();
        return redirect('cars');
    }

    public function restore(string $id)
    {
        Car::where('id', $id)->restore();
        return redirect('cars');
    }

    public function messages(){
        return [
            'title.required'=>'عنوان السيارة مطلوب',
            'title.string'=>'Should be string',
            'description.required'=> 'should be text',
            'image.required'=> 'Please be sure to select an image',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
            ];
    }
}
