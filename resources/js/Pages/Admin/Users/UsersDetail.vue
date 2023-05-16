<script setup>
import AuthenticatedLayout from '@/Pages/Admin/Layouts/AuthenticatedLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { Head} from '@inertiajs/vue3';
import InputConfirm from '@/Components/InputConfirm.vue';

const props = defineProps({
    user : Object,
})
</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <div class="py-12 min-h-screen">
            <div class="mx-auto px-[6.4rem] w-full">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-[4rem]">
                    <div class="p-6 text-2xl text-gray-900">Users</div>
                </div>
                <div class="rounded-2xl bg-white mt-[2rem]">
                    <form @submit.prevent="submit"
                        class="w-full px-[4rem] py-[4rem] border border-slate-500 rounded-sm sm:px-[1rem]">
                        <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-[5%]">
                            <div class=" w-[35%] sm:w-[100%]">
                                <div class="flex justify-between mb-8">
                                    <InputLabel for="name" value="名前" class=" text-3xl font-bold" />
                                </div>
                            </div>
                            <div class="w-[60%] sm:w-[100%]">
                                <InputConfirm :value="props.user.name" />
                            </div>
                        </div>

                        <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-[5%]">
                            <div class=" w-[35%] sm:w-[100%]">
                                <div class="flex justify-between mb-8">
                                    <InputLabel for="Furigana" value="フリガナ" class=" text-3xl font-bold sm:mr-[30px]" />
                                </div>
                            </div>
                            <div class="w-[60%] sm:w-[100%]">
                                <InputConfirm :value="props.user.Furigana" />
                            </div>
                        </div>

                        <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-[5%]">
                            <div class=" w-[35%] sm:w-[100%]">
                                <div class="flex justify-between mb-8">
                                    <InputLabel for="" value="生年月日" class=" text-3xl font-bold sm:mr-[30px]" />
                                </div>
                            </div>
                            <div class="w-[60%] sm:w-[100%] ">
                                <div class="flex flex-wrap gap-10 w-full sm:gap-[1.5rem]">
                                    <InputConfirm :value="props.user.year" />
                                </div>
                            </div>
                        </div>

                        <div
                            class="flex flex-wrap justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-[5%]">
                            <div class=" w-[35%] sm:w-[100%]">
                                <div class="flex justify-between mb-8">
                                    <InputLabel for="gender" value="性別" class=" text-3xl font-bold sm:mr-[30px]" />
                                </div>
                            </div>
                            <div class=" w-[60%] sm:w-[100%]">
                                <div class="flex flex-wrap gap-x-20 w-full">
                                    <InputConfirm :value="props.user.gender" />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap justify-between p-[2rem] border-t gap-[5%]">
                            <div class=" w-[35%] sm:w-[100%]">
                                <div class="flex justify-between mb-8">
                                    <InputLabel for="email" value="メールアドレス" class=" text-3xl font-bold sm:mr-[30px]" />
                                </div>
                            </div>
                            <div class="w-[60%] sm:w-[100%]">
                                    <InputConfirm :value="props.user.email" />
                            </div>
                        </div>

                        <div
                            class="flex flex-wrap justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-[5%]">
                            <div class=" w-[35%] sm:w-[100%]">
                                <div class="flex justify-between mb-8">
                                    <InputLabel for="gender" value="Role" class=" text-3xl font-bold sm:mr-[30px]" />
                                </div>
                            </div>
                            <div class=" w-[60%] sm:w-[100%]">
                                <div class="flex flex-wrap gap-x-20 w-full">
                                    <InputConfirm :value="(props.user.is_admin ? 'Admin' : 'Normal')" />
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</AuthenticatedLayout></template>
