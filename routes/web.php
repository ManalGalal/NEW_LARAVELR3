<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('about', function () {
    return view('about');
});

Route::get('contactus', function () {
    return view('contactus');
});



//Routing Constrains --> Prefix and Gropu


Route::prefix('blog')->group(function(){


    Route::get('/', function () {
        return view ('blog') ;
    });

    Route::get('science', function () {
        return view ('science') ;
    });

    Route::get('sports', function () {
        return view ('sports') ;
    });

    Route::get('math', function () {
        return view ('math') ;
    });
    Route::get('medical', function () {
        return view ('medical') ;
    });
    
});

//=====================================================================================
//    session Practice
//=====================================================================================
            // Route::get('test', function () {
            //     return 'welcome to my laravel project';
            // });
          // Route::get('test1/{id}', function ($id) {
            //     return ' the  Id is: ' . $id ;
            // });

            // //Routing Constrains--> Send Parameter with Regular Expression

            // // Route::get('test2/{id?}', function ($id=0) {
            // //     return ' the  Id is: ' . $id ;
            // // })->where(['id' => '[0-9]+  ']);


            // // Routing Constrains --> Sending Parameter with Wherenumber 

            // Route::get('test2/{id?}', function ($id=0) {
            //     return ' the  Id is: ' . $id ;
            // })->whereNumber('id') ;


            // //Routing Constrains--> Sending Parameter with WhereAlpha

            // Route::get('test3/{name?}', function ($name=null) {
            //     return ' the  name is: ' . $name ;
            // })->whereAlpha('name') ;


            // // Routing Constrains--> Multiple Parameters

            // Route::get('test4/{id}/{name}', function ($id=0, $name) {
            //     return ' the  Id is: ' . $id . ' and my name is: ' . $name ;
            // })->where(['id' => '[0-9]+', 'name' =>'[a-zA-Z]+']);


            // // Routing Constrains --> Using whereIN 
            // Route::get('product/{category}', function ($cat) {
            //     return ' the Category is: ' . $cat ;
            // })->whereIn('category',['laptop','pc', 'mobile']) ;


//Routing Constrains Patterns-->  APP -> Providers
//== Go to RouteServiceProvider.php-> add the required constrains inside  public function boot(): void like this 
        // public function boot(): void 
        // {
        //     Route::pattern( 'name', '[a-zA-Z]+');
        // }
        // pattern is used with regular expression only

   

    // Route::get('test1/{id}', function ($id) {
    //     return ' the  Id is: ' . $id ;
    // });
    
    // Route::get('sport', function () {
    //     return 'welcome to my laravel project';
    // });
    
    // Route::get('test2/{id?}', function ($id=0) {
    //     return ' the  Id is: ' . $id ;
    // })->whereNumber('id') ;
    
    
    //Routing Constrains--> Sending Parameter with WhereAlpha
    
    // Route::get('test3/{name?}', function ($name=null) {
    //     return ' the  name is: ' . $name ;
    // })->whereAlpha('name') ;
    
    
    // Routing Constrains--> Multiple Parameters
    
//     Route::get('test4/{id}/{name}', function ($id=0, $name) {
//         return ' the  Id is: ' . $id . ' and my name is: ' . $name ;
//     })->where(['id' => '[0-9]+', 'name' =>'[a-zA-Z]+']);
    
    
//     // Routing Constrains --> Using whereIN 
//     Route::get('product/{category}', function ($cat) {
//         return ' the Category is: ' . $cat ;
//     })->whereIn('category',['laptop','pc', 'mobile']) ;

// });

//=================================
// FALLBACK --> it routes 404 Error Page to a certain page.


// Route::fallback(function(){
//     return redirect('/');
// });

// Route::fallback(fn() => redirect('/'));

//=========================
//Route to View 


//New Blade File Route