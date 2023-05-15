<script setup>
import AuthenticatedLayout from '@/Pages/Admin/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="RegisterForm" />

    <AuthenticatedLayout>
        <div class="py-12 min-h-screen">
            <div class="container">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-[4rem]">
                    <div class="p-6 text-2xl text-gray-900">RegisterForm</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
