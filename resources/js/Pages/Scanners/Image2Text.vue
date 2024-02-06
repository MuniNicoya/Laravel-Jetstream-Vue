<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import UploadPDF from '@/Components/UploadPDF.vue';

defineProps({
  
});

</script>

<template>
  <AuthenticatedLayout>
    <div>
      <div class="mx-auto py-10 sm:px-6 lg:px-8 flex">
        <div class="w-1/2 pr-4">
          
          <!-- Display the PDF on the left -->
          <UploadPDF class=""></UploadPDF>
        </div>
        <div class="w-1/2 pl-1">
          <!-- Display the table on the right -->
          <!-- Replace this with your table component -->
     
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

