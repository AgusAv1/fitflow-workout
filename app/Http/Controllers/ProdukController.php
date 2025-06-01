<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('home');
    }

    public function register()
    {
        return view('register');
    }

    public function registerStore(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|unique:users,name',
            'password' => 'required|min:6',
        ]);

        // Simpan user baru
        $user = new \App\Models\User();
        $user->name = $request->username;
        $user->email = $request->username . '@example.com';
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }

    public function login()
    {
        return view('login');
    }

   public function loginProcess(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    $credentials = [
        'name' => $request->username,
        'password' => $request->password
    ];

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    return back()->withErrors([
        'username' => 'Username atau password salah.',
    ])->onlyInput('username');
}

    // Method untuk mendapatkan data resep
    private function getRecipeData()
    {
        return [
            'egg-benedict' => [
                'id' => 'egg-benedict',
                'title' => 'Egg Benedict',
                'description' => 'Telur poached dengan English muffin dan saus hollandaise yang creamy. Resep klasik yang sempurna untuk sarapan mewah di rumah.',
                'image' => asset('images/recipes/eggsbenedict.jpg'),
                'cook_time' => 25,
                'calories' => 320,
                'servings' => 2,
                'difficulty' => 'Mudah'
            ],
            'avocado-toast' => [
                'id' => 'avocado-toast',
                'title' => 'Avocado Toast',
                'description' => 'Roti gandum dengan alpukat segar, tomat cherry dan bumbu Mediterranean yang menyegarkan.',
                'image' => asset('images/recipes/avocadotoast.jpg'),
                'cook_time' => 10,
                'calories' => 280,
                'servings' => 1,
                'difficulty' => 'Mudah'
            ],
            'quinoa-salad' => [
                'id' => 'quinoa-salad',
                'title' => 'Quinoa Salad Bowl',
                'description' => 'Bowl quinoa dengan sayuran segar, chickpeas dan dressing lemon yang sehat dan mengenyangkan.',
                'image' => asset('images/recipes/quinoa.jpg'),
                'cook_time' => 30,
                'calories' => 450,
                'servings' => 2,
                'difficulty' => 'Sedang'
            ],
            'grilled-salmon' => [
                'id' => 'grilled-salmon',
                'title' => 'Grilled Salmon',
                'description' => 'Salmon panggang dengan sayuran kukus dan kentang herbs yang lezat dan bergizi.',
                'image' => asset('images/recipes/grilledsalmon.jpg'),
                'cook_time' => 35,
                'calories' => 520,
                'servings' => 2,
                'difficulty' => 'Sedang'
            ],
            'smoothie-bowl' => [
                'id' => 'smoothie-bowl',
                'title' => 'Green Smoothie Bowl',
                'description' => 'Smoothie bowl hijau dengan topping buah segar dan granola yang sehat dan menyegarkan.',
                'image' => asset('images/recipes/greensmoothie.jpg'),
                'cook_time' => 15,
                'calories' => 220,
                'servings' => 1,
                'difficulty' => 'Mudah'
            ],
            'chicken-teriyaki' => [
                'id' => 'chicken-teriyaki',
                'title' => 'Chicken Teriyaki Bowl',
                'description' => 'Ayam teriyaki dengan nasi coklat dan sayuran Asia yang lezat dan bergizi.',
                'image' => asset('images/recipes/teriyakibowl.jpg'),
                'cook_time' => 40,
                'calories' => 480,
                'servings' => 2,
                'difficulty' => 'Sedang'
            ]
        ];
    }

    // Method untuk dashboard dan fitur utama
    public function dashboard() {
        // Ambil data resep
        $allRecipes = $this->getRecipeData();
        
        // Ambil 3 resep random untuk ditampilkan di dashboard
        $randomRecipes = collect($allRecipes)->random(3)->values();
        
        return view('dashboard', compact('randomRecipes'));
    }

    public function recipes() {
        // Ambil semua data resep untuk halaman recipes
        $recipes = $this->getRecipeData();
        return view('recipes', compact('recipes'));
    }

    // Method baru untuk recipe detail - update di ProdukController
    public function recipeDetail($id) {
    // Data recipe berdasarkan ID - bisa disesuaikan dengan kebutuhan
    $recipeData = $this->getRecipeData();

    // Data ingredients untuk setiap resep
    $ingredientsData = [
        'egg-benedict' => [
            ['amount' => '2 buah', 'name' => 'English muffin'],
            ['amount' => '4 butir', 'name' => 'Telur segar'],
            ['amount' => '200ml', 'name' => 'Butter'],
            ['amount' => '3 buah', 'name' => 'Kuning telur'],
            ['amount' => '1 sdm', 'name' => 'Cuka putih'],
            ['amount' => '4 lembar', 'name' => 'Ham/Canadian bacon'],
            ['amount' => 'secukupnya', 'name' => 'Garam dan merica']
        ],
        'avocado-toast' => [
            ['amount' => '2 lembar', 'name' => 'Roti gandum'],
            ['amount' => '1 buah', 'name' => 'Alpukat matang'],
            ['amount' => '100g', 'name' => 'Tomat cherry'],
            ['amount' => '2 sdm', 'name' => 'Minyak zaitun'],
            ['amount' => '1 sdt', 'name' => 'Garam laut'],
            ['amount' => '1/2 sdt', 'name' => 'Lada hitam']
        ],
        'quinoa-salad' => [
            ['amount' => '200g', 'name' => 'Quinoa'],
            ['amount' => '150g', 'name' => 'Chickpeas kalengan'],
            ['amount' => '1 buah', 'name' => 'Mentimun'],
            ['amount' => '2 buah', 'name' => 'Tomat'],
            ['amount' => '50g', 'name' => 'Daun bayam'],
            ['amount' => '3 sdm', 'name' => 'Minyak zaitun']
        ],
        'grilled-salmon' => [
            ['amount' => '300g', 'name' => 'Fillet salmon'],
            ['amount' => '200g', 'name' => 'Kentang baby'],
            ['amount' => '150g', 'name' => 'Brokoli'],
            ['amount' => '100g', 'name' => 'Wortel'],
            ['amount' => '2 sdm', 'name' => 'Minyak zaitun'],
            ['amount' => '1 sdt', 'name' => 'Herbs campuran']
        ],
        'smoothie-bowl' => [
            ['amount' => '1 buah', 'name' => 'Pisang beku'],
            ['amount' => '100g', 'name' => 'Bayam segar'],
            ['amount' => '1/2 buah', 'name' => 'Alpukat'],
            ['amount' => '200ml', 'name' => 'Santan kelapa'],
            ['amount' => '50g', 'name' => 'Granola'],
            ['amount' => '1 sdm', 'name' => 'Madu']
        ],
        'chicken-teriyaki' => [
            ['amount' => '300g', 'name' => 'Ayam fillet'],
            ['amount' => '200g', 'name' => 'Nasi coklat'],
            ['amount' => '100g', 'name' => 'Edamame'],
            ['amount' => '1 buah', 'name' => 'Wortel'],
            ['amount' => '3 sdm', 'name' => 'Saus teriyaki']
        ]
    ];

    // Data instructions untuk setiap resep
    $instructionsData = [
        'egg-benedict' => [
            ['title' => 'Persiapan Saus Hollandaise', 'time' => '5 menit', 'description' => 'Lelehkan butter dalam panci kecil. Di mangkuk terpisah, kocok kuning telur dengan air lemon hingga mengental.'],
            ['title' => 'Poach Telur', 'time' => '8 menit', 'description' => 'Didihkan air dengan cuka dalam panci. Buat pusaran air, lalu masukkan telur satu per satu.'],
            ['title' => 'Persiapan English Muffin', 'time' => '3 menit', 'description' => 'Panggang English muffin hingga kecokelatan. Olesi dengan butter dan letakkan ham.'],
            ['title' => 'Penyusunan', 'time' => '2 menit', 'description' => 'Susun English muffin dengan ham di piring. Letakkan telur poached di atasnya.'],
            ['title' => 'Finishing', 'time' => '2 menit', 'description' => 'Tuang saus hollandaise secara merata di atas telur.'],
            ['title' => 'Penyajian', 'time' => '1 menit', 'description' => 'Sajikan segera selagi hangat.']
        ],
        'avocado-toast' => [
            ['title' => 'Persiapan Alpukat', 'time' => '3 menit', 'description' => 'Belah alpukat, hancurkan dengan garpu. Tambahkan air lemon, garam, dan lada.'],
            ['title' => 'Persiapan Tomat', 'time' => '2 menit', 'description' => 'Cuci dan potong tomat cherry menjadi dua bagian.'],
            ['title' => 'Panggang Roti', 'time' => '3 menit', 'description' => 'Panggang roti gandum hingga kecokelatan dan renyah.'],
            ['title' => 'Assembly', 'time' => '2 menit', 'description' => 'Oleskan campuran alpukat ke atas roti. Susun tomat cherry.']
        ],
        'quinoa-salad' => [
            ['title' => 'Masak Quinoa', 'time' => '15 menit', 'description' => 'Bilas quinoa hingga bersih. Masak dengan air perbandingan 1:2.'],
            ['title' => 'Persiapan Sayuran', 'time' => '10 menit', 'description' => 'Potong mentimun dan tomat dadu kecil. Cuci bayam.'],
            ['title' => 'Persiapan Chickpeas', 'time' => '3 menit', 'description' => 'Tiriskan chickpeas dari kaleng dan bilas dengan air bersih.'],
            ['title' => 'Buat Dressing', 'time' => '2 menit', 'description' => 'Campurkan minyak zaitun, air lemon, garam, dan lada.'],
            ['title' => 'Campur Semua', 'time' => '5 menit', 'description' => 'Campurkan semua bahan dan tuang dressing.']
        ],
        'grilled-salmon' => [
            ['title' => 'Persiapan Salmon', 'time' => '10 menit', 'description' => 'Bersihkan salmon, lumuri dengan minyak zaitun dan bumbu.'],
            ['title' => 'Persiapan Kentang', 'time' => '15 menit', 'description' => 'Cuci kentang baby dan rebus hingga empuk.'],
            ['title' => 'Persiapan Sayuran', 'time' => '8 menit', 'description' => 'Potong brokoli dan wortel. Kukus hingga empuk.'],
            ['title' => 'Panggang Salmon', 'time' => '12 menit', 'description' => 'Panaskan grill pan. Panggang salmon 6 menit per sisi.'],
            ['title' => 'Plating', 'time' => '3 menit', 'description' => 'Tata salmon dengan kentang dan sayuran di piring.']
        ],
        'smoothie-bowl' => [
            ['title' => 'Persiapan Buah', 'time' => '2 menit', 'description' => 'Keluarkan pisang beku dari freezer.'],
            ['title' => 'Blend Smoothie', 'time' => '5 menit', 'description' => 'Blend pisang, bayam, alpukat, dan santan hingga halus.'],
            ['title' => 'Cek Konsistensi', 'time' => '2 menit', 'description' => 'Pastikan tekstur tidak terlalu cair.'],
            ['title' => 'Assembly Bowl', 'time' => '3 menit', 'description' => 'Tuang smoothie ke bowl. Susun topping granola.'],
            ['title' => 'Finishing', 'time' => '1 menit', 'description' => 'Teteskan madu di atas. Sajikan segera.']
        ],
        'chicken-teriyaki' => [
            ['title' => 'Marinasi Ayam', 'time' => '15 menit', 'description' => 'Potong ayam, marinasi dengan saus teriyaki.'],
            ['title' => 'Masak Nasi', 'time' => '25 menit', 'description' => 'Masak nasi coklat sesuai petunjuk kemasan.'],
            ['title' => 'Persiapan Sayuran', 'time' => '8 menit', 'description' => 'Potong wortel dan rebus edamame.'],
            ['title' => 'Masak Ayam', 'time' => '12 menit', 'description' => 'Masak ayam hingga matang dan kecokelatan.'],
            ['title' => 'Assembly Bowl', 'time' => '3 menit', 'description' => 'Susun nasi, ayam, dan sayuran dalam bowl.']
        ]
    ];

    // Cek apakah recipe dengan ID tersebut ada
    if (!isset($recipeData[$id])) {
        abort(404, 'Resep tidak ditemukan');
    }

    // Ambil data recipe, ingredients, dan instructions
    $recipe = $recipeData[$id];
    $ingredients = $ingredientsData[$id] ?? [];
    $instructions = $instructionsData[$id] ?? [];
    
    // Return view ke file recipe-detail.php
    return view('recipe-detail', compact('recipe', 'ingredients', 'instructions'));
}

    public function workout() {
        return view('workout');
    }

    public function timer() {
        return view('timer');
    }

    // Tambahan method yang diperlukan dari dashboard view
    public function todolist() {
        return view('todolist');
    }

    public function schedule() {
        return view('schedule');
    }

    public function logout(Request $request) {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('home')->with('success', 'Berhasil logout!');
    }
}