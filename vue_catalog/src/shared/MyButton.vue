<template>
    <div>
        <button @click="$emit('{{ event_name }}')">{{MyText}}</button>
    </div>
</template>

<script>
export default {
    name: "MyButton",
    props: {
        MyText: String,
        event_name: String
    }
}
</script>

<style scoped>

</style>