<!-- NavBarItem Component -->
<script setup>

  import NavLink from './NavLink.vue';
  import Icon from './Icon.vue';
  const { href, active } = defineProps(['href', 'active']);
</script>

<template>
    <li class="me-2">
      <NavLink :href="href" :active="active">
        <Icon icon="profile" :isActive="active" />
        <slot />
      </NavLink>
    </li>
</template>


