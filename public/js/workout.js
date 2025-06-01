// JavaScript untuk halaman Workout
// Mengelola daftar workout hari ini 

document.addEventListener('DOMContentLoaded', () => {
    const todayWorkoutList = document.getElementById('todayWorkoutList');
    const doNowButtons = document.querySelectorAll('.do-now-btn');
    const categoryDoNowButtons = document.querySelectorAll('.category-do-now-btn');

    let todayWorkouts = [];

    // Fungsi untuk render daftar workout hari ini
    function renderTodayWorkouts() {
        todayWorkoutList.innerHTML = '';
        if (todayWorkouts.length === 0) {
            todayWorkoutList.innerHTML = '<li class="list-group-item">Belum ada workout hari ini.</li>';
            return;
        }
        todayWorkouts.forEach((workout, index) => {
            const li = document.createElement('li');
            li.className = 'list-group-item d-flex justify-content-between align-items-center';
            li.textContent = workout;
            const removeBtn = document.createElement('button');
            removeBtn.className = 'btn btn-danger btn-sm';
            removeBtn.textContent = 'Hapus';
            removeBtn.addEventListener('click', () => {
                todayWorkouts.splice(index, 1);
                renderTodayWorkouts();
            });
            li.appendChild(removeBtn);
            todayWorkoutList.appendChild(li);
        });
    }

    // Event untuk tombol "Lakukan Sekarang"
    doNowButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const exerciseName = btn.getAttribute('data-name');
            if (!todayWorkouts.includes(exerciseName)) {
                todayWorkouts.push(exerciseName);
                renderTodayWorkouts();
            }
        });
    });

    // Event untuk tombol "Lakukan Semua" kategori
    categoryDoNowButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const category = btn.getAttribute('data-category');
            // Cari semua exercise dalam kategori tersebut
            const exercises = document.querySelectorAll(`#collapse${Array.from(categoryDoNowButtons).indexOf(btn)} .do-now-btn`);
            exercises.forEach(exerciseBtn => {
                const exerciseName = exerciseBtn.getAttribute('data-name');
                if (!todayWorkouts.includes(exerciseName)) {
                    todayWorkouts.push(exerciseName);
                }
            });
            renderTodayWorkouts();
        });
    });

    // Render awal
    renderTodayWorkouts();
});
