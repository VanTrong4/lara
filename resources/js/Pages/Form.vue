<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectInput from '@/Components/SelectInput.vue';
import RadioInput from '@/Components/RadioInput.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { onMounted } from 'vue'


let inputData ;
if(sessionStorage.getItem("inputUser")){
    inputData = JSON.parse(sessionStorage.getItem("inputUser"))
}

const user = usePage().props.auth.user;
const form = useForm({
    name: inputData?.name||user.name,
    Furigana: inputData?.Furigana||user.Furigana,
    year: inputData?.year||user.year,
    month: inputData?.month||user.month,
    day: inputData?.day||user.day,
    gender: inputData?.gender||user.gender,
    email: inputData?.email||user.email,
    preferContact: inputData?.preferContact||user.preferContact,
    LINEID: inputData?.LINEID||user.LINEID,
    postCodeBef: inputData?.postCodeBef||user.postCodeBef,
    postCodeAfter: inputData?.postCodeAfter||user.postCodeAfter,
    district: inputData?.district||user.district,
    city: inputData?.city||user.city,
    address: inputData?.address||user.address,
    apartmentName: inputData?.apartmentName||user.apartmentName,
    postCodeComBef: inputData?.postCodeComBef||user.postCodeComBef,
    postCodeComAfter: inputData?.postCodeComAfter||user.postCodeComAfter,
    districtCom: inputData?.districtCom||user.districtCom,
    cityCom: inputData?.cityCom||user.cityCom,
    addressCom: inputData?.addressCom||user.addressCom,
    apartmentNameCom: inputData?.apartmentNameCom||user.apartmentNameCom,
    telephoneCom: inputData?.telephoneCom||user.telephoneCom,
    bankName: inputData?.bankName||user.bankName,
    branchName: inputData?.branchName||user.branchName,
    teleBranch: inputData?.teleBranch||user.teleBranch,
    typeAccount: inputData?.typeAccount||user.typeAccount,
    account: inputData?.account||user.account,
    accountName: inputData?.accountName||user.accountName,
    avatar:'',
    frontCard:'',
    afterCard:'',
});

onMounted(() => sessionStorage.removeItem("inputUser"))

const submit = () => {
    form.post(route('form-confirm'));
};


const change = (e) => {
    console.log(e.target.value);
};



</script>

<template>
    <Head title="Form" />
    <AuthenticatedLayout>
        <div class="container mt-11  mt-[10rem]">
            <h1 class="text-5xl font-bold text-gray-900">本登録用のフォーム（お申し込み用）</h1>
            <form autocomplete="on" @focusout="validate" @submit.prevent="submit"
                class="w-full px-[4rem] py-[4rem] border border-slate-500 rounded-sm" enctype="multipart/form-data">
                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="name" value="名前" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※お名前を漢字でご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput  id="name" v-model="form.name" type="text" autocomplete="name" />
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
                        <TextInput  id="Furigana" v-model="form.Furigana" type="text" autocomplete="Furigana" />
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
                            <SelectInput  min="1900" max="2004" v-model="form.year" opDefault="年" id="year" />
                            <SelectInput  min="1" max="12" v-model="form.month" opDefault="月" id="month" />
                            <SelectInput  min="1" max="31" v-model="form.day" opDefault="日" id="day" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.year || form.errors.month || form.errors.day" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="gender" value="生年月日" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class=" w-3/5">
                        <div class="flex gap-20 w-full">
                            <RadioInput  v-model="form.gender" name="gender" id="male" lable="男性" />
                            <RadioInput  v-model="form.gender" name="gender" id="female" lable="女性" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.gender" />
                    </div>
                </div>


                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="email" value="メールアドレス" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※半角英数字でご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput  id="email" v-model="form.email" type="email" autocomplete="email" />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="preferContact" value="ご希望の連絡方法" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class=" w-3/5">
                        <div class="flex gap-20 w-full">
                            <RadioInput  v-model="form.preferContact" name="preferContact" id="typeEmale" lable="メール" />
                            <RadioInput  v-model="form.preferContact" name="preferContact" id="line" lable="LINE" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.preferContact" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="LINEID" value="LINE ID" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-slate-500">任意</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※半角英数字で8文字以上でご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput  id="LINEID" name="LINEID" v-model="form.LINEID" type="text" autocomplete="LINEID" />
                        <InputError class="mt-2" :message="form.errors.LINEID" />
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center">お住まいの情報</h2>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="postCodeBef" value="郵便番号" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class="w-3/5">
                        <div class="flex w-full items-center gap-6">
                            <TextInput  class="w-1/4" size="4" maxlength="3" name="postCodeBef" type="number" v-model="form.postCodeBef" />
                            -
                            <TextInput  class="w-1/4" id="postCodeAfter" name="postCodeAfter" size="5" v-model="form.postCodeAfter"
                                maxlength="4" type="number"
                                onkeyup="AjaxZip3.zip2addr('postCodeBef','postCodeAfter','district','city','address');"/>
                        </div>
                        <InputError class="mt-2" :message="form.errors.postCodeBef||form.errors.postCodeAfter" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="district" value="都道府県" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class="w-3/5">
                        <select  name="district" v-model="form.district"
                            class="leading-[1.3] focus:border-indigo-500 rounded-md shadow-sm mt-1 block h-[6.4rem] bg-gray-100 text-3xl border-none w-1/2">
                            <option value="" selected disabled>都道府県</option>
                            <option value="北海道">北海道</option>
                            <option value="青森県">青森県</option>
                            <option value="岩手県">岩手県</option>
                            <option value="宮城県">宮城県</option>
                            <option value="秋田県">秋田県</option>
                            <option value="山形県">山形県</option>
                            <option value="福島県">福島県</option>
                            <option value="茨城県">茨城県</option>
                            <option value="栃木県">栃木県</option>
                            <option value="群馬県">群馬県</option>
                            <option value="埼玉県">埼玉県</option>
                            <option value="千葉県">千葉県</option>
                            <option value="東京都">東京都</option>
                            <option value="神奈川県">神奈川県</option>
                            <option value="新潟県">新潟県</option>
                            <option value="富山県">富山県</option>
                            <option value="石川県">石川県</option>
                            <option value="福井県">福井県</option>
                            <option value="山梨県">山梨県</option>
                            <option value="長野県">長野県</option>
                            <option value="岐阜県">岐阜県</option>
                            <option value="静岡県">静岡県</option>
                            <option value="愛知県">愛知県</option>
                            <option value="三重県">三重県</option>
                            <option value="滋賀県">滋賀県</option>
                            <option value="京都府">京都府</option>
                            <option value="大阪府">大阪府</option>
                            <option value="兵庫県">兵庫県</option>
                            <option value="奈良県">奈良県</option>
                            <option value="和歌山県">和歌山県</option>
                            <option value="鳥取県">鳥取県</option>
                            <option value="島根県">島根県</option>
                            <option value="岡山県">岡山県</option>
                            <option value="広島県">広島県</option>
                            <option value="山口県">山口県</option>
                            <option value="徳島県">徳島県</option>
                            <option value="香川県">香川県</option>
                            <option value="愛媛県">愛媛県</option>
                            <option value="高知県">高知県</option>
                            <option value="福岡県">福岡県</option>
                            <option value="佐賀県">佐賀県</option>
                            <option value="長崎県">長崎県</option>
                            <option value="熊本県">熊本県</option>
                            <option value="大分県">大分県</option>
                            <option value="宮崎県">宮崎県</option>
                            <option value="鹿児島県">鹿児島県</option>
                            <option value="沖縄県">沖縄県</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.district" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="city" value="市区町村" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class="w-3/5">
                        <TextInput  id="city" name="city" v-model="form.city" type="text" autocomplete="city" @input="change($event)" />
                        <InputError class="mt-2" :message="form.errors.city" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="address" value="番地" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class="w-3/5">
                        <TextInput  id="address" name="address" v-model="form.address" type="text" autocomplete="address" />
                        <InputError class="mt-2" :message="form.errors.address" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="apartmentName" value="マンション名・部屋番号" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-slate-500">任意</p>
                        </div>
                    </div>
                    <div class="w-3/5">
                        <TextInput  id="apartmentName" name="apartmentName" v-model="form.apartmentName" type="text"
                            autocomplete="apartmentName" />
                        <InputError class="mt-2" :message="form.errors.apartmentName" />
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center">勤務先の情報</h2>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="postCodeComBef" value="郵便番号" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class="w-3/5">
                        <div class="flex w-full items-center gap-6">
                            <TextInput  class="w-1/4" size="4" maxlength="3" name="postCodeComBef" type="number"  v-model="form.postCodeComBef"/>
                            -
                            <TextInput  class="w-1/4" id="postCode" name="postCodeComAfter" size="5"  v-model="form.postCodeComAfter"
                                maxlength="4" type="number"
                                onkeyup="AjaxZip3.zip2addr('postCodeComBef','postCodeComAfter','districtCom','cityCom','addressCom');"/>
                        </div>
                        <InputError class="mt-2" :message="form.errors.postCodeComBef||form.errors.postCodeComBef" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="districtCom" value="都道府県" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class="w-3/5">
                        <select  name="districtCom" v-model="form.districtCom"
                            class="leading-[1.3] focus:border-indigo-500 rounded-md shadow-sm mt-1 block h-[6.4rem] bg-gray-100 text-3xl border-none w-1/2">
                            <option value="" selected disabled>都道府県</option>
                            <option value="北海道">北海道</option>
                            <option value="青森県">青森県</option>
                            <option value="岩手県">岩手県</option>
                            <option value="宮城県">宮城県</option>
                            <option value="秋田県">秋田県</option>
                            <option value="山形県">山形県</option>
                            <option value="福島県">福島県</option>
                            <option value="茨城県">茨城県</option>
                            <option value="栃木県">栃木県</option>
                            <option value="群馬県">群馬県</option>
                            <option value="埼玉県">埼玉県</option>
                            <option value="千葉県">千葉県</option>
                            <option value="東京都">東京都</option>
                            <option value="神奈川県">神奈川県</option>
                            <option value="新潟県">新潟県</option>
                            <option value="富山県">富山県</option>
                            <option value="石川県">石川県</option>
                            <option value="福井県">福井県</option>
                            <option value="山梨県">山梨県</option>
                            <option value="長野県">長野県</option>
                            <option value="岐阜県">岐阜県</option>
                            <option value="静岡県">静岡県</option>
                            <option value="愛知県">愛知県</option>
                            <option value="三重県">三重県</option>
                            <option value="滋賀県">滋賀県</option>
                            <option value="京都府">京都府</option>
                            <option value="大阪府">大阪府</option>
                            <option value="兵庫県">兵庫県</option>
                            <option value="奈良県">奈良県</option>
                            <option value="和歌山県">和歌山県</option>
                            <option value="鳥取県">鳥取県</option>
                            <option value="島根県">島根県</option>
                            <option value="岡山県">岡山県</option>
                            <option value="広島県">広島県</option>
                            <option value="山口県">山口県</option>
                            <option value="徳島県">徳島県</option>
                            <option value="香川県">香川県</option>
                            <option value="愛媛県">愛媛県</option>
                            <option value="高知県">高知県</option>
                            <option value="福岡県">福岡県</option>
                            <option value="佐賀県">佐賀県</option>
                            <option value="長崎県">長崎県</option>
                            <option value="熊本県">熊本県</option>
                            <option value="大分県">大分県</option>
                            <option value="宮崎県">宮崎県</option>
                            <option value="鹿児島県">鹿児島県</option>
                            <option value="沖縄県">沖縄県</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.districtCom" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="cityCom" value="市区町村" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class="w-3/5">
                        <TextInput  id="cityCom" name="cityCom" v-model="form.cityCom" type="text" autocomplete="cityCom" />
                        <InputError class="mt-2" :message="form.errors.cityCom" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="addressCom" value="番地" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class="w-3/5">
                        <TextInput  id="addressCom" name="addressCom" v-model="form.addressCom" type="text"
                            autocomplete="addressCom" />
                        <InputError class="mt-2" :message="form.errors.addressCom" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="apartmentNameCom" value="マンション名・部屋番号" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-slate-500">任意</p>
                        </div>
                    </div>
                    <div class="w-3/5">
                        <TextInput  id="apartmentNameCom" name="apartmentNameCom" v-model="form.apartmentNameCom" type="text"
                            autocomplete="apartmentNameCom" />
                        <InputError class="mt-2" :message="form.errors.apartmentNameCom" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="telephoneCom" value="電話番号" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class="w-3/5">
                        <TextInput  id="telephoneCom" name="telephoneCom" v-model="form.telephoneCom" type="number"
                            autocomplete="telephoneCom" />
                        <InputError class="mt-2" :message="form.errors.telephoneCom" />
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center">口座番号</h2>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="bankName" value="銀行名" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-3/5">
                        <TextInput  id="bankName" name="bankName" v-model="form.bankName" type="text"
                            autocomplete="bankName" />
                        <InputError class="mt-2" :message="form.errors.bankName" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="branchName" value="支店名" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-3/5">
                        <TextInput  id="branchName" name="branchName" v-model="form.branchName" type="text"
                            autocomplete="branchName" />
                        <InputError class="mt-2" :message="form.errors.branchName" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="teleBranch" value="支店番号" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-3/5">
                        <TextInput  id="teleBranch" name="teleBranch" v-model="form.teleBranch" type="text"
                            autocomplete="teleBranch" />
                        <InputError class="mt-2" :message="form.errors.teleBranch" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="typeAccount" value="口座の種類" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class=" w-3/5">
                        <div class="flex gap-20 w-full">
                            <RadioInput  v-model="form.typeAccount" name="typeAccount" id="normal" lable="普通" />
                            <RadioInput  v-model="form.typeAccount" name="typeAccount" id="temporary" lable="当座" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.typeAccount" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="account" value="口座番号" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-3/5">
                        <TextInput  id="account" name="account" v-model="form.account" type="number"
                            autocomplete="account" />
                        <InputError class="mt-2" :message="form.errors.account" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="accountName" value="口座名義(カナ)" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-3/5">
                        <TextInput  id="accountName" name="accountName" v-model="form.accountName" type="number"
                            autocomplete="accountName" />
                        <InputError class="mt-2" :message="form.errors.accountName" />
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center">個人情報の写真添付</h2>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="accountName" value="必要書類の添付" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class="w-3/5">
                        <div class="flex flex-wrap gap-y-[1.5rem] mb-[2rem]">
                            <div class="w-1/2 text-3xl">セルフィー（自画撮り）</div>
                            <input class="w-1/2 text-xl" type="file" name="avatar" @change="form.avatar = $event.target.files[0]">
                            <InputError class="mt-2" :message="form.errors.avatar" />
                            <p class="text-gray-500 text-xl">* Please take a selfie with your ID and<br>send a photo of yourself at the same time.</p>
                        </div>
                        <div class="flex flex-wrap gap-y-[1.5rem]">
                            <div class="w-1/2 text-3xl">運転免許証、または<br>顔写真付きの身分証明書</div>
                            <div class="w-1/2 text-xl">
                                <div class="mb-[1.5rem]">
                                    <span class=" font-medium text-red-500">※表面</span>
                                    <input type="file" name="frontCard" @change="form.frontCard = $event.target.files[0]">
                                    <InputError class="mt-2" :message="form.errors.frontCard" />
                                </div>
                                <div>
                                    <span class=" font-medium text-red-500">※裏面</span>
                                    <input type="file" name="afterCard" @change="form.afterCard = $event.target.files[0]">
                                    <InputError class="mt-2" :message="form.errors.afterCard" />
                                </div>
                            </div>
                            <p class="text-gray-500 text-xl">※添付可能な画像のファイル形式はJPEG・PNG・GIFとなります。<br>※添付ボタン1つにつき、添付可能な画像容量は5MBまでになります。</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col items-start justify-end mt-4 p-[2rem] gap-6">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        「確認へ移動」ボタン
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
