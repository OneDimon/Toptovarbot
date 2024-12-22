<template>
    <div class="catalog">
      <tr v-if="catalog.length === 0">
                <td colspan="2">По вашему запросу не найдено ответов</td>
              </tr>
      <my-catalog v-else :catalog="catalog"
                  @priceFrom="priceFrom"
                  @priceTo="priceTo"
                  @category="category"
                  @countFrom="countFrom"
                  @countTo="countTo"></my-catalog>
    </div>
</template>

<script>
import MyCatalog from "@/components/MyCatalog";
import axios from "axios";

export default {
  components: {
    'my-catalog': MyCatalog
  },
  data:() => {
      return {
          catalog: [],
      }
  },
  methods: {
      getCatalog() {
        let params = new URLSearchParams(document.location.search);
        let value = params.get('hash');
        this.sendAjaxRequest(value)
      },
      sendAjaxRequest(value) {
        axios.get('/ajax_bot_tovar/catalog.php', {
            params: {
                hash_response: value
            }
        })
        .then(response => {
            console.log(response);
            response.data.forEach(element => {
                this.catalog.push({
                    id: element.id,
                    name: element.name_product,
                    price: element.price,
                    count: element.quantity_product,
                    contacts: element.contact,
                    image: '/tgbot/' + element.link_photo,
                })
            });

        })
        .catch(error => {
            console.error(error);
        });
    }

      
  },
  created() {
    this.getCatalog()
  },

}
</script>


<style>
.catalog {
    padding: 20px;
    font-family: "Arial";
    font-size: 14px;
    color: #2c3e50;
    background-color: lightblue;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
</style>
