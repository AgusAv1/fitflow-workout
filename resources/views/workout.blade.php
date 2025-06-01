@extends('layouts.workoutlayout')

@section('title', 'Workout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/workout.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
    </div>
    <h1 class="mb-4">🏋️‍♂️ Workout</h1>

    <!-- Kategori Gerakan -->
    <div class="row">
        <div class="col-md-8">
            <h3>Kumpulan Gerakan Olahraga</h3>
            <div class="accordion" id="exerciseCategories">
                @php
                    $categories = ['Back', 'Arms', 'Legs', 'Core', 'Cardio', 'Full Body'];
                    $exercises = [
                        'Back' => [
                            ['name' => 'Superman', 'description' => 'Latihan untuk memperkuat otot punggung bawah, glutes, dan hamstring. Cara melakukan: Berbaring tengkurap di lantai dengan tangan lurus ke depan. Secara bersamaan angkat dada, tangan, dan kaki dari lantai hingga membentuk lengkungan seperti superman terbang. Tahan posisi selama 2-3 detik, rasakan kontraksi di punggung bawah. Turunkan perlahan dan ulangi. Pastikan tidak mengangkat kepala terlalu tinggi untuk menghindari ketegangan leher.', 'duration' => '3 set x 15 detik'],
                            

                            
                            ['name' => 'Bent Over Rows', 'description' => 'Latihan untuk otot punggung atas, rhomboid, dan rear deltoid. Cara melakukan: Berdiri dengan kaki selebar bahu, tekuk lutut sedikit. Condongkan tubuh ke depan hingga sudut 45 derajat, punggung tetap lurus. Dengan tangan memegang beban atau gunakan resistance band, tarik tangan ke arah perut dengan siku mendekati tubuh. Peras otot punggung di atas, tahan sejenak, lalu turunkan perlahan. Jaga agar kepala tetap sejajar dengan tulang belakang.', 'duration' => '3 set x 12 repetisi'],
                            
                            ['name' => 'Lat Pulldown', 'description' => 'Latihan untuk otot latissimus dorsi, rhomboid, dan bicep. Cara melakukan: Duduk di bangku lat pulldown dengan paha terkunci di bawah pad. Pegang bar dengan grip lebar, tangan lebih lebar dari bahu. Condongkan tubuh sedikit ke belakang, dada keluar. Tarik bar ke bawah menuju dada bagian atas dengan menggunakan otot punggung, bukan lengan. Peras otot punggung saat bar mencapai dada, tahan sejenak, lalu lepaskan perlahan dengan kontrol.', 'duration' => '3 set x 10 repetisi'],
                            
                            ['name' => 'Deadlift', 'description' => 'Latihan compound untuk punggung bawah, glutes, hamstring, dan trapezius. Cara melakukan: Berdiri dengan kaki selebar bahu, barbell di depan kaki. Tekuk lutut dan pinggul, turunkan tubuh hingga bisa memegang bar dengan punggung lurus. Grip bar dengan tangan selebar bahu. Angkat beban dengan mendorong tumit ke lantai dan meluruskan pinggul serta lutut secara bersamaan. Jaga bar tetap dekat dengan tubuh. Berdiri tegak dengan bahu ke belakang, lalu turunkan beban dengan gerakan terkontrol.', 'duration' => '3 set x 8 repetisi'],
                            
                            ['name' => 'Pull Up', 'description' => 'Latihan bodyweight untuk lat, rhomboid, rear deltoid, dan bicep. Cara melakukan: Gantung pada pull-up bar dengan grip overhand, tangan sedikit lebih lebar dari bahu. Mulai dari posisi lengan lurus, dada keluar, bahu ke bawah. Tarik tubuh ke atas hingga dagu melewati bar dengan menggunakan otot punggung. Hindari mengayun atau menggunakan momentum. Tahan sejenak di atas, lalu turun perlahan hingga lengan lurus kembali. Fokus pada kontrol gerakan.', 'duration' => '3 set x 6-10 repetisi'],
                        ],
                        
                        'Arms' => [
                            ['name' => 'Push Up', 'description' => 'Latihan compound untuk dada, trisep, dan deltoid anterior. Cara melakukan: Mulai dalam posisi plank dengan tangan di lantai selebar bahu, tubuh lurus dari kepala hingga tumit. Turunkan tubuh dengan menekuk siku hingga dada hampir menyentuh lantai, siku membentuk sudut 45 derajat dengan tubuh. Dorong tubuh kembali ke posisi awal dengan meluruskan lengan. Jaga core tetap kencang dan hindari mengangkat pinggul. Untuk pemula, bisa dilakukan dengan lutut menyentuh lantai.', 'duration' => '3 set x 15 repetisi'],
                            
                            ['name' => 'Tricep Dips', 'description' => 'Latihan isolasi untuk otot trisep dan deltoid anterior. Cara melakukan: Duduk di tepi kursi atau bangku yang stabil, tangan memegang tepi dengan jari menghadap ke depan. Geser tubuh ke depan hingga bokong tidak menyentuh kursi, kaki lurus atau tekuk sesuai kemampuan. Turunkan tubuh dengan menekuk siku hingga membentuk sudut 90 derajat, jaga siku tetap dekat dengan tubuh. Dorong tubuh kembali ke atas dengan meluruskan lengan. Fokus pada kontraksi trisep dan hindari menggunakan kaki untuk membantu.', 'duration' => '3 set x 12 repetisi'],
                            
                            ['name' => 'Bicep Curls', 'description' => 'Latihan isolasi untuk otot bicep dan brachialis. Cara melakukan: Berdiri tegak dengan kaki selebar bahu, pegang dumbbell atau botol air di kedua tangan dengan grip underhand. Lengan berada di samping tubuh, siku dekat dengan pinggang. Angkat beban dengan menekuk siku, kontraksi bicep hingga dumbbell mendekati bahu. Tahan sejenak di atas dengan peras otot bicep. Turunkan beban perlahan dengan kontrol, jangan biarkan beban jatuh. Hindari mengayun tubuh atau menggunakan momentum.', 'duration' => '3 set x 12 repetisi'],
                            
                            ['name' => 'Hammer Curls', 'description' => 'Variasi bicep curl untuk melatih bicep, brachialis, dan brachioradialis. Cara melakukan: Berdiri tegak dengan dumbbell di kedua tangan, posisi grip netral (telapak tangan menghadap tubuh). Lengan lurus di samping tubuh, siku stabil dekat pinggang. Angkat beban dengan menekuk siku tanpa memutar pergelangan tangan, jaga grip tetap netral seperti memegang palu. Angkat hingga dumbbell mendekati bahu, peras otot lengan. Turunkan perlahan dengan kontrol. Gerakan ini melatih sisi berbeda dari bicep dibanding regular curl.', 'duration' => '3 set x 12 repetisi'],
                            
                            ['name' => 'Overhead Tricep Extension', 'description' => 'Latihan isolasi untuk long head tricep. Cara melakukan: Berdiri atau duduk tegak, pegang satu dumbbell dengan kedua tangan di atas kepala, lengan lurus. Posisi siku mengarah ke depan, dekat dengan telinga. Turunkan beban ke belakang kepala dengan menekuk siku hingga dumbbell berada di belakang leher, hanya lengan bawah yang bergerak. Angkat beban kembali ke posisi awal dengan meluruskan lengan, fokus pada kontraksi trisep. Jaga siku tetap stabil dan hindari membuka siku ke samping.', 'duration' => '3 set x 12 repetisi'],
                        ],
                        
                        'Legs' => [
                            ['name' => 'Squats', 'description' => 'Latihan compound untuk quadriceps, glutes, hamstring, dan core. Cara melakukan: Berdiri dengan kaki selebar bahu, jari kaki sedikit mengarah keluar. Turunkan tubuh dengan mendorong pinggul ke belakang dan menekuk lutut, seperti duduk di kursi. Jaga dada tegak, punggung lurus, dan berat badan di tumit. Turun hingga paha sejajar dengan lantai atau sesuai kemampuan. Dorong melalui tumit untuk kembali berdiri, aktifkan glutes di atas. Jaga lutut tidak melewati jari kaki dan tidak kolaps ke dalam.', 'duration' => '3 set x 20 repetisi'],
                            
                            ['name' => 'Lunges', 'description' => 'Latihan unilateral untuk quadriceps, glutes, hamstring, dan stabilitas. Cara melakukan: Berdiri tegak dengan kaki selebar pinggul. Ambil langkah besar ke depan dengan satu kaki, turunkan tubuh hingga kedua lutut membentuk sudut 90 derajat. Lutut depan berada di atas pergelangan kaki, lutut belakang hampir menyentuh lantai. Jaga torso tegak dan core kencang. Dorong melalui tumit kaki depan untuk kembali ke posisi awal. Ulangi dengan kaki yang sama sebelum berganti kaki. Fokus pada keseimbangan dan kontrol gerakan.', 'duration' => '3 set x 12 repetisi per kaki'],
                            
                            ['name' => 'Leg Press', 'description' => 'Latihan untuk quadriceps, glutes, dan hamstring menggunakan mesin. Cara melakukan: Duduk di mesin leg press dengan punggung menempel pada bantalan. Letakkan kaki di platform dengan posisi selebar bahu, jari kaki sedikit mengarah keluar. Turunkan platform dengan menekuk lutut hingga membentuk sudut 90 derajat atau sesuai range of motion. Dorong platform kembali ke atas melalui tumit, jangan lock out lutut sepenuhnya. Jaga core tetap kencang dan punggung menempel pada bantalan. Kontrol gerakan pada fase turun dan naik.', 'duration' => '3 set x 10 repetisi'],
                            
                            ['name' => 'Calf Raises', 'description' => 'Latihan isolasi untuk otot gastrocnemius dan soleus (betis). Cara melakukan: Berdiri tegak dengan kaki selebar pinggul, bisa menggunakan dinding untuk keseimbangan. Angkat tubuh dengan berdiri pada ujung jari kaki setinggi mungkin, kontraksi otot betis. Tahan posisi atas selama 1-2 detik untuk kontraksi maksimal. Turunkan tumit perlahan hingga sedikit di bawah level normal untuk stretch. Ulangi gerakan dengan ritme terkontrol. Untuk intensitas lebih, bisa dilakukan di anak tangga atau menggunakan beban tambahan.', 'duration' => '3 set x 15 repetisi'],
                            
                            ['name' => 'Glute Bridge', 'description' => 'Latihan untuk memperkuat glutes, hamstring, dan core. Cara melakukan: Berbaring telentang dengan lutut ditekuk, kaki rata di lantai selebar pinggul. Lengan di samping tubuh untuk stabilitas. Angkat pinggul dengan mengontraksikan glutes hingga tubuh membentuk garis lurus dari lutut ke bahu. Peras glutes kuat-kuat di posisi atas, tahan 1-2 detik. Turunkan pinggul perlahan tanpa menyentuh lantai sepenuhnya. Jaga core tetap aktif dan hindari melengkungkan punggung bawah berlebihan. Fokus pada aktivasi glutes, bukan quad.', 'duration' => '3 set x 15 repetisi'],
                        ],
                        
                        'Core' => [
                            ['name' => 'Plank', 'description' => 'Latihan isometric untuk core, shoulders, dan glutes. Cara melakukan: Mulai dalam posisi push-up, lalu turunkan ke lengan bawah (forearm). Siku berada tepat di bawah bahu, lengan bawah sejajar. Jaga tubuh lurus dari kepala hingga tumit seperti papan. Aktifkan core dengan menarik pusar ke tulang belakang, jangan biarkan pinggul turun atau naik. Jaga leher netral dengan melihat ke lantai. Bernapas normal selama menahan posisi. Fokus pada kualitas postur daripada durasi. Hentikan jika form mulai rusak.', 'duration' => '3 set x 30 detik'],
                            
                            ['name' => 'Russian Twists', 'description' => 'Latihan rotasi untuk obliques dan rectus abdominis. Cara melakukan: Duduk di lantai dengan lutut ditekuk, kaki sedikit terangkat atau menyentuh lantai. Condongkan tubuh ke belakang hingga core teraktivasi, jaga punggung lurus. Genggam tangan di depan dada atau pegang beban ringan. Putar torso ke kanan hingga tangan hampir menyentuh lantai, lalu putar ke kiri. Gerakan berasal dari core, bukan lengan. Jaga dada tetap terbuka dan shoulders square. Fokus pada kontrol dan kontraksi obliques saat memutar.', 'duration' => '3 set x 20 repetisi'],
                            
                            ['name' => 'Leg Raises', 'description' => 'Latihan untuk lower abs dan hip flexors. Cara melakukan: Berbaring telentang dengan lengan di samping tubuh atau di bawah lower back untuk support. Kaki lurus atau sedikit ditekuk. Angkat kaki dari lantai hingga tegak lurus dengan tubuh (90 derajat), gunakan otot perut bawah. Turunkan kaki perlahan hingga hampir menyentuh lantai tanpa benar-benar menyentuh. Jaga lower back menempel di lantai, jangan melengkung. Jika terlalu sulit, tekuk lutut sedikit. Fokus pada gerakan terkontrol dan kontraksi lower abs.', 'duration' => '3 set x 15 repetisi'],
                            
                            ['name' => 'Bicycle Crunches', 'description' => 'Latihan dinamis untuk rectus abdominis dan obliques. Cara melakukan: Berbaring telentang dengan tangan di belakang kepala, jangan mengunci jari. Angkat kepala dan bahu dari lantai, aktifkan core. Bawa lutut kanan ke dada sambil memutar torso kiri, siku kiri mendekati lutut kanan. Kaki kiri lurus dan sedikit terangkat dari lantai. Ganti sisi dengan lutut kiri ke dada, siku kanan mendekati lutut kiri. Gerakan seperti mengayuh sepeda. Fokus pada rotasi dari core, jangan tarik leher dengan tangan.', 'duration' => '3 set x 20 repetisi'],
                            
                            ['name' => 'Mountain Climbers', 'description' => 'Latihan kardio dan core yang dinamis. Cara melakukan: Mulai dalam posisi plank tinggi, tangan di bawah bahu, tubuh lurus. Bawa lutut kanan ke dada dengan cepat, lalu kembali ke posisi awal sambil membawa lutut kiri ke dada. Gerakan seperti berlari di tempat dalam posisi plank. Jaga pinggul stabil, tidak naik-turun. Core tetap kencang sepanjang gerakan. Lengan tetap kuat menyangga tubuh. Fokus pada kecepatan dengan mempertahankan form yang baik. Bernapas teratur meski gerakan cepat.', 'duration' => '3 set x 30 detik'],
                        ],
                        
                        'Cardio' => [
                            ['name' => 'Jumping Jacks', 'description' => 'Latihan kardio whole-body yang sederhana namun efektif. Cara melakukan: Berdiri tegak dengan kaki rapat dan tangan di samping tubuh. Lompat sambil membuka kaki selebar bahu dan mengangkat tangan ke atas kepala secara bersamaan. Lompat lagi untuk kembali ke posisi awal dengan kaki rapat dan tangan di samping. Jaga gerakan smooth dan rhythmic. Mendarat dengan lembut pada ujung kaki untuk mengurangi impact. Jaga core tetap engaged dan postur tegak. Variasi: step touch untuk low impact atau menambah squat saat kaki terbuka.', 'duration' => '3 set x 50 repetisi'],
                            
                            ['name' => 'Burpees', 'description' => 'Latihan full-body yang menggabungkan kekuatan dan kardio. Cara melakukan: Mulai berdiri tegak, lalu squat dan letakkan tangan di lantai. Jump atau step kaki ke belakang ke posisi plank. Lakukan push-up (opsional). Jump atau step kaki kembali ke posisi squat. Lompat ke atas dengan tangan di atas kepala. Mendarat lembut dan langsung lanjut repetisi berikutnya. Jaga core kencang sepanjang gerakan. Untuk pemula, hilangkan push-up dan ganti jump dengan step. Fokus pada form sebelum kecepatan.', 'duration' => '3 set x 15 repetisi'],
                            
                            ['name' => 'High Knees', 'description' => 'Latihan kardio untuk meningkatkan heart rate dan melatih koordinasi. Cara melakukan: Berdiri tegak dengan kaki selebar pinggul. Lari di tempat sambil mengangkat lutut setinggi mungkin, idealnya hingga sejajar dengan pinggul. Gunakan lengan dengan gerakan natural seperti berlari. Jaga postur tegak, core engaged, dan mendarat pada ujung kaki. Fokus pada kecepatan dan tinggi lutut. Bernapas teratur meski gerakan cepat. Variasi: marching in place untuk low impact atau menambah forward movement.', 'duration' => '3 set x 30 detik'],
                            
                            ['name' => 'Butt Kicks', 'description' => 'Latihan kardio untuk hamstring dan glutes sambil meningkatkan heart rate. Cara melakukan: Berdiri tegak, lari di tempat sambil menendang tumit ke arah bokong. Usahakan tumit menyentuh atau mendekati glutes. Jaga postur tegak dengan core engaged. Gunakan lengan natural seperti gerakan berlari. Mendarat pada ujung kaki dengan lembut. Fokus pada kecepatan dan range of motion tumit ke bokong. Jaga keseimbangan dan hindari condong ke depan. Bernapas teratur sepanjang latihan.', 'duration' => '3 set x 30 detik'],
                            
                            ['name' => 'Jump Rope', 'description' => 'Latihan kardio klasik untuk koordinasi, agility, dan endurance. Cara melakukan: Pegang handle jump rope dengan nyaman, siku dekat dengan tubuh. Putar tali dengan pergelangan tangan, bukan seluruh lengan. Lompat dengan kedua kaki bersamaan, hanya cukup tinggi untuk tali melewati kaki. Mendarat pada ujung kaki dengan lembut, lutut sedikit ditekuk. Jaga postur tegak, core engaged, dan pandangan ke depan. Mulai dengan tempo lambat hingga menguasai ritme. Jika tersandung, langsung lanjutkan. Variasi: single leg, double unders, atau criss-cross.', 'duration' => '3 set x 1 menit'],
                        ],
                        
                        'Full Body' => [
                            ['name' => 'Mountain Climbers', 'description' => 'Latihan full-body yang menggabungkan core strength dan kardio. Cara melakukan: Mulai dalam posisi plank tinggi dengan tangan di bawah bahu, tubuh lurus dari kepala hingga tumit. Bawa lutut kanan ke dada dengan cepat, lalu kembalikan sambil membawa lutut kiri ke dada. Gerakan bergantian seperti berlari di tempat dalam posisi plank. Jaga core kencang, pinggul stabil tidak naik-turun. Lengan tetap kuat menyangga tubuh. Bernapas teratur meski tempo cepat. Fokus pada form sebelum speed untuk menghindari cedera.', 'duration' => '3 set x 30 detik'],
                            
                            ['name' => 'Burpees', 'description' => 'The ultimate full-body exercise menggabungkan strength, cardio, dan coordination. Cara melakukan: Berdiri tegak, squat turun dan letakkan telapak tangan di lantai. Jump atau step kaki ke belakang ke posisi plank. Lakukan push-up hingga dada menyentuh lantai (opsional). Push back up ke plank, jump kaki kembali ke squat. Explosive jump ke atas dengan tangan overhead. Land dengan lembut dan langsung continue. Jaga core engaged sepanjang movement. Modifikasi: step instead of jump, skip push-up, atau half burpee tanpa jump up.', 'duration' => '3 set x 15 repetisi'],
                            
                            ['name' => 'Jump Squats', 'description' => 'Latihan plyometric untuk power, kekuatan kaki, dan kardio. Cara melakukan: Mulai dalam posisi squat dengan kaki selebar bahu, turun hingga paha sejajar lantai. Explosive jump setinggi mungkin sambil mengayunkan lengan ke atas. Land dengan lembut dalam posisi squat, lutut sedikit ditekuk untuk absorb impact. Langsung lanjut ke jump berikutnya tanpa pause. Jaga chest up, core engaged, dan land dengan controlled. Fokus pada soft landing untuk protect joints. Jika terlalu intense, ganti dengan regular squat atau squat dengan calf raise.', 'duration' => '3 set x 15 repetisi'],
                            
                            ['name' => 'Push Press', 'description' => 'Latihan compound untuk shoulders, core, dan legs dalam satu gerakan. Cara melakukan: Berdiri dengan kaki selebar bahu, pegang dumbbell atau beban di shoulder height. Sedikit dip dengan menekuk lutut dan pinggul. Explosive drive up melalui legs sambil press beban overhead. Luruskan lengan sepenuhnya di atas kepala. Controlled lowering beban kembali ke shoulder. Gunakan momentum dari lower body untuk membantu upper body. Jaga core tight, spine neutral. Coordinate breathing dengan movement pattern.', 'duration' => '3 set x 10 repetisi'],
                            
                            ['name' => 'Kettlebell Swings', 'description' => 'Latihan ballistic untuk posterior chain, core, dan cardiovascular fitness. Cara melakukan: Berdiri dengan kaki lebih lebar dari bahu, kettlebell di depan. Hinge di pinggul, grip kettlebell dengan kedua tangan. Swing kettlebell ke belakang antara kaki. Explosive hip thrust drive kettlebell forward hingga chest height. Let gravity pull kettlebell down, hinge kembali saat swing down. Power comes from hips, bukan arms. Jaga spine neutral, core braced. Shoulders packed down. Breathe out saat swing up, in saat swing down.', 'duration' => '3 set x 15 repetisi'],
                        ],
                    ];
                @endphp

                @foreach ($categories as $index => $category)
                <div class="accordion-item">
                    <h2 class="accordion-header d-flex justify-content-between align-items-center" id="heading{{ $index }}">
                        <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                            {{ $category }}
                        </button>
                        <button class="btn btn-primary btn-sm category-do-now-btn" data-category="{{ $category }}">Lakukan Semua</button>
                    </h2>
                    <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#exerciseCategories">
                        <div class="accordion-body">
                            @foreach ($exercises[$category] as $exercise)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $exercise['name'] }}</h5>
                                    <p class="card-text">{{ $exercise['description'] }}</p>
                                    <p><strong>Durasi/Repetisi:</strong> {{ $exercise['duration'] }}</p>
                                    <button class="btn btn-success btn-sm do-now-btn" data-name="{{ $exercise['name'] }}">Lakukan Sekarang</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Workout Hari Ini -->
        <div class="col-md-4">
            <h3>Workout Hari Ini</h3>
            <ul class="list-group" id="todayWorkoutList">
                <!-- List workout yang dipilih akan muncul di sini -->
            </ul>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/workout.js') }}"></script>
@endsection
