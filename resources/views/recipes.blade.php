@extends('layouts.app')

@section('title', 'Resep Sehat')

{{-- Link ke file CSS terpisah --}}
@vite('resources/css/recipes.css')

@section('content')
<div class="container">
    <!-- Header Recipes -->
    <div class="recipes-header">
        <div class="header-content">
            <div class="back-button">
                <a href="{{ route('dashboard') }}" class="btn-back">
                    <span>←</span>
                    <span>Kembali</span>
                </a>
            </div>
            <div class="header-title">
                <h1>Resep Sehat</h1>
                <p>Temukan resep sehat dan lezat untuk mendukung gaya hidup sehat Anda</p>
            </div>
            <div class="header-mascot">
                <div class="mascot-icon">👨‍🍳</div>
            </div>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="filter-section">
        <div class="search-box">
            <input type="text" placeholder="Cari resep..." id="searchInput">
            <span class="search-icon">🔍</span>
        </div>
        <div class="filter-buttons">
            <button class="filter-btn active" data-category="all">Semua</button>
            <button class="filter-btn" data-category="breakfast">Sarapan</button>
            <button class="filter-btn" data-category="lunch">Makan Siang</button>
            <button class="filter-btn" data-category="dinner">Makan Malam</button>
            <button class="filter-btn" data-category="snack">Camilan</button>
        </div>
    </div>

    <!-- Recipes Grid -->
    <div class="recipes-grid" id="recipesGrid">
        <!-- Egg Benedict -->
        <div class="recipe-card" data-category="breakfast" data-recipe="egg-benedict">
            <div class="recipe-image">
                <img src="{{ asset('images/recipes/eggsbenedict.jpg') }}" alt="Egg Benedict">
                <div class="recipe-overlay">
                    <button class="btn-favorite">♡</button>
                </div>
            </div>
            <div class="recipe-content">
                <h3>Egg Benedict</h3>
                <p class="recipe-description">Telur poached dengan English muffin dan saus hollandaise yang creamy</p>
                <div class="recipe-meta">
                    <div class="meta-item">
                        <span class="meta-icon">⏱️</span>
                        <span>25 mins</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-icon">🔥</span>
                        <span>320 cal</span>
                    </div>
                    <div class="difficulty easy">
                        <span>Mudah</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Avocado Toast -->
        <div class="recipe-card" data-category="breakfast" data-recipe="avocado-toast">
            <div class="recipe-image">
                <img src="{{ asset('images/recipes/avocadotoast.jpg') }}" alt="Avocado Toast">
                <div class="recipe-overlay">
                    <button class="btn-favorite">♡</button>
                </div>
            </div>
            <div class="recipe-content">
                <h3>Avocado Toast</h3>
                <p class="recipe-description">Roti gandum dengan alpukat segar, tomat cherry dan bumbu Mediterranean</p>
                <div class="recipe-meta">
                    <div class="meta-item">
                        <span class="meta-icon">⏱️</span>
                        <span>10 mins</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-icon">🔥</span>
                        <span>280 cal</span>
                    </div>
                    <div class="difficulty easy">
                        <span>Mudah</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quinoa Salad Bowl -->
        <div class="recipe-card" data-category="lunch" data-recipe="quinoa-salad">
            <div class="recipe-image">
                <img src="{{ asset('images/recipes/quinoa.jpg') }}" alt="Quinoa Salad Bowl">
                <div class="recipe-overlay">
                    <button class="btn-favorite">♡</button>
                </div>
            </div>
            <div class="recipe-content">
                <h3>Quinoa Salad Bowl</h3>
                <p class="recipe-description">Bowl quinoa dengan sayuran segar, chickpeas dan dressing lemon</p>
                <div class="recipe-meta">
                    <div class="meta-item">
                        <span class="meta-icon">⏱️</span>
                        <span>30 mins</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-icon">🔥</span>
                        <span>450 cal</span>
                    </div>
                    <div class="difficulty medium">
                        <span>Sedang</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grilled Salmon -->
        <div class="recipe-card" data-category="dinner" data-recipe="grilled-salmon">
            <div class="recipe-image">
                <img src="{{ asset('images/recipes/grilledsalmon.jpg') }}" alt="Grilled Salmon">
                <div class="recipe-overlay">
                    <button class="btn-favorite">♡</button>
                </div>
            </div>
            <div class="recipe-content">
                <h3>Grilled Salmon</h3>
                <p class="recipe-description">Salmon panggang dengan sayuran kukus dan kentang herbs</p>
                <div class="recipe-meta">
                    <div class="meta-item">
                        <span class="meta-icon">⏱️</span>
                        <span>35 mins</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-icon">🔥</span>
                        <span>520 cal</span>
                    </div>
                    <div class="difficulty medium">
                        <span>Sedang</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Green Smoothie Bowl -->
        <div class="recipe-card" data-category="snack" data-recipe="smoothie-bowl">
            <div class="recipe-image">
                <img src="{{ asset('images/recipes/greensmoothie.jpg') }}" alt="Green Smoothie Bowl">
                <div class="recipe-overlay">
                    <button class="btn-favorite">♡</button>
                </div>
            </div>
            <div class="recipe-content">
                <h3>Green Smoothie Bowl</h3>
                <p class="recipe-description">Smoothie bowl hijau dengan topping buah segar dan granola</p>
                <div class="recipe-meta">
                    <div class="meta-item">
                        <span class="meta-icon">⏱️</span>
                        <span>15 mins</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-icon">🔥</span>
                        <span>220 cal</span>
                    </div>
                    <div class="difficulty easy">
                        <span>Mudah</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chicken Teriyaki Bowl -->
        <div class="recipe-card" data-category="lunch" data-recipe="chicken-teriyaki">
            <div class="recipe-image">
                <img src="{{ asset('images/recipes/teriyakibowl.jpg') }}" alt="Chicken Teriyaki Bowl">
                <div class="recipe-overlay">
                    <button class="btn-favorite">♡</button>
                </div>
            </div>
            <div class="recipe-content">
                <h3>Chicken Teriyaki Bowl</h3>
                <p class="recipe-description">Ayam teriyaki dengan nasi coklat dan sayuran Asia</p>
                <div class="recipe-meta">
                    <div class="meta-item">
                        <span class="meta-icon">⏱️</span>
                        <span>40 mins</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-icon">🔥</span>
                        <span>480 cal</span>
                    </div>
                    <div class="difficulty medium">
                        <span>Sedang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const recipeCards = document.querySelectorAll('.recipe-card');
    const searchInput = document.getElementById('searchInput');

    // Filter by category
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');

            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Filter cards
            recipeCards.forEach(card => {
                if (category === 'all' || card.getAttribute('data-category') === category) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeInUp 0.5s ease-out';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        recipeCards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            const description = card.querySelector('.recipe-description').textContent.toLowerCase();

            if (title.includes(searchTerm) || description.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });

    // Recipe card click to detail
    recipeCards.forEach(card => {
        card.addEventListener('click', function(e) {
            if (!e.target.classList.contains('btn-favorite')) {
                const recipeId = this.getAttribute('data-recipe');
                window.location.href = `/recipes/${recipeId}`;
            }
        });
    });

    // Favorite button functionality
    document.querySelectorAll('.btn-favorite').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (this.textContent === '♡') {
                this.textContent = '♥';
                this.style.color = '#e53e3e';
            } else {
                this.textContent = '♡';
                this.style.color = '#fff';
            }
        });
    });
});
</script>
@endsection
