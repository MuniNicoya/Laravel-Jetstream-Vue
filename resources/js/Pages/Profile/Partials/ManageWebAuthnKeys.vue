<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import ActionSection from '@/Components/ActionSection.vue';
import DialogModal from '@/Components/DialogModal.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import WebauthnKeys from '@/Components/Webauthn/WebauthnKeys.vue';


defineProps({
    sessions: Array,
    webauthnKeys: Array,
});

const confirmingLogout = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmLogout = () => {
    confirmingLogout.value = true;

    setTimeout(() => passwordInput.value.focus(), 250);
};

const logoutOtherBrowserSessions = () => {
    form.delete(route('other-browser-sessions.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingLogout.value = false;

    form.reset();
};
</script>

<template>
    <ActionSection>
        <template #title>
            Touch & Face-Id
        </template>

        <template #description>
            Registre Acceso sin Contraseña
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                WebAuthn, o Autenticación Web, es un estándar de seguridad que permite a los usuarios autenticarse en servicios en línea de forma más segura y sin contraseñas tradicionales. Utiliza dispositivos autenticadores como llaves de seguridad o huellas dactilares para verificar la identidad del usuario
            </div>
            <WebauthnKeys :webauthnKeys="webauthnKeys" />


        </template>
    </ActionSection>
</template>
