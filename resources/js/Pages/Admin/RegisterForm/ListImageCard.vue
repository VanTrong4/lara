<script setup>
import ListImage from "@/Pages/Admin/RegisterForm/ListImage.vue";
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    datas: Object,
})

</script>

<template>
    <ListImage>
        <table class="text-xl">
            <thead>
                <tr>
                    <th class="text-center bg-slate-200">お申込み日</th>
                    <th class="text-center bg-slate-200">メールアドレス</th>
                    <th class="text-center bg-slate-200">※表面</th>
                    <th class="text-center bg-slate-200">※裏面</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="data in props.datas.data">
                    <td>{{ data.created_at.slice(0,10).replace('-','年').replace('-','月') }}日</td>
                    <td>{{ data.user.email }}</td>
                    <td><img class="w-[100px] h-auto" :src="`/storage/app/public/image/${data.frontCardUser}`"></td>
                    <td><img class="w-[100px] h-auto" :src="`/storage/app/public/image/${data.afterCardUser}`"></td>
                </tr>
            </tbody>
        </table>
        <div class="p-3 lg:px-6 border-t border-gray-100 dark:border-slate-800">
                        <div class="justify-between items-center block flex">
                            <div class="flex items-center justify-center mb-6 mb-0">
                                <div class="flex items-center justify-start flex-wrap -mb-3">
                                    <template v-for="link in props.datas.links">
                                        <Link v-if="link.url" :href="link.url" :class="link.active && 'bg-slate-200'"
                                        class="inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-gray-100 dark:border-slate-800 ring-gray-200 dark:ring-gray-500 dark:bg-slate-700 hover:bg-gray-200 hover:dark:bg-slate-700 text-sm p-1 mr-3 last:mr-0"
                                        ><!----><span class="px-2 text-xl" v-html="link.label"></span></Link>
                                        <span v-else v-html="link.label" class="inline-flex px-2 text-xl justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border rounded border-gray-100 dark:border-slate-800 ring-gray-200 dark:ring-gray-500 dark:bg-slate-700 text-sm p-1 mr-3 last:mr-0"></span>
                                    </template>
                                </div>
                        </div>
                        <template  v-for="link in props.datas.links">
                            <div v-if="link.active" class="flex items-center justify-center text-xl">Page {{ link.label }} of {{ props.datas.links.length-2 }}</div>
                        </template>
                    </div>
                </div>
    </ListImage>
</template>