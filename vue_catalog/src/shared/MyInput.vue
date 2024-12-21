<template>
    <div class="my-input-block">
        <label>{{ MyPlaceholder }}</label>
        <input  class="my-input"
                :placeholder="MyPlaceholder"
                :value ="modelValue" 
                @input="updateValue"
                :type="typeInput"
                :min="minInput">
    </div>
</template>

<script>

export default {
    name: "MyInput",
    props: {
        MyPlaceholder: String,
        modelValue: [String, Number],
        typeInput : String,
        minInput : [String, Number]
    },
    methods: {
        updateValue(event) {
            this.$emit('update:modelValue', event.target.value)
        }
    }
}

</script>

<style scoped>

.my-input-block {
    margin: 10px;
    padding: 10px, 0px, 0px, 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.my-input {
    border: 1px solid black;
    border-radius: 5px;
    padding: 10px;
}
</style>