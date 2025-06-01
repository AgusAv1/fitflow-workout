class FitFlowTimer {
    constructor() {
        this.timerInterval = null;
        this.totalTime = 0;
        this.currentTime = 0;
        this.isRunning = false;
        this.isPaused = false;

        this.initializeElements();
        this.bindEvents();
        this.updateDisplay();
    }

    initializeElements() {
        this.timerText = document.getElementById('timerText');
        this.timerCircle = document.getElementById('timerCircle');
        this.timerProgress = document.getElementById('timerProgress');
        this.startBtn = document.getElementById('startBtn');
        this.pauseBtn = document.getElementById('pauseBtn');
        this.resetBtn = document.getElementById('resetBtn');
        this.timerStatus = document.getElementById('timerStatus');
        this.notification = document.getElementById('notification');
        this.alarmSound = document.getElementById('alarmSound');
        this.minutesInput = document.getElementById('minutesInput');
        this.secondsInput = document.getElementById('secondsInput');
        this.setCustomBtn = document.getElementById('setCustomBtn');
    }

    bindEvents() {
        this.startBtn.addEventListener('click', () => this.startTimer());
        this.pauseBtn.addEventListener('click', () => this.pauseTimer());
        this.resetBtn.addEventListener('click', () => this.resetTimer());
        this.setCustomBtn.addEventListener('click', () => this.setCustomTime());

        // Preset buttons
        document.querySelectorAll('.preset-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const time = parseInt(e.target.dataset.time);
                this.setTime(time);
            });
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            if (e.code === 'Space') {
                e.preventDefault();
                if (this.isRunning) {
                    this.pauseTimer();
                } else {
                    this.startTimer();
                }
            } else if (e.code === 'KeyR') {
                this.resetTimer();
            }
        });
    }

    setTime(seconds) {
        if (this.isRunning) return;

        this.totalTime = seconds;
        this.currentTime = seconds;
        this.updateDisplay();
        this.updateStatus('Timer diatur ke ' + this.formatTime(seconds));
    }

    setCustomTime() {
        const minutes = parseInt(this.minutesInput.value) || 0;
        const seconds = parseInt(this.secondsInput.value) || 0;
        const totalSeconds = (minutes * 60) + seconds;

        if (totalSeconds > 0) {
            this.setTime(totalSeconds);
        }
    }

    startTimer() {
        if (this.currentTime <= 0) {
            this.updateStatus('Silakan atur waktu terlebih dahulu');
            return;
        }

        this.isRunning = true;
        this.isPaused = false;
        this.timerCircle.classList.add('running');
        this.updateStatus('Timer berjalan...');

        this.timerInterval = setInterval(() => {
            this.currentTime--;
            this.updateDisplay();

            if (this.currentTime <= 0) {
                this.finishTimer();
            }
        }, 1000);
    }

    pauseTimer() {
        if (!this.isRunning) return;

        this.isRunning = false;
        this.isPaused = true;
        this.timerCircle.classList.remove('running');
        clearInterval(this.timerInterval);
        this.updateStatus('Timer dijeda');
    }

    resetTimer() {
        this.isRunning = false;
        this.isPaused = false;
        this.currentTime = this.totalTime;
        this.timerCircle.classList.remove('running', 'finished');
        clearInterval(this.timerInterval);
        this.updateDisplay();
        this.updateStatus('Timer direset');
    }

    finishTimer() {
        this.isRunning = false;
        this.timerCircle.classList.remove('running');
        this.timerCircle.classList.add('finished');
        clearInterval(this.timerInterval);

        this.updateStatus('⏰ Waktu habis!');
        this.showNotification();
        this.playAlarm();
    }

    updateDisplay() {
        const formattedTime = this.formatTime(this.currentTime);
        this.timerText.textContent = formattedTime;

        // Update progress
        const progress = this.totalTime > 0 ?
            ((this.totalTime - this.currentTime) / this.totalTime) * 360 : 0;
        this.timerProgress.style.setProperty('--progress', progress + 'deg');
    }

    formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = seconds % 60;
        return `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
    }

    updateStatus(message) {
        this.timerStatus.querySelector('.status-text').textContent = message;
    }

    showNotification() {
        this.notification.classList.add('show');
        setTimeout(() => {
            this.notification.classList.remove('show');
        }, 3000);
    }

    playAlarm() {
        // Create a simple beep sound using Web Audio API
        try {
            const audioContext = new (window.AudioContext || window.webkitAudioContext)();
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();

            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);

            oscillator.frequency.value = 800;
            oscillator.type = 'sine';

            gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 1);

            oscillator.start(audioContext.currentTime);
            oscillator.stop(audioContext.currentTime + 1);

            // Repeat beep 3 times
            setTimeout(() => {
                const osc2 = audioContext.createOscillator();
                const gain2 = audioContext.createGain();
                osc2.connect(gain2);
                gain2.connect(audioContext.destination);
                osc2.frequency.value = 1000;
                osc2.type = 'sine';
                gain2.gain.setValueAtTime(0.3, audioContext.currentTime);
                gain2.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 1);
                osc2.start();
                osc2.stop(audioContext.currentTime + 1);
            }, 500);

            setTimeout(() => {
                const osc3 = audioContext.createOscillator();
                const gain3 = audioContext.createGain();
                osc3.connect(gain3);
                gain3.connect(audioContext.destination);
                osc3.frequency.value = 600;
                osc3.type = 'sine';
                gain3.gain.setValueAtTime(0.3, audioContext.currentTime);
                gain3.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 1);
                osc3.start();
                osc3.stop(audioContext.currentTime + 1);
            }, 1000);

        } catch (error) {
            console.log('Audio not supported');
        }
    }
}

// Initialize timer when page loads
document.addEventListener('DOMContentLoaded', () => {
    new FitFlowTimer();
});
