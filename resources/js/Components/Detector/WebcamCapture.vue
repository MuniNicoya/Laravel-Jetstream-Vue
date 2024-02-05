<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import Tesseract from 'tesseract.js';
//import * as faceapi from 'face-api.js';
import BasePics from './BasePics.vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const videoCam = ref(null);
const mediaStream = ref(null);
const canvas = ref(null);
const webcamStarted = ref(false);
const selectedImage = ref(null); // Image selected by the user

const props = defineProps(['verification']);

const form = useForm({
    _method: 'PUT',
    // name: props.user.name,
    // email: props.user.email,
    // photo: null,
});
//console.log(faceapi.nets);
// Once all models load 
console.log(props.verification.fields);
const selectImageClick = (image) => {
   selectedImage.value = image;
};




const initWebcam = async () => {
 

  try {
    // Request access to the webcam
    mediaStream.value = await navigator.mediaDevices.getUserMedia({ 
      video: true, 
      video: { 
                            width: { ideal: 1920 }, 
                      height: { ideal: 1080 } 
      }
    });
    console.log('Media Stream:', mediaStream.value);
    // Assign the stream to the video element
    videoCam.value.srcObject = mediaStream.value;
    console.log('WEbcam I nit');
        // Update the webcamStarted flag
        webcamStarted.value = true;
        // const detections = await faceapi.detectSingleFace(videoCam.value).withFaceLandmarks();
        // console.log(detections);
  } catch (error) {
    console.error('Error accessing webcam:', error);
  }
};

const captureFrame = (destination) => {
  console.log('Capture button clicked!');

  if (mediaStream.value) {
    // Create a canvas element to capture the video frame
    //const canvas = document.createElement('canvas');
    const context = canvas.value.getContext('2d');

    // Set the canvas dimensions to match the video dimensions
    canvas.value.width = videoCam.value.videoWidth;
    canvas.value.height = videoCam.value.videoHeight;

    // Draw the current video frame onto the canvas
    context.drawImage(videoCam.value, 0, 0, canvas.value.width, canvas.value.height);

    // Convert the canvas content to a data URL (base64 encoded image)
    const capturedImage = canvas.value.toDataURL('image/png');

   // capturedImage.src = imageDataUrl;

    performOCR(capturedImage);
    // Do something with the captured image (e.g., display it or send it to the server)
    console.log('Captured Image:', capturedImage);
    stopWebcam();
    
  }
};

const stopWebcam = () => {
  // Stop the webcam stream
  if (mediaStream.value) {
    mediaStream.value.getTracks().forEach(track => track.stop());
  }

  // Reset the video element source and the webcamStarted flag
  videoCam.value.srcObject = null;
  webcamStarted.value = false;
};

const startWebcam = () => {
  // Start the webcam if it's not already started
  if (!webcamStarted.value) {
    initWebcam();
  }
};

const performOCR = async (imageDataUrl) => {
  try {
    const result = await Tesseract.recognize(imageDataUrl, 'spa');
    const lines = result.data.text.split('\n');

    console.log('OCR Result:');
    console.log(lines.join('\n'));
  } catch (error) {
    console.error('Error performing OCR:', error.message);
  }
};

// const faceRecognition = async () => {
//   setInterval(async () => {
//     const detections = await faceapi
//       .detectAllFaces(video)
//       .withFaceLandmarks()
//       .withFaceDescriptors();

    
//   }, 100);
// };

onMounted(() => {
  // Promise.all([
  //   faceapi.nets.ssdMobilenetv1.loadFromUri("/models"),
  //   faceapi.nets.faceRecognitionNet.loadFromUri("/models"),
  //   faceapi.nets.faceLandmark68Net.loadFromUri("/models"),
  // ]).then(initWebcam).then();
 

});

onBeforeUnmount(() => {
  // Stop the webcam stream when the component is about to be unmounted
  if (mediaStream.value) {
    mediaStream.value.getTracks().forEach(track => track.stop());
  }
 
});
</script>

<template>
    <FormSection @submitted="respondVerification">
        <template #title>
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ verification.title }}
          </h2>
          <p>{{ verification.instructions }}</p>
        </template>
     
        <template #description>
          <div class="relative col-span-6" style="width: 100%; aspect-ratio: 4/3;">
        <video ref="videoCam" class="flip-horizontal absolute top-0 left-0 w-full h-full border" width="100%" height="100%" autoplay></video>
        <canvas ref="canvas" class="flip-horizontal absolute top-0 left-0 w-full h-full border" width="100%" height="100%"></canvas>
        <!-- Scanner line -->
        <div ref="" class="scanner-line" style="z-index: 2;"></div>
      </div>  
          <div class="flex flex-row items-center mt-4 ml-0">
            <div class="mt-4">
                <button @click="startWebcam" :disabled="webcamStarted" class="px-4 py-2 bg-green-500 text-white rounded">Activar Cámara</button>
                <button @click="stopWebcam" :disabled="!webcamStarted" class="ml-2 px-4 py-2 bg-red-500 text-white rounded">Desactivar</button>
              </div>
              <button @click="captureFrame" class="ml-2 mt-4 px-4 py-2 bg-blue-500 text-white rounded">Capturar</button>
          </div>
        </template>

 

        <template #form>
            <!-- Profile Photo -->
            <div  class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input
                    id="photo"
                    ref="photoInput"
                    type="file"
                    class="hidden"
                    
                >

                <InputLabel for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div class="mt-2">
                    <img src="" :alt="form.name" class="rounded-full h-20 w-20 object-cover">
                </div>

                <InputError :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Nombre" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    disabled
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="cedula" value="Cédula" />
                <TextInput
                    id="cedula"
                    v-model="form.email"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    disabled
                />
                <InputError :message="form.errors.cedula" class="mt-2" />

        
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Enviado.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Responder Verificación
            </PrimaryButton>
        </template>
    </FormSection>  
</template>




<style scoped>
.scanner-line {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 8px;
  background-color: green;
  animation: scanAnimation 4s linear infinite;
  z-index: 2;
}

@keyframes scanAnimation {
  0% {
    top: 0;
  }
  100% {
    top: 100%;
  }
}

</style>