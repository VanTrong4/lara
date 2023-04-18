<script>
export default {
    props: ['name','id',"lable",'modelValue'],
    emits: ['update:modelValue'],
}
</script>

<template>
    <div class="flex items-center">
        <input type="radio" :id="id" :name="name" :checked="modelValue==lable" :value="lable"
        @input="$emit('update:modelValue', $event.target.value)" >
        <label class="text-3xl font-medium ml-6" :for="id">{{ lable }}</label>
    </div>
</template>