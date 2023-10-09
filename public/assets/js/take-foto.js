const uji1 = document.getElementById('uji1');
const uji2 = document.getElementById('uji2');

startWebcam();

function startWebcam() {
    navigator.mediaDevices
        .getUserMedia({
            video: true,
            audio: false,
        })
        .then((stream) => {
            uji1.srcObject = stream;
        })
        .catch((error) => {
            console.error(error);
        });
}

async function capturePhoto() {
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');
    const previewImg = document.getElementById('preview');

    // Mengakses kamera pengguna
    const stream = await navigator.mediaDevices.getUserMedia({
        video: true
    });
    uji1.srcObject = stream;

    // Menunggu sebentar agar kamera dapat menyala
    await new Promise(resolve => setTimeout(resolve, 2000));

    // Mengambil gambar dari video dan menampilkan di canvas
    context.drawImage(uji1, 0, 0, canvas.width, canvas.height);

    // Menghentikan kamera
    const tracks = stream.getTracks();
    tracks.forEach(track => track.stop());

    // Mengambil data URL dari canvas (gambar)
    const photoUrl = canvas.toDataURL('image/png');

    // Menampilkan pratinjau foto
    previewImg.src = photoUrl;
    previewImg.style.display = 'inline-block';

    // Menyimpan data URL ke input tersembunyi
    document.getElementById('photoUji1').value = photoUrl;

    // Mematikan video untuk menunjukkan pratinjau foto
    // uji1.srcObject = null;

    startUji2();

    function startUji2() {
        navigator.mediaDevices
            .getUserMedia({
                video: true,
                audio: false,
            })
            .then((stream) => {
                uji2.srcObject = stream;
            })
            .catch((error) => {
                console.error(error);
            });
    }
}

async function capturePhotoKonfirmasi() {
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');
    const previewImg = document.getElementById('previewKonfirmasi');

    // Mengakses kamera pengguna
    const stream = await navigator.mediaDevices.getUserMedia({
        video: true
    });
    uji2.srcObject = stream;

    // Menunggu sebentar agar kamera dapat menyala
    await new Promise(resolve => setTimeout(resolve, 2000));

    // Mengambil gambar dari video dan menampilkan di canvas
    context.drawImage(uji2, 0, 0, canvas.width, canvas.height);

    // Menghentikan kamera
    const tracks = stream.getTracks();
    tracks.forEach(track => track.stop());

    // Mengambil data URL dari canvas (gambar)
    const photoUrl = canvas.toDataURL('image/png');

    // Menampilkan pratinjau foto
    previewImg.src = photoUrl;
    previewImg.style.display = 'inline-block';

    // Menyimpan data URL ke input tersembunyi
    document.getElementById('photoUji2').value = photoUrl;

    // Mematikan video untuk menunjukkan pratinjau foto
    // uji2.srcObject = null;


}
