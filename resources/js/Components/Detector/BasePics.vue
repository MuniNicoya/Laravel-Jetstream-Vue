<template>
  <div class="ml-8 flex items-center flex-wrap">
    <div v-for="index in 4" :key="index" class="p-1 m-2 bg-gray-300">
      <!-- Add a @click event listener to handle image click -->
      <img @click="handleImageClick(index)" :ref="'img' + index" class="rounded w-20 h-20" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png" alt="Extra large avatar">
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    handleImageClick(imageId) {
      // Set a variable with the clicked image ID
      this.selectedImageId = imageId;

      // Trigger a callback, for example:
      this.imageClickCallback(imageId);
    },
    imageClickCallback(imageId) {
      // Your callback logic here, use imageId as needed
      console.log(`Image with ID ${imageId} clicked!`);
    },
  },
  data() {
    return {
      selectedImageId: null,
    };
  },
};
</script>
