<template>
    <div>
        <h1>My Catalog</h1>

        <catalog-menu @sortedAndFilter="sortedAndFilterMethod">

        </catalog-menu>      
        <table class="table table-striped">
            <tr>
                <th>название</th>
                <th>цена</th>
                <th>количество</th>
                <th>Контакты продавца</th>
                <th>фото</th>
            </tr>
            <tr v-for="item in sortedAndFilteredCatalog" :key="item.id">
                <catalog-element :element="item"></catalog-element>
            </tr>
        </table>
    </div>
</template>

<script>
import CatalogElement from "@/components/CatalogElement";
import CatalogMenu from "@/components/CatalogMenu";
export default {
    name: "MyCatalog",
    components: {
        'catalog-element': CatalogElement,
        'catalog-menu': CatalogMenu,
    },
    data() {
        return {
            sortedAndFilter: {
                minPrice: null,
                maxPrice: Infinity,
                minCount: null,
                maxCount: Infinity,
                contacts: '',
                sorted: 'up',
                sortedType: 'id'
            }
        }
    },
    props: {
        catalog: Array
    },
    methods: {
        sortedAndFilterMethod(value) {
            let minPrice = (this.sortedAndFilter.priceFrom == '' || this.sortedAndFilter.priceFrom == null) ? 0 : parseInt(this.sortedAndFilter.priceFrom)
            let maxPrice = (this.sortedAndFilter.priceTo == '' || this.sortedAndFilter.priceTo == null || this.sortedAndFilter.priceTo == '0') ? Infinity : parseInt(this.sortedAndFilter.priceTo)
            let minCount = (this.sortedAndFilter.countFrom == '' || this.sortedAndFilter.countFrom == null ) ? 0 : parseInt(this.sortedAndFilter.countFrom)
            let maxCount = (this.sortedAndFilter.countTo == '' || this.sortedAndFilter.countTo == null || this.sortedAndFilter.countTo == '0') ? Infinity : parseInt(this.sortedAndFilter.countTo)
            this.sortedAndFilter = value
            this.sortedAndFilter.minPrice = minPrice
            this.sortedAndFilter.maxPrice = maxPrice
            this.sortedAndFilter.minCount = minCount
            this.sortedAndFilter.maxCount = maxCount
        }
    }, computed: {
        filteredCatalog() {
          return [...this.catalog].filter(item => {
              let itemPrice = item.price == 'не указана' || item.price == null ? Infinity : parseInt(item.price)
              let itemCount = item.count == 'не указано' || item.count == null ? 0 : parseInt(item.count)
              if (itemPrice >= this.sortedAndFilter.minPrice && 
              itemPrice <= this.sortedAndFilter.maxPrice && 
              itemCount >= this.sortedAndFilter.minCount && 
              itemCount <= this.sortedAndFilter.maxCount) {
                  return item             
            }
          })
        },
        sortedAndFilteredCatalog() {
            return [...this.filteredCatalog].sort((item1, item2) => {
                if (this.sortedAndFilter.sorted == 'up') {
                    return item1[this.sortedAndFilter.sortedType] > item2[this.sortedAndFilter.sortedType] ? 1 : -1
                } else {
                    return item1[this.sortedAndFilter.sortedType] < item2[this.sortedAndFilter.sortedType] ? 1 : -1
                }
            })
        }
    }
}
</script>

<style scoped>
.table, td, th {
    border-collapse: collapse;
    border-spacing: 0;
    border: 4px solid black;
    font-size: 18px;
}
</style>
