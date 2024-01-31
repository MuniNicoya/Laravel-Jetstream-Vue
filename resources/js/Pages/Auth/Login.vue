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
import WebauthnLogin from '@/Pages/Webauthn/WebauthnLogin.vue';


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
    })).post(route('auth.login'), {
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

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ status }}
        </div>
        <div v-if="useSecurityKey">
            <div class="mb-4 max-w-xl text-gray-600 dark:text-gray-400">
                Connect with your security key
            </div>

            <div v-if="userNameRef" class="mb-4 text-lg text-gray-900 dark:text-slate-100 text-center">
                {{ userNameRef }}
            </div>
            <form @submit.prevent="getKey">
                <div>
                    <InputLabel for="email" value="Email" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="mt-1 block w-full"
                        required
                        autofocus
                    />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <span>{{ errorMessage }}</span>
                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Log in
                    </PrimaryButton>
                </div>
            </form>

            <div v-if="publicKeyRef">
                <WebauthnLogin :remember="true" :public-key="publicKeyRef" />
            </div>

            <SecondaryButton class="mr-2 mt-4" @click.prevent="webauthn = false">
                Use your password
            </SecondaryButton>
        </div>


        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
            <div v-if="publicKeyRef">
                <WebauthnLogin :remember="true" :public-key="publicKeyRef" />
            </div>
            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <InputLabel class="flex items-center">
                    <Checkbox v-model:checked="form.remember" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                </InputLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    Forgot your password?
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
            <div class="block mt-4">
                <SecondaryButton class="mr-2" @click.prevent="reload">
                    Use your security key
                </SecondaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
