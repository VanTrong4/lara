<script>
export default {
    props: ['min','max','modelValue','opDefault'],
    methods: {
      getNumbers:function(){
        let arr = [];
        for (var i = this.min; i <= this.max; i++){
            arr.push(i);
        }
        return arr
        },
      },
      emits: ['update:modelValue'],

}
</script>

<template>
    <select
     class="focus:border-indigo-500 rounded-md shadow-sm mt-1 block h-[6.4rem] bg-gray-100 text-3xl border-none shrink grow"
      @input="$emit('update:modelValue', $event.target.value)" :value="modelValue">
        <option value="" selected disabled hidden>{{ opDefault }}</option>
        <option v-for="n in getNumbers()" :value="n">{{ n }}</option>
    </select>
</template>