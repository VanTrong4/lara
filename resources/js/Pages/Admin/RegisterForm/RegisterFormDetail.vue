<script setup>
import AuthenticatedLayout from '@/Pages/Admin/Layouts/AuthenticatedLayout.vue';
import { Head} from '@inertiajs/vue3';

const props = defineProps({
    datas : Object,
})
</script>

<template>
    <Head title="datas" />

    <AuthenticatedLayout>
        <div class="container mt-[10rem] px-[1.5rem]">
            <h1 class="text-5xl font-bold text-gray-900">本登録用のフォーム（お申し込み用）</h1>
            <div class="w-full px-[4rem] py-[4rem] border border-slate-500 rounded-sm sm:px-[1rem]">
                <div class="flex flex-wrap justify-between p-[2rem] gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">名前</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.user.name}}</span>
                    </div>
                </div>
                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">フリガナ</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.user.Furigana}}</span>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">生年月日</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-full ">
                        <div class="flex w-full">
                            <span class="mt-1 block h-[6.4rem] text-3xl border-none">{{datas.user.year}}年</span>
                            <span class="mt-1 block h-[6.4rem] text-3xl border-none">{{datas.user.month}}月</span>
                            <span class="mt-1 block h-[6.4rem] text-3xl border-none">{{datas.user.day}}日</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">性別</span>
                        </div>
                    </div>
                    <div class=" w-[55%] sm:w-full">
                        <div class="flex gap-20 w-full">
                            <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.user.gender}}</span>
                        </div>
                    </div>
                </div>


                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">メールアドレス</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.user.email}}</span>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">ご希望の連絡方法</span>
                        </div>
                    </div>
                    <div class=" w-[55%] sm:w-full">
                        <div class="flex gap-20 w-full">
                            <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.preferContact}}</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">LINE</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.LINEID}}</span>
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center text-green-300 font-bold">お住まいの情報</h2>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">郵便番号</span>
                        </div>
                    </div>
                    <div class="w-[55%]">
                        <div class="flex items-center">
                            <span class="mt-1 block h-[6.4rem] text-3xl border-none">{{datas.postCodeBef}}-</span>
                            <span class="mt-1 block h-[6.4rem] text-3xl border-none">{{datas.postCodeAfter}}</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">都道府県</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.district}}</span>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">市区町村</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.city}}</span>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">番地</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.address}}</span>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">マンション名・部屋番号</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.apartmentName}}</span>
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center text-green-300 font-bold">勤務先の情報</h2>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">郵便番号</span>
                        </div>
                    </div>
                    <div class="w-[55%]">
                        <div class="flex items-center">
                            <span class="mt-1 block h-[6.4rem] text-3xl border-none">{{datas.postCodeComBef}}-</span>
                            <span class="mt-1 block h-[6.4rem] text-3xl border-none">{{datas.postCodeComAfter}}</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">都道府県</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.districtCom}}</span>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">市区町村</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.cityCom}}</span>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">番地</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.addressCom}}</span>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">マンション名・部屋番号</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.apartmentNameCom}}</span>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">電話番号</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.telephoneCom}}</span>
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center text-green-300 font-bold">口座番号</h2>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">銀行名</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.bankName}}</span>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">支店名</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.branchName}}</span>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">支店番号</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.teleBranch}}</span>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">口座の種類</span>
                        </div>
                    </div>
                    <div class=" w-[55%] sm:w-full">
                        <div class="flex gap-20 w-full">
                            <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.typeAccount}}</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">口座番号</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.account}}</span>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">口座名義</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <span class="mt-1 block h-[6.4rem] text-3xl border-none w-full">{{datas.accountName}}</span>
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center text-green-300 font-bold">個人情報の写真添付</h2>

                <div class="flex flex-wrap justify-between p-[2rem] border-t border-t-slate-400 gap-x-[10%]">
                    <div class="w-[35%] sm:w-[100%]">
                        <div class="flex justify-between mb-8 sm:mb-0">
                            <span class="text-3xl font-bold">必要書類の添付</span>
                        </div>
                    </div>
                    <div class="w-[55%] sm:w-[100%]">
                        <div class="flex flex-wrap gap-y-[1.5rem] mb-[2rem] sm:w-full">
                            <div class="w-1/2 text-3xl sm:w-full">セルフィー（自画撮り）</div>
                            <img class="w-[100px] h-auto" :src="`/storage/app/public/image/${datas.avatarUser}`">
                        </div>
                        <div class="flex flex-wrap gap-y-[1.5rem]">
                            <div class="w-1/2 text-3xl sm:w-full">運転免許証、または<br>顔写真付きの身分証明書</div>
                            <div class="w-1/2 text-xl sm:w-full">
                                <div class="mb-[1.5rem]">
                                    <span class=" font-medium text-red-500">※表面</span>
                                    <img class="w-[100px] h-auto" :src="`/storage/app/public/image/${datas.frontCardUser}`">
                                </div>
                                <div>
                                    <span class=" font-medium text-red-500">※裏面</span>
                                    <img class="w-[100px] h-auto" :src="`/storage/app/public/image/${datas.afterCardUser}`">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
