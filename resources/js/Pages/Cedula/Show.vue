<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import WebcamCapture from '@/Components/Detector/WebcamCapture.vue';
import Card from './Card.vue';
import BasePics from '@/Components/Detector/BasePics.vue';
import UploadImage from '@/Components/UploadImage.vue';
defineProps({
  verification: Object, // Add a prop for the requirement
});

</script>

<template>
  <AuthenticatedLayout :title="verification.title">
    <div>
      <div class="mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Frente de la Cédula
        </h2>
        <p>{{ verification.instructions }}</p>
         <UploadImage class=""></UploadImage>

        <SectionBorder />
        
        <div>
          <!-- Pass the requirement prop to the WebcamCapture component -->
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Reverso de la Cédula
        </h2>
        <p>{{ verification.instructions }}</p>
        <UploadImage class=""></UploadImage>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
