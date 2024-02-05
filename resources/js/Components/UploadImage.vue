<template>
  <div>
    <input type="file" @change="handleFileChange" />
    <canvas ref="canvas" style="border: 1px solid #ddd;"></canvas>
  </div>
</template>

<script>
import Tesseract from 'tesseract.js';

export default {
  data() {
    return {
      imageSrc: null,
    };
  },
  methods: {
    handleFileChange(event) {
      const file = event.target.files[0];
      
      if (file) {
        this.loadImage(file);
      }
    },
    loadImage(file) {
      return new Promise((resolve) => {
        const reader = new FileReader();

        reader.onload = (e) => {
          this.imageSrc = e.target.result;
          this.drawImageToCanvas();
          resolve();
        };

        reader.readAsDataURL(file);
      });
    },
    drawImageToCanvas() {
      const canvas = this.$refs.canvas;
      const context = canvas.getContext('2d');

      const img = new Image();
      img.src = this.imageSrc;

      img.onload = () => {
        // Clear the canvas
        context.clearRect(0, 0, canvas.width, canvas.height);

        // Draw the image on the canvas
        context.drawImage(img, 0, 0, canvas.width, canvas.height);

        // Perform OCR after drawing the image
        this.performOCR(this.imageSrc);
      };
    },
    async performOCR(imageDataUrl) {
      try {
        const result = await Tesseract.recognize(imageDataUrl, 'spa');
        const lines = result.data.text.split('\n');

        console.log('OCR Result:');
        console.log(lines.join('\n'));
      } catch (error) {
        console.error('Error performing OCR:', error.message);
      }
    },
  },
};
</script>

<style scoped>
/* Add your component-specific styles here */
</style>
