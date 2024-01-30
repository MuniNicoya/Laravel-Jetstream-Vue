<script setup>
import { useForm } from '@inertiajs/vue3';
import JetConfirmationModal from '@/Components/ConfirmationModal.vue';
import JetDangerButton from '@/Components/DangerButton.vue';
import JetSecondaryButton from '@/Components/SecondaryButton.vue';

const form = useForm({});

const props = defineProps({
  keyid: Number,
});

const emit = defineEmits(['close']);

const deleteKey = () => {
  form.delete(route('webauthn.destroy', props.keyid), {
    preserveScroll: true,
    preserveState: true,
    onSuccess: () => (emit('close')),
  });
};
</script>

<template>
    <JetConfirmationModal :show="keyid > 0" @close="$emit('close')">
        <template #title>
            Delete a new key
        </template>

        <template #content>
            Are you sure you would like to delete this key?
        </template>

        <template #footer>
            <JetSecondaryButton @click="$emit('close')">
                Cancel
            </JetSecondaryButton>

            <JetDangerButton class="ml-2" @click="deleteKey" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Delete
            </JetDangerButton>
        </template>
    </JetConfirmationModal>
</template>
