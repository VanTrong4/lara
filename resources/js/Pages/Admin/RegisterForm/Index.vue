<script setup>
import AuthenticatedLayout from '@/Pages/Admin/Layouts/AuthenticatedLayout.vue';
import { Head,Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';


const props = defineProps({
    datas : Object,
})

const valueSet = ref(['']);

const form = useForm({
    status: '',
});

const changeStatus = function(e,id){
    valueSet.value[0] = e.target.value;
    form.status = e.target.value;
    valueSet.value[1] = id;
    submit(id);
}

const submit = (id) => {
    form.post(route('admin.formRegister-updateStatus',id));
};
</script>

<template>
    <Head title="RegisterForm" />

    <AuthenticatedLayout>
        <div class="pt-[7rem] pb-12 min-h-screen">
            <div class="mx-auto px-[2.4rem] w-full">
                <div class="p-3 rounded bg-white mr-4 shadow-sm inline-block text-sky-400 hover:bg-slate-200 hover:text-slate-500" :class="{'bg-sky-400 font-bold':route().current('admin.formRegister')}">
                    <Link :href="route('admin.formRegister')" class="p-6 text-2xl" :class="{'text-white':route().current('admin.formRegister')}">お申込み内容一覧</Link>
                </div>
                <div class="p-3 rounded bg-white shadow-sm inline-block text-sky-400 hover:bg-slate-200 hover:text-slate-500" :class="{'bg-sky-400 font-bold':route().current('admin.formRegister.listImage')}">
                    <Link :href="route('admin.formRegister.listImage')" class="p-6 text-2xl" :class="{'text-white':route().current('admin.formRegister.listImage')}">必要書類・写真の確認</Link>
                </div>
                <div class="flex gap-[2rem] mt-[2rem] justify-end">
                        <form :action="route('admin.formRegister-excel')" method="get">
                            <button type="submit" class="inline-flex justify-center items-center px-[0.8rem] whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-blue-600 dark:border-blue-500 ring-blue-300 dark:ring-blue-700 bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-700 hover:border-blue-700 hover:dark:bg-blue-600 hover:dark:border-blue-600 p-1 last:mr-0 text-xl">CSVエクスポート</button>
                        </form>
                </div>
                <div class="rounded-2xl bg-white mt-[2rem]">
                    <div class="overflow-x-scroll">
                        <table class="text-xl">
                            <thead>
                                <tr>
                                    <th rowspan="1" colspan="4"></th>
                                    <th class="text-center bg-slate-200" rowspan="1" colspan="7">顧客情報</th>
                                    <th class="text-center bg-slate-200" rowspan="1" colspan="5">お住まいの情報</th>
                                    <th class="text-center bg-slate-200" rowspan="1" colspan="6">勤務先の情報</th>
                                    <th class="text-center bg-slate-200" rowspan="1" colspan="6">口座番号</th>
                                </tr>
                                <tr>
                                    <th>ステータス</th>
                                    <th>契約書PDF</th>
                                    <th>写真確認</th>
                                    <th>詳細</th>
                                    <th class="bg-yellow-300">お申込み日</th>
                                    <th class="bg-yellow-300">名前</th>
                                    <th class="bg-yellow-300">フリガナ</th>
                                    <th class="bg-yellow-300">生年月日</th>
                                    <th class="bg-yellow-300">性別</th>
                                    <th class="bg-yellow-300">メールアドレス</th>
                                    <th class="bg-yellow-300">パスワード</th>
                                    <th class="bg-sky-500">郵便番号</th>
                                    <th class="bg-sky-500">都道府県</th>
                                    <th class="bg-sky-500">市区町村</th>
                                    <th class="bg-sky-500">番地</th>
                                    <th class="bg-sky-500">マンション名・部屋番号</th>
                                    <th class="bg-orange-400">郵便番号</th>
                                    <th class="bg-orange-400">都道府県</th>
                                    <th class="bg-orange-400">市区町村</th>
                                    <th class="bg-orange-400">番地</th>
                                    <th class="bg-orange-400">マンション名・部屋番号</th>
                                    <th class="bg-orange-400">電話番号</th>
                                    <th class="bg-lime-400">電話番号</th>
                                    <th class="bg-lime-400">支店名</th>
                                    <th class="bg-lime-400">支店番号</th>
                                    <th class="bg-lime-400">口座の種類</th>
                                    <th class="bg-lime-400">口座番号</th>
                                    <th class="bg-lime-400">口座名義(カナ)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="data in props.datas.data">
                                    <td>
                                        <form @submit.prevent="submit" method="post">
                                            <select :value="data.status" @change="changeStatus($event,data.id)" 
                                                :class="'rounded-md text-xl '+data.status ,{
                                                    'rounded-md text-xl completed' : valueSet[0]=='completed' && valueSet[1]==data.id,
                                                    'rounded-md text-xl new' : valueSet[0]=='new' && valueSet[1]==data.id,
                                                    'rounded-md text-xl reviewing' : valueSet[0]=='reviewing' && valueSet[1]==data.id,
                                                    'rounded-md text-xl refuse' : valueSet[0]=='refuse' && valueSet[1]==data.id,
                                                }" 
                                                name="status" id="status">
                                                <option class="new" name="new" value="new">新規</option>
                                                <option class="completed" name="completed" value="completed">契約完了</option>
                                                <option class="reviewing" name="reviewing" value="reviewing">審査中</option>
                                                <option class="refuse" name="refuse" value="refuse">当社断り</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <form :action="route('admin.formRegister-pdf',data.id)" method="get">
                                            <button type="submit" class="inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-blue-600 dark:border-blue-500 ring-blue-300 dark:ring-blue-700 bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-700 hover:border-blue-700 hover:dark:bg-blue-600 hover:dark:border-blue-600 p-1 last:mr-0 w-full">PDF化</button>
                                        </form>
                                    </td>
                                    <td><Link :href="route('admin.formRegister-image',data.id)" class="inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-blue-600 dark:border-blue-500 ring-blue-300 dark:ring-blue-700 bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-700 hover:border-blue-700 hover:dark:bg-blue-600 hover:dark:border-blue-600 p-1 last:mr-0 w-full">写真</Link></td>
                                    <td><Link :href="route('admin.formRegister-detail',data.id)" class="inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-blue-600 dark:border-blue-500 ring-blue-300 dark:ring-blue-700 bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-700 hover:border-blue-700 hover:dark:bg-blue-600 hover:dark:border-blue-600 p-1 last:mr-0 w-full">詳細</Link></td>
                                    <td>{{ data.user.created_at.slice(0,10).replace('-','年').replace('-','月') }}日</td>
                                    <td>{{ data.user.name }}</td>
                                    <td>{{ data.user.Furigana }}</td>
                                    <td>{{ data.user.year }}年{{ data.user.month }}月{{ data.user.day }}日</td>
                                    <td>{{ data.user.gender }}</td>
                                    <td>{{ data.user.email }}</td>
                                    <td>××××××××</td>
                                    <td>〒{{ data.postCodeBef }}-{{ data.postCodeAfter }}</td>
                                    <td>{{ data.district }}</td>
                                    <td>{{ data.city }}</td>
                                    <td>{{ data.address }}</td>
                                    <td>{{ data.apartmentName }}</td>
                                    <td>〒{{ data.postCodeComBef }}-{{ data.postCodeComAfter }}</td>
                                    <td>{{ data.districtCom }}</td>
                                    <td>{{ data.cityCom }}</td>
                                    <td>{{ data.addressCom }}</td>
                                    <td>{{ data.apartmentNameCom }}</td>
                                    <td>{{ data.telephoneCom }}</td>
                                    <td>{{ data.bankName }}</td>
                                    <td>{{ data.branchName }}</td>
                                    <td>{{ data.teleBranch }}</td>
                                    <td>{{ data.typeAccount }}</td>
                                    <td>{{ data.accountName }}</td>
                                    <td>{{ data.account }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-3 lg:px-6 border-t border-gray-100 dark:border-slate-800">
                        <div class="justify-between items-center block flex">
                            <div class="flex items-center justify-center mb-6 mb-0">
                                <div class="flex items-center justify-start flex-wrap -mb-3">
                                    <template v-for="link in props.datas.links">
                                        <Link v-if="link.url" :href="link.url" :class="link.active && 'bg-slate-200'"
                                        class="inline-flex justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border cursor-pointer rounded border-gray-100 dark:border-slate-800 ring-gray-200 dark:ring-gray-500 dark:bg-slate-700 hover:bg-gray-200 hover:dark:bg-slate-700 text-sm p-1 mr-3 last:mr-0"
                                        ><!----><span class="px-2 text-xl" v-html="link.label"></span></Link>
                                        <span v-else v-html="link.label" class="inline-flex px-2 text-xl justify-center items-center whitespace-nowrap focus:outline-none transition-colors focus:ring duration-150 border rounded border-gray-100 dark:border-slate-800 ring-gray-200 dark:ring-gray-500 dark:bg-slate-700 text-sm p-1 mr-3 last:mr-0"></span>
                                    </template>
                                </div>
                        </div>
                        <template  v-for="link in props.datas.links">
                            <div v-if="link.active" class="flex items-center justify-center text-xl">Page {{ link.label }} of {{ props.datas.links.length-2 }}</div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</AuthenticatedLayout></template>
