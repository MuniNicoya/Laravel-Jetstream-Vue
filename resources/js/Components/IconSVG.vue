<!-- Icon Component -->
<template>
    <svg class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 dark:group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <!-- Icon paths here -->
    </svg>
  </template>

  <script setup>
  import { defineProps } from 'vue';
  const { isActive } = defineProps(['isActive']);
  </script>
