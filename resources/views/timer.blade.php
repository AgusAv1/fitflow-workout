<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitFlow Timer</title>

    {{-- CSS Styles --}}
    <link rel="stylesheet" href="{{ asset('css/timer.css') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="timer-container">
        <div class="timer-content">
            {{-- Timer Header --}}
            <div class="timer-header">
                <h1>🍳 FitFlow Timer</h1>
                <p>Timer untuk memasak</p>
            </div>

            {{-- Timer Display --}}
            <div class="timer-display">
                <div class="timer-circle" id="timerCircle">
                    <div class="timer-progress" id="timerProgress"></div>
                    <div class="timer-text" id="timerText">00:00</div>
                </div>
            </div>

            {{-- Timer Controls --}}
            <div class="timer-controls">
                <button class="control-btn start-btn" id="startBtn">▶️ Start</button>
                <button class="control-btn pause-btn" id="pauseBtn">⏸️ Pause</button>
                <button class="control-btn reset-btn" id="resetBtn">🔄 Reset</button>
            </div>

            {{-- Preset Timers --}}
            <div class="timer-preset">
                <h3>⚡ Quick Timer</h3>
                <div class="preset-buttons">
                    <button class="preset-btn" data-time="300">Telur Setangah mateng</button>
                    <button class="preset-btn" data-time="600">Telur Matang</button>
                    <button class="preset-btn" data-time="180">sayur</button>
                    <button class="preset-btn" data-time="900">Daging</button>
                    <button class="preset-btn" data-time="960">Rebus Dada Ayam</button>
                </div>
            </div>

            {{-- Custom Timer --}}
            <div class="custom-timer">
                <h3>⏰ Custom Timer</h3>
                <div class="time-inputs">
                    <input type="number" class="time-input" id="minutesInput" min="0" max="59" value="0">
                    <span class="time-label">Menit</span>
                    <input type="number" class="time-input" id="secondsInput" min="0" max="59" value="0">
                    <span class="time-label">Detik</span>
                    <button class="control-btn start-btn" id="setCustomBtn">Set</button>
                </div>
            </div>

            {{-- Timer Status --}}
            <div class="timer-status" id="timerStatus">
                <div class="status-text">Timer siap digunakan</div>
            </div>

            <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('dashboard') }}" class="back-btn">Kembali ke Dashboard</a>
            </div>

        </div>
    </div>


    {{-- Notification --}}
    <div class="notification" id="notification">
        <div>⏰ Waktu habis!</div>
    </div>

    {{-- Hidden Audio Element --}}
    <audio class="alarm-sound" id="alarmSound" preload="auto">
        <source src="data:audio/wav;base64,UklGRnoGAABXQVZFZm10IBAAAAABAAEAQB8AAEAfAAABAAgAZGF0YQoGAACBhYqFbF1Xl1tYXVUKTVZZWFUKZ1tYXVUKTVZZWFUKZ1tYXVUKTVZZWFUKZ1tYXVUKTVZZWFUKZ1tYXVUKTVZZWFUKZ1tYXVUKTVZZWFUKZ1tYXVUKTVZZWFUKZ1tYXVUKTVZZWFUK" type="audio/wav">
    </audio>


    {{-- JavaScript --}}
    <script src="{{ asset('js/timer.js') }}"></script>

    {{-- Additional Scripts if needed --}}
    @stack('scripts')
</body>
</html>
