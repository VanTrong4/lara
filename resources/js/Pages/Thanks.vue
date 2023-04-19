<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    }
});
</script>

<template>
    <Head title="Thanks" />

    <div
        class="flex flex-col justify-center px-[1.5rem] min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900"
    >
        <div v-if="canLogin" class="fixed top-0 right-0 p-6 text-right text-3xl">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Register</Link
                >
            </template>
        </div>
        <h1 class="text-4xl text-center font-bold mb-[2rem]">THANKS</h1>
        <div class="flex flex-col items-center">
            <div class="mb-4 text-3xl font-bold text-center leading-normal">
            仮登録<br>
            送信完了<br>
            この度はお申し込み頂き誠にありがとうございます。<br>
            現状、仮登録を完了しメールアドレスへ確認用の自動メールを送信しました。<br>
            自動メールをご確認後、本登録へお進みください。					
            </div>
            <Link :href="route('login')" class=" mt-10 text-3xl p-6 bg-black text-slate-100 rounded-md">TOPへ戻る</Link>
        </div>
    </div>
</template>

<style>
</style>
