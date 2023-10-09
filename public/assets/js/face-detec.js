const video = document.getElementById("video");

const cardContainer = document.createElement("div");
cardContainer.id = "card-container";
document.getElementById("vieww").appendChild(cardContainer);

Promise.all([
    faceapi.nets.ssdMobilenetv1.loadFromUri("/models"),
    faceapi.nets.faceRecognitionNet.loadFromUri("/models"),
    faceapi.nets.faceLandmark68Net.loadFromUri("/models"),
]).then(startWebcam);

function startWebcam() {
    navigator.mediaDevices
        .getUserMedia({
            video: true,
            audio: false,
        })
        .then((stream) => {
            video.srcObject = stream;
        })
        .catch((error) => {
            console.error(error);
        });
}

async function getLabeledFaceDescriptions() {
    try {
        const response = await fetch('http://localhost:8000/api/data-pengunjung');
        const data = await response.json();

        //mengambil data label dari database
        const getLabel = data.data.map(data => data);

        const labels = getLabel;
        return Promise.all(
            labels.map(async (label) => {
                const descriptions = [];
                for (let i = 1; i <= 2; i++) {
                    const img = await faceapi.fetchImage(`./assets/labels/${label.uuid}/${i}.png`);
                    const detections = await faceapi
                        .detectSingleFace(img)
                        .withFaceLandmarks()
                        .withFaceDescriptor();
                    descriptions.push(detections.descriptor);
                }


                return new faceapi.LabeledFaceDescriptors(label.nama, descriptions);
            })
        );
    } catch (error) {
        console.error('Error:', error);
        return [];
    }
}

video.addEventListener("play", async () => {
    const labeledFaceDescriptors = await getLabeledFaceDescriptions();
    const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors);

    const canvas = faceapi.createCanvasFromMedia(video);
    document.body.append(canvas);

    const displaySize = { width: video.width, height: video.height };
    faceapi.matchDimensions(canvas, displaySize);

    setInterval(async () => {
        const detections = await faceapi
            .detectAllFaces(video)
            .withFaceLandmarks()
            .withFaceDescriptors();

        const resizedDetections = faceapi.resizeResults(detections, displaySize);

        canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);

        const results = resizedDetections.map((d) => {
            return faceMatcher.findBestMatch(d.descriptor);
        });
        results.forEach((result, i) => {
            const box = resizedDetections[i].detection.box;
            const drawBox = new faceapi.draw.DrawBox(box, {
                label: result.toString(),
            });
            drawBox.draw(canvas);

            // Display visitor data in a card
            if (labeledFaceDescriptors[result.label - 1]) {
                const visitorData = labeledFaceDescriptors[result.label - 1];
                displayVisitorCard(visitorData);
            }
        });
    }, 100);
});



function displayVisitorCard(visitorData) {
    const card = document.createElement("div");
    card.className = "visitor-card";

    const name = document.createElement("p");
    name.textContent = `Name: ${visitorData.nama}`;
    card.appendChild(name);
}
