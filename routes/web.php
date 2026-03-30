<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class)->middleware(['auth'])->except(['index', 'show']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::resource('reviews', ReviewController::class)->middleware(['auth'])->except(['index', 'show']);
Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{review}', [ReviewController::class, 'show']);

Route::get('/api/search', function() {
    $q = request('q');
    $engine = request('engine', 'google');
    $key = 'abf7a74e163cf60124a3654ebc89008fb607f73740d18759a7047f11c0d01d85';
    $url = 'https://serpapi.com/search.json?api_key='.$key.'&q='.urlencode($q).'&engine='.$engine.'&num=10&gl=us&hl=en';
    $ctx = stream_context_create(['http'=>['timeout'=>15]]);
    $response = @file_get_contents($url, false, $ctx);
    if(!$response) return response()->json(['error'=>'Failed to fetch']);
    return response($response)->header('Content-Type','application/json')->header('Access-Control-Allow-Origin','*');
});

require __DIR__.'/auth.php';
