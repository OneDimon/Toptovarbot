<template>
    <div class="contacts">
        <table>
            <tr>
                <th>контакты продавцов</th>
            </tr>
            <tr v-if="catalog.length === 0">
                <td colspan="2">По вашему запросу не найдено контактов</td>
            </tr>
            <tr v-else v-for="item in catalog" :key="item.id">
                <td>
                  <div v-for="(key, index) in Object.keys(item.contacts)" :key="index">
                    <p><strong>{{ key }}:</strong></p>
                    <ul>
                      <li v-for="value in item.contacts[key]" :key="value">{{ value }}</li>
                    </ul>
                  </div>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "ContactsSeller",
    data:() => {
      return {
          catalog: [
      ]
      }
  },
  methods: {
      getCatalog() {
        let params = new URLSearchParams(document.location.search);
        let value = params.get('link');
        this.sendAjaxRequest(value)
      },
      sendAjaxRequest(value) {
        axios.get('/ajax_bot_tovar/contacts.php', {
            params: {
              link: value
            }
        })
        .then(response => {
          console.log(response);
          response.data.reduce((acc, item) => {
            const existingItem = acc.find(x => x.user_id === item.user_id);
            if (existingItem) {
                existingItem.contacts[item.contacts_type].push(item.contacts);
            } else {
                acc.push({
                    user_id: item.user_id,
                    contacts: {
                        [item.contacts_type]: [item.contacts]
                    }
                });
            }
            this.catalog = acc;
            return acc;
      }, []);
      })
      .catch(error => {
          console.error(error);
      });
    } 
  },
  created() {
    this.getCatalog()
  }
}



</script>

<style scoped>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: left;
}

th {
  background-color: #f0f0f0;
}

td {
  background-color: #fff;
}

td div {
  margin-bottom: 10px;
}

td div p {
  font-weight: bold;
  margin-bottom: 5px;
}

td ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

td ul li {
  margin-bottom: 5px;
}

td ul li::before {
  content: "\2022";
  font-size: 16px;
  color: #666;
  margin-right: 5px;
}
</style>
