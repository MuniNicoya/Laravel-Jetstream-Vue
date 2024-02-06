<template>
  <div class="">
 
    <input type="file" @change="loadPdf" accept=".pdf">
    <iframe :src="pdfUrl" width="100%" height="600px" v-if="pdfUrl"></iframe>

  </div>
</template>

<script>
import { getDocument } from '../../../node_modules/pdfjs-dist/build/pdf.min.mjs';
pdfjsLib.GlobalWorkerOptions.workerSrc = '../../../node_modules/pdfjs-dist/build/pdf.worker.min.mjs';


export default {
  data() {
    return {
      pdfUrl: null,
    };
  },
  methods: {
    async loadPdf(event) {
      const file = event.target.files[0];

      if (file && file.type === 'application/pdf') {
        const reader = new FileReader();

        reader.onload = (e) => {
          this.pdfUrl = e.target.result;
        };

        reader.readAsDataURL(file);
    
      } else {
        // Handle invalid file type
        console.error('Invalid file type. Please select a PDF.');
      }
    },
    async logPdfContent() {
      try {
        if (!this.pdfUrl) {
          console.error('No PDF loaded.');
          return;
        }

        const loadingTask = getDocument(this.pdfUrl);
        const pdf = await loadingTask.promise;
        const numPages = pdf.numPages;
        console.log(numPages);
        for (let pageNumber = 1; pageNumber <= numPages; pageNumber++) {
          const page = await pdf.getPage(pageNumber);
          const textContent = await page.getTextContent();
          const text = textContent.items.map(item => item.str).join('\n');
          console.log(`Page ${pageNumber} Content:\n${text}`);
        }
      } catch (error) {
        console.error('Error loading or parsing PDF:', error);
      }
    },
  },
};
</script>
