<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12 min-h-screen">
            <div class="container">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-[4rem]">
                    <div class="p-6 text-2xl text-gray-900">You're logged in!</div>
                    <div class="flex justify-center">
                        <Link class="py-6 px-9 text-3xl bg-slate-900 text-slate-100 rounded-sm" :href="route('form')">GO TO FORM</Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
