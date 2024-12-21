<template>
    <div class="catalog-menu">
        <h2 class='catalog-title'>Фильтр</h2>
        <div class='catalog-menu-section'>
            <my-input :MyPlaceholder="this.priceFromText"
                    v-model = "this.sortedAndFilter.priceFrom"
                    :typeInput = "'number'"
                    :minInput = "0"
            ></my-input>
            <my-input :MyPlaceholder="this.priceToText"
                        v-model = "this.sortedAndFilter.priceTo"
                        :typeInput = "'number'"
                        :minInput = "0"
            ></my-input>
            <my-input :MyPlaceholder="this.countFromText"
                        v-model = "this.sortedAndFilter.countFrom"
                        :typeInput = "'number'"
                        :minInput = "0"
            ></my-input>
            <my-input :MyPlaceholder="this.countToText"
                        v-model = "this.sortedAndFilter.countTo"
                        :typeInput = "'number'"
                        :minInput = "0"
            ></my-input>
            <my-input :MyPlaceholder="this.contactsText"
                        v-model = "this.sortedAndFilter.contacts"
                        :typeInput = "'text'"
                        :minInput = "0"
            ></my-input>
        </div>
        <h2 class='catalog-title'>Сортировка</h2>
        <div class="catalog-menu-section">
            <my-select
                :title="this.sortedTypeText"
                :MyOptions="sortedTypeArray"
                v-model = "this.sortedAndFilter.sortedType" 
            ></my-select>
            <my-select
                :title="this.sortedText"
                :MyOptions="sortedArray"
                v-model = "this.sortedAndFilter.sorted" 
            ></my-select>
        </div>
    </div>
</template>

<script>
import MyInput from "@/shared/MyInput";
import mySelect from "@/shared/mySelect";
export default {
    name: "CatalogMenu",
    components: {
        'my-input': MyInput,
        'my-select': mySelect
    },
    data:() => {
        return {
            sortedAndFilter: {
                priceFrom: 0,
                priceTo: 0,
                countFrom: 0,
                countTo: 0,
                contacts: '',
                sorted: 'up',
                sortedType: 'id',
            },
            priceFromText: 'Цена от',
            priceToText: 'Цена до',
            countFromText: "Количество от",
            countToText: "Количество до",
            contactsText: "Контакты",
            sortedTypeArray: [{name: 'По умочланию', value: 'id'}, 
                              {name: 'Цена', value: 'price'}, 
                              {name: 'Количество', value: 'count'}],
            sortedTypeText: 'Выберите порядок сортировки',
            sortedArray: [{name: 'По возрастанию', value: 'up'}, 
                          {name: 'По убыванию', value: 'down'}],
            sortedText: 'Выберите сортировку'
        }
    },
    watch: {
        sortedAndFilter: {
            handler() {
                this.$emit('sortedAndFilter', this.sortedAndFilter)
            },
            deep: true
        }

    }
}
</script>

<style scoped>
.catalog-menu {
    display: flex;
    border: 1px solid black;
    flex-wrap: wrap;
    flex-direction: column
}

.catalog-menu-section {
    display: flex;
    flex-direction:row;
    flex-wrap: wrap;
}

.catalog-title {
    text-align: center
}

</style>