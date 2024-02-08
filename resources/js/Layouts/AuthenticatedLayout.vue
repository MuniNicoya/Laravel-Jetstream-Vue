<script setup>
import { defineProps } from 'vue';
import { onMounted } from 'vue';
import { initFlowbite } from 'flowbite';
import { useI18n } from 'vue-i18n'; // Importa useI18n para acceder a las traducciones
import NavLayout from './NavLayout.vue';
import AsideLayout from'./AsideLayout.vue';
import ActionMessage from'@/Components/ActionMessage.vue';

// Inicializa Flowbite en el montaje del componente
onMounted(() => {
    initFlowbite();
});

// Define las props del componente
const props = defineProps({
    title: String,
    version: String,
    message: String
});

// Obtén la función de traducción t
const { t } = useI18n();

</script>

<template>
<div class="antialiased bg-gray-50 dark:bg-gray-900">

    <NavLayout/>
    <!-- Sidebar -->
    <AsideLayout/>

       <main class="p-4 md:ml-64 h-auto pt-20">
        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
          <span class="font-medium">{{$page.props.message}}</span> {{$props.message}}
        </div>
  
      <!-- Utiliza la función de traducción t para mostrar los textos localizados -->
      <slot />
    </main>
</div>
</template>
