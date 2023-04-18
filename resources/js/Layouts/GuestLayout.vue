<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 w-full mx-auto">
        <div class="ml-auto mr-8">
            <Link href="/" class="text-4xl">
                BACK HOME
            </Link>
        </div>

        <div
            class="flex min-h-screen mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg w-full items-center justify-center"
        >
            <slot />
        </div>
    </div>
</template>
