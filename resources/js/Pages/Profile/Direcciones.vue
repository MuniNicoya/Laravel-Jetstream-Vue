<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import UpdateAddressForm from '@/Pages/Profile/Partials/UpdateAddressForm.vue';

defineProps({
 

});
</script>

<template>
    <AuthenticatedLayout title="Profile">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Direcciones
        </h2>
        <div v-if="$page.props.jetstream.canUpdatePassword">
            <UpdateAddressForm class="mt-10 sm:mt-0" />

            <SectionBorder />
        </div>


        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <!-- <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <UpdateProfileInformationForm :user="$page.props.auth.user" />

                    <SectionBorder />
                </div> -->
                <div >
                    <SectionBorder />
                </div>
               

            </div>
        </div>
    </AuthenticatedLayout>
</template>
