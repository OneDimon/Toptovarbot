<template>
    <div>
        <div class="box">
            <label class="title">{{title}}</label>
            <select @change="updateValue">
                <option v-for="option in MyOptions" :key="option.value" :value="option.value">{{option.name}}</option>
            </select>
        </div>
    </div>
</template>

<script>
export default {
    name: "mySelect",
    props: {
        MyOptions: Array,
        title: String,
        modelValue: String
    },
    methods: {
        updateValue(event) {
            this.$emit('update:modelValue', event.target.value)
            this.$emit('change', event.target.value)
        }
    }
}

</script>

<style scoped>
.box {
  position: relative;
  margin: 10px 10px 10px 10px;
  display: flex;
  flex-direction: column;
}

.box select {
  background-color: #0563af;
  color: white;
  padding: 12px;
  width: 250px;
  border: none;
  font-size: 20px;
  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
  -webkit-appearance: button;
  appearance: button;
  outline: none;
}

.box select option {
  padding: 30px;
}

.title {
    font-size: 20px;
}
</style>