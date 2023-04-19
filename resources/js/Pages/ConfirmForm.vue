<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputConfirm from '@/Components/InputConfirm.vue';
import { Head,useForm} from '@inertiajs/vue3';
import NProgress from 'nprogress';

const props = defineProps({
    dataForm : Object,
})

let inputData ;
let avatarUser;
let frontCardUser;
let afterCardUser;


if(sessionStorage.getItem("inputUser")){
    inputData = JSON.parse(sessionStorage.getItem("inputUser"))
    avatarUser = JSON.parse(sessionStorage.getItem("avatar"))
    frontCardUser = JSON.parse(sessionStorage.getItem("frontCard"))
    afterCardUser = JSON.parse(sessionStorage.getItem("afterCard"))
}

const form = useForm({
    name: props.dataForm?.name||inputData.name,
    Furigana: props.dataForm?.Furigana||inputData.Furigana,
    year: props.dataForm?.year||inputData.year,
    month: props.dataForm?.month||inputData.month,
    day: props.dataForm?.day||inputData.day,
    gender: props.dataForm?.gender||inputData.gender,
    email: props.dataForm?.email||inputData.email,
    preferContact: props.dataForm?.preferContact||inputData.preferContact,
    LINEID: props.dataForm?.LINEID||inputData.LINEID,
    postCodeBef: props.dataForm?.postCodeBef||inputData.postCodeBef,
    postCodeAfter: props.dataForm?.postCodeAfter||inputData.postCodeAfter,
    district: props.dataForm?.district||inputData.district,
    city: props.dataForm?.city||inputData.city,
    address: props.dataForm?.address||inputData.address,
    apartmentName: props.dataForm?.apartmentName||inputData.apartmentName,
    postCodeComBef: props.dataForm?.postCodeComBef||inputData.postCodeComBef,
    postCodeComAfter: props.dataForm?.postCodeComAfter||inputData.postCodeComAfter,
    districtCom: props.dataForm?.districtCom||inputData.districtCom,
    cityCom: props.dataForm?.cityCom||inputData.cityCom,
    addressCom: props.dataForm?.addressCom||inputData.addressCom,
    apartmentNameCom: props.dataForm?.apartmentNameCom||inputData.apartmentNameCom,
    telephoneCom: props.dataForm?.telephoneCom||inputData.telephoneCom,
    bankName: props.dataForm?.bankName||inputData.bankName,
    branchName: props.dataForm?.branchName||inputData.branchName,
    teleBranch: props.dataForm?.teleBranch||inputData.teleBranch,
    typeAccount: props.dataForm?.typeAccount||inputData.typeAccount,
    account: props.dataForm?.account||inputData.account,
    accountName: props.dataForm?.accountName||inputData.accountName,
    avatarUser: inputData.avatar,
    frontCardUser: inputData.frontCard,
    afterCardUser: inputData.afterCard,
});


const submit = () => {
    NProgress.start();
    form.avatarUser = getPhoto(avatarUser);
    form.frontCardUser = getPhoto(frontCardUser);
    form.afterCardUser = getPhoto(afterCardUser);
    console.log(form.afterCardUser);
    form.post(route('thanks-sender'), {
        onFinish: () => {
            NProgress.done();
console.log(form);
            // sessionStorage.removeItem("inputUser");
            // sessionStorage.removeItem("avatar");
            // sessionStorage.removeItem("frontCard");
            // sessionStorage.removeItem("afterCard");
        },
    });
};

const backForm =() => {
    history.back();
}

function getPhoto(img64) {
   let base64Parts = img64.split(",");
   let fileFormat = base64Parts[0].split(";")[1];
   let fileContent = base64Parts[1];
   let file = new File([fileContent], `${img64}-${inputData.email}`, {type: fileFormat});
   return file;
}

</script>

<template>
    <Head title="Form" />
    <AuthenticatedLayout>
        <div class="container mt-[10rem] px-[1.5rem]">
            <h1 class="text-5xl font-bold text-gray-900">本登録用のフォーム（お申し込み用）</h1>
            <form @submit.prevent="submit"
                class="w-full px-[4rem] py-[4rem] border border-slate-500 rounded-sm sm:px-[1rem]">
                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="name" value="名前" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm  :value="form.name"/>
                    </div>
                </div>
                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="Furigana" value="フリガナ" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.Furigana" />
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="" value="生年月日" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-full ">
                        <div class="flex gap-10 w-full">
                            <InputConfirm :value="form.year" />
                            <InputConfirm :value="form.month" />
                            <InputConfirm :value="form.day" />
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="gender" value="性別" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class=" w-[55%] sm:w-full">
                        <div class="flex gap-20 w-full">
                            <InputConfirm :value="form.gender" />
                        </div>
                    </div>
                </div>


                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="email" value="メールアドレス" class=" text-3xl font-bold" />
                        </div>
                        <p class=" text-gray-500 text-xl">※半角英数字でご入力</p>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.email" />
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="preferContact" value="ご希望の連絡方法" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class=" w-[55%] sm:w-full">
                        <div class="flex gap-20 w-full">
                            <InputConfirm :value="form.preferContact" />
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="LINEID" value="LINE ID" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.LINEID" />
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center text-green-300 font-bold">お住まいの情報</h2>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="postCodeBef" value="郵便番号" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%]">
                        <div class="flex w-full items-center gap-6">
                            <InputConfirm :value="form.postCodeBef" />
                            -
                            <InputConfirm :value="form.postCodeAfter" />
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="district" value="都道府県" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.district" />
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="city" value="市区町村" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.city" />
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="address" value="番地" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.address" />
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="apartmentName" value="マンション名・部屋番号" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.apartmentName" />
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center text-green-300 font-bold">勤務先の情報</h2>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="postCodeComBef" value="郵便番号" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%]">
                        <div class="flex w-full items-center gap-6">
                            <InputConfirm :value="form.postCodeComBef" />
                            -
                            <InputConfirm :value="form.postCodeComAfter" />
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="districtCom" value="都道府県" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.districtCom" />
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="cityCom" value="市区町村" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.cityCom" />
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="addressCom" value="番地" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.addressCom" />
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="apartmentNameCom" value="マンション名・部屋番号" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.apartmentNameCom" />
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="telephoneCom" value="電話番号" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.telephoneCom" />
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center text-green-300 font-bold">口座番号</h2>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="bankName" value="銀行名" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.bankName" />
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="branchName" value="支店名" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.branchName" />
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="teleBranch" value="支店番号" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.teleBranch" />
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="typeAccount" value="口座の種類" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class=" w-[55%] sm:w-full">
                        <div class="flex gap-20 w-full">
                            <InputConfirm :value="form.typeAccount" />
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="account" value="口座番号" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.account" />
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="accountName" value="口座名義(カナ)" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <InputConfirm :value="form.accountName" />
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center text-green-300 font-bold">個人情報の写真添付</h2>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <InputLabel for="accountName" value="必要書類の添付" class=" text-3xl font-bold" />
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <div class="flex flex-wrap gap-y-[1.5rem] mb-[2rem] sm:w-full">
                            <div class="w-1/2 text-3xl sm:w-full">セルフィー（自画撮り）</div>
                            <img class="w-[100px] h-auto" :src="avatarUser">
                            <input class="hidden" :value="form.avatarUser" >
                        </div>
                        <div class="flex flex-wrap gap-y-[1.5rem]">
                            <div class="w-1/2 text-3xl sm:w-full">運転免許証、または<br>顔写真付きの身分証明書</div>
                            <div class="w-1/2 text-xl sm:w-full">
                                <div class="mb-[1.5rem]">
                                    <img class="w-[100px] h-auto" :src="frontCardUser">
                                    <input class="hidden" :value="form.frontCardUser" >
                                </div>
                                <div>
                                    <img class="w-[100px] h-auto" :src="afterCardUser">
                                    <input class="hidden" :value="form.afterCardUser" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col-reverse items-center mt-4 p-[2rem] gap-6">
                    <div class="h-[3rem] cursor-pointer bg-gray-800 text-white flex items-center justify-center px-[0.3rem]" @click="backForm">
                        前へ戻る
                    </div>
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        「確認へ移動」ボタン
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
