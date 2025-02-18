<template>
        <th>{{element.name}}</th>
        <th>{{element.price}}</th>
        <th>{{element.count}}</th>
        <th>
            <ul>
                <li v-for="contact in element.contacts" :key="contact.id">{{ contact.contacts_type}} : {{contact.contacts}} </li>
            </ul>   
        </th>
        <th><img :src="element.image" width="150" height="150"></th>
</template>

<script>    

export default {
    name: "CatalogElement",
    props: {
        element: Object
    }
}
</script>

<style scoped> 
</style>