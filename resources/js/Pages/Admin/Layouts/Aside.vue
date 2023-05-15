<script setup>
import { Link } from '@inertiajs/vue3';

let current = route().current();
</script>

<template>
    <aside id="aside" class="w-[24rem] fixed flex z-50 top-0 h-screen transition-position">
        <div class="bg-gray-800 lg:rounded-2xl flex-1 flex flex-col overflow-hidden dark:bg-slate-900">
            <div class="bg-gray-900 text-white flex flex-row h-[6rem] items-center justify-between dark:bg-slate-900">
                <div class="text-center flex-1 lg:text-left lg:pl-6 xl:text-center text-3xl xl:pl-0">
                    <b class="font-black">One</b>
                </div>
                <button class="hidden lg:inline-block xl:hidden p-3">
                    <span class="inline-flex justify-center items-center"><svg viewBox="0 0 24 24" width="16" height="16"
                            class="inline-block">
                            <path fill="currentColor"
                                d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z">
                            </path>
                        </svg></span>
                </button>
            </div>
            <div class="aside-scrollbars-gray flex-1 overflow-y-auto overflow-x-hidden">
                <ul>
                    <li>
                        <Link :href="route('admin.dashboard')"
                            class="router-link-active router-link-exact-active flex cursor-pointer py-[1.2rem] text-gray-300 hover:text-white dark:text-slate-300 dark:hover:text-white">
                            <span
                                class="inline-flex justify-center items-center w-[6.4rem] flex-none font-bold text-white"><svg
                                    viewBox="0 0 24 24" width="18" height="18" class="inline-block">
                                    <path fill="currentColor"
                                        d="M21,16H3V4H21M21,2H3C1.89,2 1,2.89 1,4V16A2,2 0 0,0 3,18H10V20H8V22H16V20H14V18H21A2,2 0 0,0 23,16V4C23,2.89 22.1,2 21,2Z">
                                    </path>
                                </svg></span><span
                                class="grow text-ellipsis line-clamp-1 pr-12 font-bold text-2xl" :class="current=='admin.dashboard' && 'text-white'">Dashboard</span>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('admin.users')"
                            class="flex cursor-pointer py-[1.2rem] text-gray-300 hover:text-white dark:text-slate-300 dark:hover:text-white">
                            <span
                                class="inline-flex justify-center items-center w-[6.4rem] flex-none font-bold text-white"><svg
                                    viewBox="0 0 24 24" width="18" height="18" class="inline-block">
                                    <path fill="currentColor"
                                        d="M5,4H19A2,2 0 0,1 21,6V18A2,2 0 0,1 19,20H5A2,2 0 0,1 3,18V6A2,2 0 0,1 5,4M5,8V12H11V8H5M13,8V12H19V8H13M5,14V18H11V14H5M13,14V18H19V14H13Z">
                                    </path>
                                </svg></span><span class="grow text-ellipsis line-clamp-1 pr-12 text-2xl" :class="current=='admin.users' && 'text-white'">Users</span>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('admin.formRegister')"
                            class="flex cursor-pointer py-[1.2rem] text-gray-300 hover:text-white dark:text-slate-300 dark:hover:text-white">
                            <span
                                class="inline-flex justify-center items-center w-[6.4rem] flex-none font-bold text-white"><svg
                                    viewBox="0 0 24 24" width="18" height="18" class="inline-block">
                                    <path fill="currentColor"
                                        d="M5,4H19A2,2 0 0,1 21,6V18A2,2 0 0,1 19,20H5A2,2 0 0,1 3,18V6A2,2 0 0,1 5,4M5,8V12H11V8H5M13,8V12H19V8H13M5,14V18H11V14H5M13,14V18H19V14H13Z">
                                    </path>
                                </svg></span><span class="grow text-ellipsis line-clamp-1 pr-12 text-2xl" :class="current=='admin.formRegister' && 'text-white'">FormRegister</span>
                        </Link>
                    </li>
                    <li>
                        <Link href=""
                            class="flex cursor-pointer py-[1.2rem] text-gray-300 hover:text-white dark:text-slate-300 dark:hover:text-white">
                            <span
                                class="inline-flex justify-center items-center w-[6.4rem] flex-none font-bold text-white"><svg
                                    viewBox="0 0 24 24" width="18" height="18" class="inline-block">
                                    <path fill="currentColor"
                                        d="M5,4H19A2,2 0 0,1 21,6V18A2,2 0 0,1 19,20H5A2,2 0 0,1 3,18V6A2,2 0 0,1 5,4M5,8V12H11V8H5M13,8V12H19V8H13M5,14V18H11V14H5M13,14V18H19V14H13Z">
                                    </path>
                                </svg></span><span class="grow text-ellipsis line-clamp-1 pr-12 text-2xl">exexex</span>
                        </Link>
                        <ul class="bg-gray-700/50 hidden">
                            <li><Link href=""
                                    class="flex cursor-pointer py-3 px-6 text-sm text-gray-300 hover:text-white dark:text-slate-300 dark:hover:text-white"><!----><span
                                    class="grow text-ellipsis line-clamp-1 pr-12">Item One</span><!----></Link><!----></li>
                        <li><Link href=""
                                class="flex cursor-pointer py-3 px-6 text-sm text-gray-300 hover:text-white dark:text-slate-300 dark:hover:text-white"><!----><span
                                    class="grow text-ellipsis line-clamp-1 pr-12">Item Two</span><!----></Link><!----></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</aside></template>
