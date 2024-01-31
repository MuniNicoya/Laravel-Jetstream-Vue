<script setup>
import { ref } from 'vue';
import NavLayout from './NavLayout.vue';
import AsideLayout from'./AsideLayout.vue';

import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'


onMounted(() => {
    initFlowbite();
})
</script>

<template>

<div class="antialiased bg-gray-50 dark:bg-gray-900">

    <NavLayout/>
    <!-- Sidebar -->
    <AsideLayout/>

    <main class="p-4 md:ml-64 h-auto pt-20">

      <slot />
    </main>
  </div>

</template>
