<script setup>
import { ref, watch, onMounted, computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import WebauthnLogin from '@/Components/Webauthn/WebauthnLogin.vue';


const props = defineProps({
  canResetPassword: Boolean,
  status: String,
  publicKey: Object,
  userName: String,
});

const webauthn = ref(false);
const publicKeyRef = ref(null);
const errorMessage = ref(null);
const userNameRef = ref(props.userName);

const form = useForm({
  email: '',
  password: '',
  remember: false,
});
watch(() => props.publicKey, (value) => {
  publicKeyRef.value = value;
});

onMounted(() => {
  publicKeyRef.value = props.publicKey;
});

const useSecurityKey = computed(() => publicKeyRef.value !== null && webauthn.value === true);

const getKey = () => {
  errorMessage.value = null;
  axios
    .post(route('webauthn.auth.options'), {
      email: form.email,
    })
    .then((response) => {
      userNameRef.value = null;
      if (response.data !== undefined) {
        publicKeyRef.value = response.data.publicKey;
      } else {
        publicKeyRef.value = response.props.publicKey;
      }
    })
    .catch((e) => {
      errorMessage.value = e.response.data.message;
    });
};

const submit = () => {
  form.transform(data => ({
    ...data,
    remember: form.remember ? 'on' : '',
  })).post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};

const reload = () => {
  form.reset();
  webauthn.value = true;
};

</script>

<template>
  <Head title="Log in" />

  <AuthenticationCard>
    <template #logo>
      <AuthenticationCardLogo />
    </template>

    <div class="block mt-4">
      
    </div>
  </AuthenticationCard>

  <section class="h-screen flex items-center justify-center bg-no-repeat inset-0 bg-cover bg-[url('../images/bg.png')]">
    <div class="container 2xl:px-80 xl:px-52">
      <div class="bg-white rounded-lg p-5" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
        <div class="grid xl:grid-cols-5 lg:grid-cols-3 gap-6">

          <div class="xl:col-span-2 lg:col-span-1 hidden lg:block">
            <div class="bg-sky-600 text-white rounded-lg flex flex-col justify-between gap-10 h-full w-full p-7">

              <span class="font-semibold tracking-widest uppercase">Republic </span>

              <div>
                <h1 class="text-3xl/tight mb-4">Frase Motivadora</h1>
                <p class="text-gray-200 font-normal leading-relaxed">It is a long established fact that a reader will be
                  distracted by the readable content of a page when looking at its layout.</p>
              </div>

              <div>
                <div class="bg-sky-700/50 rounded-lg p-5">
                  <p class="text-gray-200 text-sm font-normal leading mb-4">There are many variations of passages of Lorem
                    Ipsum available, but the majority in some form</p>
                  <div class="flex items-center gap-4">
                    <img src="assets/images/user.png" alt="" class="h-12 rounded-lg">
                    <div>
                      <p class="font-normal">Eduardo C.</p>
                      <span class="text-xs font-normal">Freelancer</span>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="xl:col-span-3 lg:col-span-2 lg:mx-10 my-auto">
            <div>
              <h1 class="text-2xl/tight mb-3">Hola de Nuevo!</h1>
              <p class="text-sm font-medium leading-relaxed">We are here to help you and we'd love to connect with you.
              </p>
            </div>

            <div class="space-y-5 mt-10">
              <!-- <div v-if=" publicKeyRef "> -->
                <form @submit.prevent=" getKey ">
                  <WebauthnLogin :remember=" true " :public-key=" publicKeyRef " />
                </form>
              <!-- </div> -->
              <!-- <div v-else> -->
                  <!-- Regular Form -->
                  <form @submit.prevent=" submit ">
                    <div>
                      <InputLabel for="email" value="Email" />
                      <TextInput id="email" v-model=" form.email " type="email" class="mt-1 block w-full" required autofocus
                        autocomplete="email" />
                      <InputError class="mt-2" :message=" form.errors.email " />
                    </div>

                    <div class="mt-4">
                      <InputLabel for="password" value="Password" />
                      <TextInput id="password" v-model=" form.password " type="password" class="mt-1 block w-full" required
                        autocomplete="current-password" />
                      <InputError class="mt-2" :message=" form.errors.password " />
                    </div>

                    <div class="block mt-4">
                      <InputLabel class="flex items-center">
                        <Checkbox v-model:checked=" form.remember " name="remember" />
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                      </InputLabel>

                    </div>

                    <div class="flex items-center justify-end mt-4">


                      <PrimaryButton class="ms-4" :class=" { 'opacity-25': form.processing } " :disabled=" form.processing ">
                        Log in
                      </PrimaryButton>

                    </div>

                  </form>
              <!-- </div> -->
            </div>
            <div class="flex flex-wrap items-center justify-between gap-6 mt-8">
              <p class="text-sm text-gray-500">No tienes una cuenta?
                <Link href="/register" class="ms-2 underline text-sky-600">Registrate!</Link>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
