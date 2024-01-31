<script setup>
import { ref, watch, nextTick } from 'vue';
import { useForm } from '@inertiajs/vue3';
import Label from '@/Components/InputLabel.vue';
import Input from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import Button from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

const form = useForm({
  name: '',
});

const props = defineProps({
  keyid: Number,
  nameUpdate: String,
});

const emit = defineEmits(['close']);

const nameInput = ref(null);

const updateKey = () => {
  form.put(route('webauthn.update', props.keyid), {
    preserveScroll: true,
    preserveState: true,
    onSuccess: () => {
      form.reset();
      nextTick().then(() => emit('close'));
    },
  });
};

watch(
  () => props.nameUpdate,
  (value) => {
    form.name = value;
    nextTick().then(() => nameInput.value.focus());
  },
  {
    immediate: true,
  },
);
</script>

<template>
  <form @submit.prevent="updateKey">
    <div class="mt-4">
      <Label for="keyname" :value="'Key name'" />
      <Input
        type="text"
        class="mt-1 block"
        id="keyname"
        ref="nameInput"
        v-model="form.name"
        required
        @keyup.enter="updateKey" />

      <InputError :message="form.errors.name" class="mt-2" />
    </div>

    <div class="mt-5">
      <SecondaryButton @click="$emit('close')">
        Cancel
      </SecondaryButton>

      <Button class="ms-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
        Update
      </Button>
    </div>
  </form>
</template>
