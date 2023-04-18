<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectInput from '@/Components/SelectInput.vue';
import RadioInput from '@/Components/RadioInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    Furigana: '',
    year: '',
    month: '',
    day: '',
    gender: '',
    email: '',
    emailConfirm: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation')},
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Register" />
        <div class="container">
            <h1 class="text-5xl font-bold text-gray-900">仮登録用フォーム</h1>
            <form @focusout="validate" @submit.prevent="submit" class="w-full px-[4rem] py-[4rem] border border-slate-500 rounded-sm">
                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="name" value="名前" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※お名前を漢字でご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput id="name" v-model="form.name" type="text"   autocomplete="name" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="Furigana" value="フリガナ" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※お名前のフリガナをご入力</p>
                    </div>
                    <div class="w-3/5">
                    <TextInput id="Furigana" v-model="form.Furigana" type="text"  
                        autocomplete="Furigana" />
                    <InputError class="mt-2" :message="form.errors.Furigana" />
                </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="" value="生年月日" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class="w-3/5 ">
                        <div class="flex gap-10 w-full">
                        <SelectInput min="1900" max="2004" v-model="form.year" opDefault="年" id="year"   />
                        <SelectInput min="1" max="12" v-model="form.month" opDefault="月" id="month"   />
                        <SelectInput min="1" max="31" v-model="form.day" opDefault="日" id="day"   />
                        </div>
                        <InputError class="mt-2" :message="form.errors.year || form.errors.month || form.errors.day" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="gender" value="生年月日" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">性別</p>
                        </div>
                    </div>
                    <div class=" w-3/5">
                        <div class="flex gap-20 w-full">
                        <RadioInput v-model="form.gender" name="gender" id="male" lable="男性" />
                        <RadioInput v-model="form.gender" name="gender" id="female" lable="女性" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.gender" />
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center">ログイン用のメールアドレスとパスワード</h2>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="email" value="メールアドレス" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">性別</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※半角英数字でご入力</p>
                    </div>
                    <div class="w-3/5">
                    <TextInput id="email" v-model="form.email" type="email"   autocomplete="email" />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="Furigana" value="メールアドレス（確認用）" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">性別</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じメールアドレスを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                    <TextInput id="emailConfirm" v-model="form.emailConfirm" type="email"  
                        autocomplete="emailConfirm" />
                    <InputError class="mt-2" :message="form.errors.emailConfirm" />
                </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="password" value="パスワード" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">性別</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※半角英数字で8文字以上でご入力</p>
                    </div>
                    <div class="w-3/5">
                    <TextInput id="password" name="password" v-model="form.password" type="password"  
                        autocomplete="password" />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="password_confirmation" value="メールアドレス（確認用）" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">性別</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                    <TextInput id="password_confirmation" name="password_confirmation" v-model="form.password_confirmation" type="password" 
                         autocomplete="password_confirmation" />
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>
                </div>

                <div class="flex flex-col items-start justify-end mt-4 p-[2rem] gap-6">
                    <div class="flex items-center gap-5">
                        <Checkbox id="yes" name="terms"  v-model="form.terms"/>
                        <label for="yes" class="text-3xl font-bold">プライバシーポリシーに同意	</label>
                        <InputError class="mt-2" :message="form.errors.terms" />
                    </div>
                    <Link :href="route('login')"
                        class="underline ml-8 text-xl font-bold hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Already registered?
                    </Link>

                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>
