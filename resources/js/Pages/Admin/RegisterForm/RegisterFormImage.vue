<script setup>
import AuthenticatedLayout from '@/Pages/Admin/Layouts/AuthenticatedLayout.vue';
import { Head} from '@inertiajs/vue3';

const props = defineProps({
    datas : Object,
})
</script>

<template>
    <Head title="datas" />

    <AuthenticatedLayout>
        <div class="container mt-[10rem] px-[1.5rem]">
            <h1 class="text-5xl font-bold text-gray-900">本登録用のフォーム（お申し込み用）</h1>
            <div class="w-full px-[4rem] py-[4rem] border border-slate-500 rounded-sm sm:px-[1rem]">
                <h2 class="text-4xl my-20 text-center text-green-300 font-bold">個人情報の写真添付</h2>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">必要書類の添付</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <div class="flex flex-wrap gap-y-[1.5rem] mb-[2rem] sm:w-full">
                            <div class="w-1/2 text-3xl sm:w-full">セルフィー（自画撮り）</div>
                            <img class="w-[100px] h-auto" :src="`/storage/image/${datas[0].avatarUser}`">
                        </div>
                        <div class="flex flex-wrap gap-y-[1.5rem]">
                            <div class="w-1/2 text-3xl sm:w-full">運転免許証、または<br>顔写真付きの身分証明書</div>
                            <div class="w-1/2 text-xl sm:w-full">
                                <div class="mb-[1.5rem]">
                                    <span class=" font-medium text-red-500">※表面</span>
                                    <img class="w-[100px] h-auto" :src="`/storage/image/${datas[0].frontCardUser}`">
                                </div>
                                <div>
                                    <span class=" font-medium text-red-500">※裏面</span>
                                    <img class="w-[100px] h-auto" :src="`/storage/image/${datas[0].afterCardUser}`">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
