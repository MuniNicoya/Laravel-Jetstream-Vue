<script setup>
import { ref, onMounted } from 'vue';
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { startRegistration } from '@simplewebauthn/browser';

const webAuthnPublicKey = ref(null);
const showAddKey = ref(false);
const newKeyName = ref('');
const showInstructions = ref(true);

const errorMessages = {
  InvalidStateError: 'Error message for InvalidStateError',
  notSupported: 'Error message for notSupported',
  notSecured: 'Error message for notSecured',
};

const form = reactive({
  method: 'PUT',
  name: null,
  webAuthnPublicKey: null,
  email: null,

})
const resp = router.get('/generate-registration-options', form);
async function submit() {
    // GET registration options from the endpoint that calls
    // @simplewebauthn/server -> generateRegistrationOptions()
    const resp = router.get('/generate-registration-options', form);

  console.log(resp);
}


</script>

<template>
    <FormSection @submitted="submit">
        <template #title>
            Firma Biométrica
        </template>

        <template #description>
            Configura y Actualiza tus Dispositivos y Llaves
        </template>

        <template #form>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="name"
                />
                <InputError :message="form.name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="username"
                />
                <InputError :message="form.email" class="mt-2" />


            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
