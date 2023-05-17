<script setup>
import AuthenticatedLayout from '@/Pages/Admin/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    users : Object,
})
</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <div class="py-12 min-h-screen">
            <div class="mx-auto px-[2.4rem] w-full">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-[4rem]">
                    <div class="p-6 text-2xl text-gray-900">Users</div>
                </div>
                <div class="flex gap-[2rem] mt-[2rem] justify-end">
                        <Link :href="route('admin.users-create')" class="inline-flex justify-center items-center px-[0.8rem] whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-blue-600 dark:border-blue-500 ring-blue-300 dark:ring-blue-700 bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-700 hover:border-blue-700 hover:dark:bg-blue-600 hover:dark:border-blue-600 p-1 last:mr-0 text-xl">新規追加</Link>
                        <form :action="route('admin.users-excel')" method="get">
                            <button type="submit" class="inline-flex justify-center items-center px-[0.8rem] whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-blue-600 dark:border-blue-500 ring-blue-300 dark:ring-blue-700 bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-700 hover:border-blue-700 hover:dark:bg-blue-600 hover:dark:border-blue-600 p-1 last:mr-0 text-xl">CSVエクスポート</button>
                        </form>
                </div>
                <div class="rounded-2xl bg-white mt-[2rem]">
                    <div class="overflow-x-scroll">
                        <table class="text-xl">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th class="bg-yellow-300">登録日</th>
                                    <th class="bg-yellow-300">名前</th>
                                    <th class="bg-yellow-300">フリガナ</th>
                                    <th class="bg-yellow-300">生年月日</th>
                                    <th class="bg-yellow-300">性別</th>
                                    <th class="bg-yellow-300">メールアドレス</th>
                                    <th class="bg-yellow-300">パスワード</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in props.users.data">
                                    <td><Link :href="route('admin.users-detail',user.id)" class="inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-blue-600 dark:border-blue-500 ring-blue-300 dark:ring-blue-700 bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-700 hover:border-blue-700 hover:dark:bg-blue-600 hover:dark:border-blue-600 p-1 last:mr-0 w-full">詳細</Link></td>
                                    <td><Link :href="route('admin.users-edit',user.id)" class="inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-blue-600 dark:border-blue-500 ring-blue-300 dark:ring-blue-700 bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-700 hover:border-blue-700 hover:dark:bg-blue-600 hover:dark:border-blue-600 p-1 last:mr-0 w-full">編集</Link></td>
                                    <td>{{ user.created_at.slice(0,10).replace('-','年').replace('-','月') }}日</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.Furigana }}</td>
                                    <td>{{ user.year }}</td>
                                    <td>{{ user.gender }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>××××××××</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-3 lg:px-6 border-t border-gray-100 dark:border-slate-800">
                        <div class="justify-between items-center block flex">
                            <div class="flex items-center justify-center mb-6 mb-0">
                                <div class="flex items-center justify-start flex-wrap -mb-3">
                                    <template v-for="link in props.users.links">
                                        <Link v-if="link.url" :href="link.url" :class="link.active && 'bg-slate-200'"
                                        class="inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-gray-100 dark:border-slate-800 ring-gray-200 dark:ring-gray-500 dark:bg-slate-700 hover:bg-gray-200 hover:dark:bg-slate-700 text-sm p-1 mr-3 last:mr-0"
                                        ><!----><span class="px-2 text-xl" v-html="link.label"></span></Link>
                                        <span v-else v-html="link.label" class="inline-flex px-2 text-xl justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border rounded border-gray-100 dark:border-slate-800 ring-gray-200 dark:ring-gray-500 dark:bg-slate-700 text-sm p-1 mr-3 last:mr-0"></span>
                                    </template>
                                </div>
                        </div>
                        <template  v-for="link in props.users.links">
                            <div v-if="link.active" class="flex items-center justify-center text-xl">Page {{ link.label }} of {{ props.users.links.length-2 }}</div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</AuthenticatedLayout></template>
