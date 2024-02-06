<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    email: '',
    password: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <section class="h-screen flex items-center justify-center bg-no-repeat inset-0 bg-cover bg-[url('../images/bg.png')]">
        <div class="container 2xl:px-80 xl:px-52">
            <div class="bg-white rounded-lg p-5" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                <div class="grid xl:grid-cols-5 lg:grid-cols-3 gap-6">

                    <div class="xl:col-span-2 lg:col-span-1 hidden lg:block">
                        <div class="bg-sky-600 text-white rounded-lg flex flex-col justify-between gap-10 h-full w-full p-7">

                            <span class="font-semibold tracking-widest uppercase">TechAuth </span>

                            <div>
                                <h1 class="text-3xl/tight mb-4">We're here to help you level up.</h1>
                                <p class="text-gray-200 font-normal leading-relaxed">Use a long, easy-to-remember secret phrase like "yo queria mucho a mi perrita lulu..."</p>
                            </div>

                            <div>
                                <img src="path/to/your/image.jpg" alt="Eduardo's Image" class="h-36 rounded-lg">
                            </div>

                        </div>
                    </div>

                    <div class="xl:col-span-3 lg:col-span-2 lg:m-10">
                        <div>
                            <h1 class="text-2xl/tight mb-3">Sign Up</h1>
                            <p class="text-sm font-medium leading-relaxed">We are here to help you and we'd love to connect with you.</p>
                        </div>

                        <form @submit.prevent="submit">
                            <div class="space-y-5 mt-10">
                                <div>
                                    <InputLabel for="email" value="Email" />
                                    <TextInput
                                        id="email"
                                        v-model="form.email"
                                        type="email"
                                        class="text-gray-500 border-gray-300 focus:ring-0 focus:border-gray-400 text-sm rounded-lg py-2.5 px-4 w-full"
                                        required
                                        placeholder="Enter Your Email"
                                        autocomplete="username"
                                    />
                                    <InputError class="mt-2" :message="form.errors.email" />
                                </div>

                                <div>
                                    <InputLabel for="password" value="Password" />
                                    <TextInput
                                        id="password"
                                        v-model="form.password"
                                        type="password"
                                        class="text-gray-500 border-gray-300 focus:ring-0 focus:border-gray-400 text-sm rounded-lg py-2.5 px-4 w-full"
                                        required
                                        placeholder="Enter Your Password"
                                        autocomplete="new-password"
                                    />
                                    <InputError class="mt-2" :message="form.errors.password" />
                                </div>
                            </div>

                            <div class="flex flex-wrap items-center justify-between gap-6 mt-8">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Sign Up
                                </PrimaryButton>
                                <p class="text-sm font-medium text-gray-500">Already have an account? <Link :href="route('login')" class="ms-2 underline text-sky-600">Sign In</Link></p>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>
</template>
