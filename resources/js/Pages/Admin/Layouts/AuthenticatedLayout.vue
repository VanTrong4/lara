<script setup>
import { ref } from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Aside from '@/Pages/Admin/Layouts/Aside.vue';

const showingNavigationDropdown = ref(false);
const showingSidebar = ref(screen.width>768);
</script>

<template>
    <div>
        <div class="min-h-screen">
            <nav class="flex items-center h-[6rem] bg-green-500 fixed w-full top-0 left-0 z-50 pl-[24rem] lg:pl-0">
                <!-- Primary Navigation Menu -->
                <div class="w-full px-[2.4rem]">
                    <div class="flex justify-between w-full">
                        <div class="flex">
                            <div @click="showingSidebar = !showingSidebar"
                                class="hidden lg:flex xl:hidden text-black hover:text-blue-500 py-[0.8rem] px-[1.2rem] items-center cursor-pointer dark:text-white dark:hover:text-slate-400">
                                <span class="inline-flex justify-center items-center w-[2.4rem] h-[2.4rem]"><svg viewBox="0 0 24 24"
                                        width="24" height="24" class="inline-block">
                                        <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z"></path>
                                    </svg></span></div>
                            <!-- Navigation Links -->
                            <div class="flex items-center">
                                <NavLink :href="route('admin.dashboard')">
                                    Dashboard
                                </NavLink>
                            </div>
                        </div>

                        <div class="flex items-center ml-6">
                            <!-- Settings Dropdown -->
                            <div class="relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex h-[3rem] text-3xl items-center px-3 py-2 border border-transparent leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}
                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink class=" text-3xl" :href="route('admin.logout')" method="get"
                                            as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                    </div>
                </div>
            </nav>
            <Aside v-if="showingSidebar" @close="(data) => showingSidebar = data" />
            <!-- Page Content -->
            <main class="pl-[24rem] bg-gray-50 lg:pl-0">
                <slot />
            </main>
            <footer class="bg-green-300 py-[4rem] mt-14">
                <div class="flex justify-center items-center">
                    <div class="text-4xl">LOGO</div>
                </div>
            </footer>
        </div>
    </div>
</template>
