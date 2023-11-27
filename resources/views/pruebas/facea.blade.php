<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Identificación Facial</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column
        }

        canvas {
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
</head>

<body>

    <input type="file" id="imageUpload">
</body>
@livewireStyles

@livewireScripts

<script src="{{ asset('js/face-api.min.js') }}"></script>

<script>
    //obtengo la imagen subida
    const imageUpload = document.getElementById('imageUpload')

    //cargo los modelos de FACEAPI cuanndo la funcion start comience
    Promise.all([
        faceapi.nets.faceRecognitionNet.loadFromUri('/models'),
        faceapi.nets.faceLandmark68Net.loadFromUri('/models'),
        faceapi.nets.ssdMobilenetv1.loadFromUri('/models')
    ]).then(start)


    async function start() {
        //crea un div
        const container = document.createElement('div')
        container.style.position = 'relative'
        //coloca el div en el html
        document.body.append(container)

        //obtengo los nombres de las caras de las imagenes del servidor
        const labeledFaceDescriptors = await loadLabeledImages()
        //console.log(labeledFaceDescriptors)

        //que tenga una presicion arriba de 60%
        const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6)
        //console.log(faceMatcher)

        let image
        let canvas
        document.body.append('Loaded')
        //si cambia el estado del input file
        imageUpload.addEventListener('change', async () => {
            if (image) image.remove()
            if (canvas) canvas.remove()
            //obtengo la imagen subida en el input
            image = await faceapi.bufferToImage(imageUpload.files[0])
            console.log(image)

            container.append(image)
            canvas = faceapi.createCanvasFromMedia(image)
            container.append(canvas)
            const displaySize = {
                width: image.width,
                height: image.height
            }
            faceapi.matchDimensions(canvas, displaySize)

            //detecta todas las caras de la imagagen del input
            const detections = await faceapi.detectAllFaces(image).withFaceLandmarks()
                .withFaceDescriptors()
            console.log(detections)
            //
            const resizedDetections = faceapi.resizeResults(detections, displaySize)
            console.log(resizedDetections)

            //las coincidencias
            const results = resizedDetections.map(d => faceMatcher.findBestMatch(d.descriptor))
            console.log(results)


            results.forEach((result, i) => {
                const box = resizedDetections[i].detection.box
                const drawBox = new faceapi.draw.DrawBox(box, {
                    label: result.toString()
                })
                drawBox.draw(canvas)
            })
        })
    }

    //escanea la cara de las imagenes almacenadas en la aplicacion y le pone el nombre
    //de la carpeta en la que estan almacenadas
    //retorna la informacion que las caras guardadas en el servidor

 

    //escanea la cara de las imagenes almacenadas en la aplicacion y le pone el nombre
    //de la carpeta en la que estan almacenadas
    //retorna la informacion que las caras guardadas en el servidor

    // function loadLabeledImages() {
    //   //nombre de las carpetas(usuarios)
    //   const labels = ['fabiola', 'leonel', 'teo']
    //   return Promise.all(
    //     labels.map(async label => {
    //       const descriptions = []
    //       for (let i = 1; i <= 2; i++) {
    //       //console.log(label)
    //         const img = await faceapi.fetchImage(`storage/faceapi/${label}/${i}.jpg`)
    //         const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
    //         descriptions.push(detections.descriptor)
    //         console.log(label, descriptions)
    //       }

    //       return new faceapi.LabeledFaceDescriptors(label, descriptions)
    //     })
    //   )
    // }
</script>




</html>
