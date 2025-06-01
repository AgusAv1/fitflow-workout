@extends('layouts.app')

@section('title', 'Dashboard')

@vite('resources/css/dashboard.css')

@section('content')
<div class="container">
    <!-- Header Dashboard -->
    <div class="dashboard-header">
        <div class="header-content">
            <div class="welcome-section">
                <h1>Dashboard FitFlow</h1>
                <p>Selamat datang kembali! Mari lanjutkan perjalanan sehat Anda hari ini.</p>
            </div>
            <div class="header-mascot">
                <div class="mascot-icon">🥗</div>
            </div>
        </div>
    </div>

    <!-- Cooking Section -->
    <div class="cooking-section">
        <div class="cooking-grid">
            <!-- Timer -->
            <div class="cooking-timer">
                <h3>Cooking Timer</h3>
                <div class="timer-card-container">
                    <a href="{{ route('timer') }}" class="timer-card">
                        <div class="timer-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#70A604" stroke-width="2"/>
                                <circle cx="12" cy="12" r="6" stroke="#82c341" stroke-width="2" fill="rgba(112, 166, 4, 0.1)"/>
                                <path d="M12 6v6l4 2" stroke="#70A604" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="12" cy="12" r="1" fill="#70A604"/>
                                <path d="M12 2v2M12 20v2M2 12h2M20 12h2" stroke="#82c341" stroke-width="1.5" opacity="0.7"/>
                            </svg>
                        </div>
                        <h4>Atur Timer</h4>
                    </a>
                </div>
            </div>

            <!-- Recipes -->
            <div class="cooking-recipes">
                <div class="section-header">
                    <h3>Cooking Recipes</h3>
                    <a href="{{ route('recipes.index') }}" class="see-all">See all</a>
                </div>
                <div class="recipes-grid">
                    @foreach($randomRecipes as $recipe)
                    <div class="recipe-card">
                        <a href="{{ route('recipes.detail', $recipe['id']) }}">
                            <img src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}" class="recipe-image">
                            <h4>{{ $recipe['title'] }}</h4>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Main Features Grid -->
    <div class="main-features">
        <div class="features-grid">
            <!-- To-Do List Section -->
            <div class="feature-section todo-section">
                <div class="section-header">
                    <h3>To-Do List</h3>
                    <a href="{{ route('todolist') }}" class="see-all">See all</a>
                </div>
                <div class="todo-list">
                    <div class="todo-item">
                        <div class="todo-content">
                            <h4>🏃 Morning Workout</h4>
                            <p>Lari</p>
                        </div>
                        <div class="todo-checkbox">
                            <input type="checkbox" id="workout1">
                            <label for="workout1"></label>
                        </div>
                    </div>
                    <div class="todo-item">
                        <div class="todo-content">
                            <h4>🥗 Oatmeal Buah Segar</h4>
                            <p>Healthy Breakfast</p>
                        </div>
                        <div class="todo-checkbox">
                            <input type="checkbox" id="breakfast1">
                            <label for="breakfast1"></label>
                        </div>
                    </div>
                    <div class="todo-item">
                        <div class="todo-content">
                            <h4>💧 Minum Air Putih</h4>
                            <p>Sehari minimal 8 gelas</p>
                        </div>
                        <div class="todo-checkbox">
                            <input type="checkbox" id="water1">
                            <label for="water1"></label>
                        </div>
                    </div>
                    <div class="todo-item">
                        <div class="todo-content">
                            <h4>🧘 Yoga Class</h4>
                            <p>With Rachael Wisdom</p>
                        </div>
                        <div class="todo-checkbox">
                            <input type="checkbox" id="yoga1">
                            <label for="yoga1"></label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Workouts Section -->
            <div class="feature-section workouts-section">
                <h3>Workouts</h3>
                <div class="workout-tabs">
                    <button class="tab-btn active">Workout Plans</button>
                </div>
                <div class="workout-content">
                    <div class="workout-card">
                        <!-- Card kecil untuk akses workout dan jadwal -->
                        <div class="d-flex flex-column gap-2 mt-3">
                            <a href="{{ route('workout') }}" class="btn btn-outline-success btn-sm">Ke Halaman Workout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daily Tip -->
    <div class="daily-tip">
        <div class="tip-header">
            <h3>💡 Tips Hari Ini</h3>
        </div>
        <div class="tip-content">
            <p><strong>Hidrasi yang Cukup:</strong> Minum air putih minimal 8 gelas sehari untuk menjaga metabolisme tubuh tetap optimal. Mulailah hari dengan segelas air hangat untuk membangunkan sistem pencernaan.</p>
        </div>
    </div>
</div>
@endsection
