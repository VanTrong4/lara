<script setup>
import AuthenticatedLayout from '@/Pages/Admin/Layouts/AuthenticatedLayout.vue';
import { Head,Link} from '@inertiajs/vue3';

</script>

<template>
    <Head title="RegisterForm" />

    <AuthenticatedLayout>
        <div class="pt-[7rem] pb-12 min-h-screen">
            <div class="mx-auto px-[2.4rem] w-full">
                <div class="p-3 rounded bg-white mr-4 shadow-sm inline-block text-sky-400 hover:bg-slate-200 hover:text-slate-500" :class="{'bg-sky-400 font-bold':route().current('admin.formRegister')}">
                    <Link :href="route('admin.formRegister')" class="p-6 text-2xl" :class="{'text-white':route().current('admin.formRegister')}">お申込み内容一覧</Link>
                </div>
                <div class="p-3 rounded bg-white shadow-sm inline-block text-sky-400 hover:bg-slate-200 hover:text-slate-500" :class="{'bg-sky-400 font-bold':route().current().includes('listImage')}">
                    <Link :href="route('admin.formRegister.listImage')" class="p-6 text-2xl" :class="{'text-white':route().current().includes('listImage')}">必要書類・写真の確認</Link>
                </div>
                <div class="rounded-2xl bg-white mt-[2rem] flex">
                    <div class="w-1/4 inline-block">
                        <div class="text-xl rounded p-2 w-fit text-slate-400">
                            <Link class="hover:text-black" :href="route('admin.formRegister.listImage')" :class="{'font-bold text-black':route().current('admin.formRegister.listImage')}">セルフィー（自画撮り）</Link>
                        </div>
                        <div class="text-xl rounded p-2 w-fit text-slate-400">
                            <Link class="hover:text-black" :href="route('admin.formRegister.listImage.card')" :class="{'font-bold text-black':route().current('admin.formRegister.listImage.card')}">運転免許証、または<br>顔写真付きの身分証明書</Link>
                        </div>
                    </div>
                    <div class="w-3/4 inline-block">
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
