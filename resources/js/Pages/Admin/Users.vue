<script setup>
import AuthenticatedLayout from '@/Pages/Admin/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <div class="py-12 min-h-screen">
            <div class="mx-auto px-[6.4rem] w-full">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-[4rem]">
                    <div class="p-6 text-2xl text-gray-900">Users</div>
                </div>
                <div class="flex gap-[2rem] mt-[2rem] justify-end">
                        <Link href="" class="inline-flex justify-center items-center px-[0.8rem] whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-blue-600 dark:border-blue-500 ring-blue-300 dark:ring-blue-700 bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-700 hover:border-blue-700 hover:dark:bg-blue-600 hover:dark:border-blue-600 p-1 last:mr-0 text-xl">新規追加</Link>
                        <Link href="" class="inline-flex justify-center items-center px-[0.8rem] whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-blue-600 dark:border-blue-500 ring-blue-300 dark:ring-blue-700 bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-700 hover:border-blue-700 hover:dark:bg-blue-600 hover:dark:border-blue-600 p-1 last:mr-0 text-xl">CSVエクスポート</Link>
                </div>
                <div class="rounded-2xl bg-white mt-[2rem]">
                    <table class="text-xl">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>登録日</th>
                                <th>名前</th>
                                <th>フリガナ</th>
                                <th>生年月日</th>
                                <th>性別</th>
                                <th>メールアドレス</th>
                                <th>パスワード</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><Link href="" class="inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-blue-600 dark:border-blue-500 ring-blue-300 dark:ring-blue-700 bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-700 hover:border-blue-700 hover:dark:bg-blue-600 hover:dark:border-blue-600 p-1 last:mr-0 w-full">詳細</Link></td>
                                <td><Link href="" class="inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-blue-600 dark:border-blue-500 ring-blue-300 dark:ring-blue-700 bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-700 hover:border-blue-700 hover:dark:bg-blue-600 hover:dark:border-blue-600 p-1 last:mr-0 w-full">編集</Link></td>
                                <td>2023年××月××日</td>
                                <td>村瀬貴志</td>
                                <td>ムラセタカシ</td>
                                <td>××××年××月××日</td>
                                <td>男性</td>
                                <td>murase@icon-corp.jp</td>
                                <td>××××××××</td>
                            </tr>
                            <tr>
                                <td><Link href="" class="bg-lime-500 cursor-pointer">詳細</Link></td>
                                <td><Link href="" class="bg-lime-500 cursor-pointer">編集</Link></td>
                                <td>2023年××月××日</td>
                                <td>村瀬貴志</td>
                                <td>ムラセタカシ</td>
                                <td>××××年××月××日</td>
                                <td>男性</td>
                                <td>murase@icon-corp.jp</td>
                                <td>××××××××</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="p-3 lg:px-6 border-t border-gray-100 dark:border-slate-800">
                        <div class="justify-between items-center block flex">
                            <div class="flex items-center justify-center mb-6 mb-0">
                                <div class="flex items-center justify-start flex-wrap -mb-3"><button
                                        class="inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-gray-100 dark:border-slate-800 ring-gray-200 dark:ring-gray-500 bg-gray-200 dark:bg-slate-700 hover:bg-gray-200 hover:dark:bg-slate-700 text-sm p-1 mr-3 last:mr-0 mb-3"
                                        type="button"><!----><span class="px-2 text-xl">1</span></button><button
                                        class="inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-white dark:border-slate-900 ring-gray-200 dark:ring-gray-500 bg-white text-black dark:bg-slate-900 dark:text-white hover:bg-gray-100 hover:dark:bg-slate-800 text-sm p-1 mr-3 last:mr-0 mb-3"
                                        type="button"><!----><span class="px-2 text-xl">2</span></button><button
                                    class="inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-white dark:border-slate-900 ring-gray-200 dark:ring-gray-500 bg-white text-black dark:bg-slate-900 dark:text-white hover:bg-gray-100 hover:dark:bg-slate-800 text-sm p-1 mr-3 last:mr-0 mb-3"
                                    type="button"><!----><span class="px-2 text-xl">3</span></button><button
                                    class="inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-white dark:border-slate-900 ring-gray-200 dark:ring-gray-500 bg-white text-black dark:bg-slate-900 dark:text-white hover:bg-gray-100 hover:dark:bg-slate-800 text-sm p-1 mr-3 last:mr-0 mb-3"
                                    type="button"><!----><span class="px-2 text-xl">4</span></button></div>
                        </div>
                        <div class="flex items-center justify-center text-xl">Page 1 of 4</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</AuthenticatedLayout></template>
