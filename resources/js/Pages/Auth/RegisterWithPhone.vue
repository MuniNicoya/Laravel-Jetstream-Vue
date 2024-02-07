<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n'; // Importa useI18n para acceder a las traducciones

import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import WebauthnLogin from '@/Components/Webauthn/WebauthnLogin.vue';

// Destructura la función de traducción t
const { t } = useI18n();

const form = useForm({
    email: '',
    name: '',
    password: '', // Cambiado el nombre del campo a 'password'
});

const submit = () => {
    console.log('registered');
    form.post(route('register'), {
       
        onFinish: () => form.reset('password'), // Cambiado el nombre del campo a 'password'
    });
};
</script>

<template>
    <section class="h-screen flex items-center justify-center bg-no-repeat inset-0 bg-cover bg-[url('../imgs/bg-large.mov')]">
        <div class="container 2xl:px-80 xl:px-52">
            <div class="bg-white rounded-lg p-5" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                <div class="grid xl:grid-cols-5 lg:grid-cols-3 gap-6">
                    <!-- Col1-->
                    <div class="xl:col-span-2 lg:col-span-1 hidden lg:block">
                        <div class="bg-sky-600 text-white rounded-lg flex flex-col justify-between gap-10 h-full w-full p-7">

                            <span class="font-semibold tracking-widest uppercase">Attestto </span>

                            <div>
                                <!-- Utiliza la función de traducción t para acceder a los mensajes -->
                                <h1 class="text-3xl/tight mb-4">{{ t('common.welcome') }}</h1>
                                <p class="text-gray-200 font-normal leading-relaxed">{{ t('authentication.register.secret_phrase_message') }}</p>
                            </div>

                            <div>
                                <!-- Utiliza la función de traducción t para acceder a los mensajes -->
                                <img src="/imgs/passphrase.png" alt="Secure Secret Phrase" class=" rounded-lg">
                            </div>

                        </div>
                    </div>
                    <!-- Col2-->
                    <div class="xl:col-span-3 lg:col-span-2 lg:m-10">
                        <div>
                            <!-- Utiliza la función de traducción t para acceder a las constantes -->
                            <h1 class="text-2xl/tight mb-3">{{ t('authentication.register.sign_up') }}</h1>
                            <p class="text-sm font-medium leading-relaxed">{{ t('authentication.register.intro') }}</p>
                        </div>

                        <form @submit.prevent="submit">
                        
                            <div class="space-y-5 mt-10">
                              <!-- name-->
                              <div>
                                  <InputLabel for="name" value="Nombre" />
                                  <TextInput
                                      id="name"
                                      v-model="form.name"
                                      type="text"
                                      class="mt-1 block w-full"
                                      required
                                      autofocus
                                      autocomplete="name"
                                  />
                                  <InputError class="mt-2" :message="form.errors.name" />
                              </div>
                              
                              <div>
                                    <!-- Utiliza la función de traducción t para acceder a los mensajes -->
                                    <InputLabel :value="t('common.email')" />
                                    <TextInput
                                        id="email"
                                        v-model="form.email"
                                        type="email"
                                        class="text-gray-500 border-gray-300 focus:ring-0 focus:border-gray-400 text-sm rounded-lg py-2.5 px-4 w-full"
                                        required
                                        :placeholder="t('common.enter_email')"
                                        autocomplete="username"
                                    />
                                    <InputError class="mt-2" :message="form.errors.email" />
                              </div>

                                <div>
                                    <!-- Utiliza la función de traducción t para acceder a los mensajes -->
                                    <InputLabel :value="t('common.password')" />
                                    <TextInput
                                        id="password"
                                        v-model="form.password"
                                        type="text"
                                        class="text-gray-500 border-gray-300 focus:ring-0 focus:border-gray-400 text-sm rounded-lg py-2.5 px-4 w-full"
                                        required
                                        :placeholder="t('common.enter_password')"
                                      
                                    />
                                    <InputError class="mt-2" :message="form.errors.password" />
                                </div>
                            </div>

                            <div class="flex flex-wrap items-center justify-between gap-6 mt-8">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    <!-- Utiliza la función de traducción t para acceder a los mensajes -->
                                    {{ t('authentication.register.sign_up') }}
                                </PrimaryButton>
                                <p class="text-sm font-medium text-gray-500">
                                    <!-- Utiliza la función de traducción t para acceder a los mensajes -->
                                    {{ t('authentication.register.have_account_message') }}
                                    <Link :href="route('login')" class="ms-2 underline text-sky-600">{{ t('authentication.sign_in') }}</Link>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
