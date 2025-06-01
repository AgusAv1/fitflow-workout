@extends('layouts.app')

@section('title', 'Detail Resep')

<link rel="stylesheet" href="{{ asset('css/recipe-detail.css') }}">

@section('content')
<div class="container">
    <!-- Header Detail -->
    <div class="recipe-detail-header">
        <div class="header-navigation">
            <a href="/recipes" class="btn-back">
                <span>←</span>
                <span>Kembali ke Resep</span>
            </a>
            <button class="btn-favorite-large" id="favoriteBtn">♡</button>
        </div>
        
        <div class="recipe-hero">
            <div class="recipe-image-large">
                <img src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}" id="recipeImage">
                <div class="recipe-badge">
                    <span class="difficulty-badge easy" id="difficultyBadge">{{ $recipe['difficulty'] }}</span>
                </div>
            </div>
            <div class="recipe-info">
                <h1 id="recipeTitle">{{ $recipe['title'] }}</h1>
                <p class="recipe-description-large" id="recipeDescription">
                    {{ $recipe['description'] }}
                </p>
                <div class="recipe-stats">
                    <div class="stat-item">
                        <span class="stat-icon">⏱️</span>
                        <div class="stat-info">
                            <span class="stat-value" id="cookTime">{{ $recipe['cook_time'] }}</span>
                            <span class="stat-label">Menit</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-icon">🔥</span>
                        <div class="stat-info">
                            <span class="stat-value" id="calories">{{ $recipe['calories'] }}</span>
                            <span class="stat-label">Kalori</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-icon">👥</span>
                        <div class="stat-info">
                            <span class="stat-value" id="servings">{{ $recipe['servings'] }}</span>
                            <span class="stat-label">Porsi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ingredients Section -->
    <div class="ingredients-section-main">
        <h2>🛒 Bahan-bahan</h2>
        <div class="ingredients-list" id="ingredientsList">
            @if(isset($ingredients))
                @foreach($ingredients as $ingredient)
                <div class="ingredient-item">
                    <span class="ingredient-amount">{{ $ingredient['amount'] }}</span>
                    <span class="ingredient-name">{{ $ingredient['name'] }}</span>
                </div>
                @endforeach
            @else
                <!-- Default ingredients jika tidak ada data -->
                <div class="ingredient-item">
                    <span class="ingredient-amount">2 buah</span>
                    <span class="ingredient-name">English muffin</span>
                </div>
                <div class="ingredient-item">
                    <span class="ingredient-amount">4 butir</span>
                    <span class="ingredient-name">Telur segar</span>
                </div>
                <div class="ingredient-item">
                    <span class="ingredient-amount">200ml</span>
                    <span class="ingredient-name">Butter</span>
                </div>
            @endif
        </div>
    </div>

    <!-- Instructions Section -->
    <div class="instructions-section-main">
        <div class="section-header">
            <h2>👨‍🍳 Langkah Memasak</h2>
            <div class="progress-summary">
                <span id="progressText">0 dari <span id="totalSteps">6</span> langkah selesai</span>
                <div class="progress-circle" id="progressCircle">
                    <span id="progressPercentage">0%</span>
                </div>
            </div>
        </div>
        
        <div class="steps-container" id="stepsContainer">
            @if(isset($instructions))
                @foreach($instructions as $index => $step)
                <div class="step-item" data-step="{{ $index + 1 }}">
                    <div class="step-checkbox">
                        <input type="checkbox" id="step{{ $index + 1 }}" class="step-check">
                        <label for="step{{ $index + 1 }}" class="custom-checkbox"></label>
                    </div>
                    <div class="step-content">
                        <div class="step-header">
                            <h4>{{ $step['title'] }}</h4>
                            <span class="step-time">{{ $step['time'] }}</span>
                        </div>
                        <p>{{ $step['description'] }}</p>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Default steps jika tidak ada data -->
                <div class="step-item" data-step="1">
                    <div class="step-checkbox">
                        <input type="checkbox" id="step1" class="step-check">
                        <label for="step1" class="custom-checkbox"></label>
                    </div>
                    <div class="step-content">
                        <div class="step-header">
                            <h4>Persiapan Saus Hollandaise</h4>
                            <span class="step-time">5 menit</span>
                        </div>
                        <p>Lelehkan butter dalam panci kecil. Di mangkuk terpisah, kocok kuning telur dengan air lemon hingga mengental.</p>
                    </div>
                </div>
                
                <div class="step-item" data-step="2">
                    <div class="step-checkbox">
                        <input type="checkbox" id="step2" class="step-check">
                        <label for="step2" class="custom-checkbox"></label>
                    </div>
                    <div class="step-content">
                        <div class="step-header">
                            <h4>Poach Telur</h4>
                            <span class="step-time">8 menit</span>
                        </div>
                        <p>Didihkan air dengan cuka dalam panci. Buat pusaran air, lalu masukkan telur satu per satu.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
// Progress tracking functionality
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.step-check');
    const progressText = document.getElementById('progressText');
    const progressCircle = document.getElementById('progressCircle');
    const progressPercentage = document.getElementById('progressPercentage');
    const totalSteps = checkboxes.length;
    
    // Update total steps in progress text
    document.getElementById('totalSteps').textContent = totalSteps;

    function updateProgress() {
        const completedSteps = document.querySelectorAll('.step-check:checked').length;
        const percentage = Math.round((completedSteps / totalSteps) * 100);
        
        progressText.innerHTML = `${completedSteps} dari ${totalSteps} langkah selesai`;
        progressPercentage.textContent = `${percentage}%`;
        
        // Update circular progress
        const degrees = (percentage / 100) * 360;
        progressCircle.style.background = `conic-gradient(#70A604 ${degrees}deg, #e2e8f0 ${degrees}deg)`;
    }

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const stepItem = this.closest('.step-item');
            if (this.checked) {
                stepItem.classList.add('completed');
            } else {
                stepItem.classList.remove('completed');
            }
            updateProgress();
        });
    });

    // Favorite button functionality
    const favoriteBtn = document.getElementById('favoriteBtn');
    favoriteBtn.addEventListener('click', function() {
        this.classList.toggle('active');
        if (this.classList.contains('active')) {
            this.innerHTML = '♥';
        } else {
            this.innerHTML = '♡';
        }
    });
});
</script>

@endsection