<script setup>
import { ref, watch, nextTick, computed, onMounted } from 'vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Button from '@/Components/PrimaryButton.vue';
import WaitForKey from '@/Pages/Profile/Webauthn/Partials/WaitForKey.vue';

const props = defineProps({
  errorMessage: String,
  name: String,
  form: Object,
});

const emit = defineEmits(['start', 'stop', 'register', 'update:name']);

const registering = ref(false);
const error = ref(props.errorMessage);
const nameInput = ref(null);

onMounted(() => {
  props.form.reset();
  nextTick().then(() => nameInput.value.focus());
});

watch(
  () => props.errorMessage,
  (value) => {
    error.value = value;
  },
);

const processing = computed(() => registering.value === true || props.form.processing);

const begin = () => {
  registering.value = true;
  error.value = '';

  nextTick().then(() => emit('start'));
  axios
    .post(route('webauthn.store.options'))
    .then((response) => {
      if (response.data !== undefined) {
        registerWaitForKey(response.data.publicKey);
      } else {
        nextTick().then(() => registerWaitForKey(response.props.publicKey));
      }
    })
    .catch((e) => {
      stop();
      error.value = e.response.data.errors[0];
    });
};

const registerWaitForKey = (publicKey) => {
  if (registering.value === true) {
    emit('register', publicKey);
  }
};

const stop = () => {
  registering.value = false;
  nextTick().then(() => emit('stop'));
};
</script>

<template>
  <form @submit.prevent="begin">
    <InputError :message="form.errors.register" class="mt-2" />

    <div class="mt-4" v-show="!processing || form.errors.name">
      <Label for="name" :value="'Key name'" />
      <Input
        type="text"
        class="mt-1 block w-3/4"
        id="name"
        ref="nameInput"
        :value="name"
        @input="$emit('update:name', $event.target.value)"
        required
        @keyup.enter="begin()" />

      <InputError :message="form.errors.name" class="mt-2" />
    </div>

    <div class="mt-4" v-show="registering">
      <WaitForKey :error-message="error" :form="form" @retry="begin()" />
    </div>

    <div class="mt-5 flex items-center">
      <SecondaryButton @click="stop()">
        Cancel
      </SecondaryButton>

      <Button class="ms-2" :class="{ 'opacity-25': processing }" :disabled="processing">
        Submit
      </Button>
    </div>
  </form>
</template>
