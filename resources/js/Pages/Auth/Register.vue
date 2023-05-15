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
import NProgress from 'nprogress';

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
    NProgress.start();
    form.post(route('register'), {
        onFinish: () => {
            NProgress.done();
            form.reset('password', 'password_confirmation')},
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Register" />
        <div class="container px-[1.5rem]">
            <h1 class="text-5xl font-bold text-gray-900">仮登録用フォーム</h1>
            <form @focusout="validate" @submit.prevent="submit" class="w-full px-[4rem] py-[4rem] border border-slate-500 rounded-sm sm:px-[1rem]">
                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-[5%]">
                    <div class=" w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="name" value="名前" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500 min-w-[40px]">必須</p>
                        </div>
                    </div>
                    <div class="w-[60%] sm:w-[100%]">
                        <TextInput id="name" v-model="form.name" type="text"   autocomplete="name" placeholder="※お名前を漢字でご入力" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-[5%]">
                    <div class=" w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="Furigana" value="フリガナ" class=" text-3xl font-bold sm:mr-[30px]" />
                            <p class=" text-3xl font-medium text-red-500 min-w-[40px]">必須</p>
                        </div>
                    </div>
                    <div class="w-[60%] sm:w-[100%]">
                    <TextInput id="Furigana" v-model="form.Furigana" type="text"  
                        autocomplete="Furigana" placeholder="※お名前のフリガナをご入力"/>
                    <InputError class="mt-2" :message="form.errors.Furigana" />
                </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-[5%]">
                    <div class=" w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="" value="生年月日" class=" text-3xl font-bold sm:mr-[30px]" />
                            <p class=" text-3xl font-medium text-red-500 min-w-[40px]">必須</p>
                        </div>
                    </div>
                    <div class="w-[60%] sm:w-[100%] ">
                        <div class="flex flex-wrap gap-10 w-full sm:gap-[1.5rem]">
                        <SelectInput min="1900" max="2004" v-model="form.year" opDefault="年" id="year"   />
                        <SelectInput min="1" max="12" v-model="form.month" opDefault="月" id="month"   />
                        <SelectInput min="1" max="31" v-model="form.day" opDefault="日" id="day"   />
                        </div>
                        <InputError class="mt-2" :message="form.errors.year || form.errors.month || form.errors.day" />
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-[5%]">
                    <div class=" w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="gender" value="性別" class=" text-3xl font-bold sm:mr-[30px]" />
                            <p class=" text-3xl font-medium text-red-500 min-w-[40px]">必須</p>
                        </div>
                    </div>
                    <div class=" w-[60%] sm:w-[100%]">
                        <div class="flex flex-wrap gap-x-20 w-full">
                        <RadioInput v-model="form.gender" name="gender" id="male" lable="男性" />
                        <RadioInput v-model="form.gender" name="gender" id="female" lable="女性" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.gender" />
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-green-300 font-bold text-center">ログイン用のメールアドレスとパスワード</h2>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-[5%]">
                    <div class=" w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="email" value="メールアドレス" class=" text-3xl font-bold sm:mr-[30px]" />
                            <p class=" text-3xl font-medium text-red-500 min-w-[40px]">必須</p>
                        </div>
                    </div>
                    <div class="w-[60%] sm:w-[100%]">
                    <TextInput id="email" v-model="form.email" type="email"   autocomplete="email" placeholder="※半角英数字でご入力" />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-[5%]">
                    <div class=" w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="emailConfirm" value="メールアドレス（確認用）" class=" text-3xl font-bold sm:mr-[30px]" />
                            <p class=" text-3xl font-medium text-red-500 min-w-[40px]">必須</p>
                        </div>
                    </div>
                    <div class="w-[60%] sm:w-[100%]">
                    <TextInput id="emailConfirm" v-model="form.emailConfirm" type="email"  
                        autocomplete="emailConfirm" placeholder="※上記と同じメールアドレスを再度ご入力" />
                    <InputError class="mt-2" :message="form.errors.emailConfirm" />
                </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-[5%]">
                    <div class=" w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="password" value="パスワード" class=" text-3xl font-bold sm:mr-[30px]" />
                            <p class=" text-3xl font-medium text-red-500 min-w-[40px]">必須</p>
                        </div>
                    </div>
                    <div class="w-[60%] sm:w-[100%]">
                    <TextInput id="password" name="password" v-model="form.password" type="password"  
                        autocomplete="password"  placeholder="※半角英数字で8文字以上でご入力"/>
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-[5%]">
                    <div class=" w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="password_confirmation" value="パスワード（確認用）" class=" text-3xl font-bold sm:mr-[30px]" />
                            <p class=" text-3xl font-medium text-red-500 min-w-[40px]">必須</p>
                        </div>
                    </div>
                    <div class="w-[60%] sm:w-[100%]">
                    <TextInput id="password_confirmation" name="password_confirmation" v-model="form.password_confirmation" type="password" 
                         autocomplete="password_confirmation" placeholder="※上記と同じパスワードを再度ご入力" />
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>
                </div>

                <div class="flex flex-col items-start justify-end mt-4 p-[2rem] gap-6">
                    <div class="flex items-center gap-5">
                        <Checkbox id="yes" name="terms"  v-model="form.terms"/>
                        <label for="yes" class="text-3xl font-bold sm:mr-[30px]">プライバシーポリシーに同意	</label>
                        <InputError class="mt-2" :message="form.errors.terms" />
                    </div>
                    <Link :href="route('login')"
                        class="underline ml-8 text-xl font-bold hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Already registered?
                    </Link>

                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        送信
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>
