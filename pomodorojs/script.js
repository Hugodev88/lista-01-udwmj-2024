let trabalho = 25 * 60;
let descanso = 5 * 60;
let trabalhando = true;
let intervalo = null;
let tempoRestante = trabalho;

function formatarTempo(segundos) {
    const minutos = Math.floor(segundos / 60);
    const segs = segundos % 60;
    return `${minutos.toString().padStart(2, '0')}:${segs.toString().padStart(2, '0')}`;
}

function iniciarPomodoro() {
    intervalo = setInterval(() => {
        tempoRestante--;

        document.getElementById('temporizador').textContent = formatarTempo(tempoRestante);

        if (tempoRestante <= 0) {
            if (trabalhando) {
                alert('Tempo de trabalhar acabou! Descansar.');
                tempoRestante = descanso;
            } else {
                alert('Tempo de descansar acabou! Trabalhar.');
                tempoRestante = trabalho;
            }

            trabalhando = !trabalhando;
        }
    }, 1000); 
}

function pausarPomodoro() {
    clearInterval(intervalo);
    intervalo = null;
}

document.getElementById('iniciar').addEventListener('click', () => {
    if (!intervalo) {
        iniciarPomodoro();
    }
});

document.getElementById('pausar').addEventListener('click', () => {
    pausarPomodoro();
});

document.getElementById('resetar').addEventListener('click', () => {
    clearInterval(intervalo);
    intervalo = null;
    tempoRestante = trabalho;
    trabalhando = true;
    document.getElementById('temporizador').textContent = formatarTempo(tempoRestante);
});
