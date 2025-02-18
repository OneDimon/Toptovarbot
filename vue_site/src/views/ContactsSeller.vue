<template>
    <div class="contacts">
        <table>
            <tr>
                <th>контакты продавцов</th>
                <th>адрес продавца</th>
                <th>фото адреса</th>
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
                <td>{{ item.locations.address }}</td>
                <td>
                  <img :src="'/tgbot/' + item.locations.photo" alt="Фото адреса" width="100">
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
          const contacts = Object.values(response.data).filter(item => item.user_id && item.contacts).reduce((acc, item) => {
            if (!acc[item.user_id]) {
                acc[item.user_id] = { contacts: {} };
            }
            if (!acc[item.user_id].contacts[item.contacts_type]) {
                acc[item.user_id].contacts[item.contacts_type] = [];
            }
            acc[item.user_id].contacts[item.contacts_type].push(item.contacts);
            return acc;
        }, {});

        // Группируем локации по user_id
        const locations = response.data.location.reduce((acc, location) => {
            if (!acc[location.user_id]) {
                acc[location.user_id] = { locations: [] };
            }
            // Формируем строку адреса
            const address = `${location.name_of_place}, ${location.building}, ${location.floar}, ${location.line}, ${location.place}`;
            acc[location.user_id].locations = ({
                address: address.trim().replace(/, +$/, ''), // Убираем лишнюю запятую, если она есть
                photo: location.photo
            });
            return acc;
        }, {});

        // Объединяем контакты и локации по user_id
        const result = Object.keys(contacts).reduce((acc, userId) => {
            acc[userId] = {
                contacts: contacts[userId].contacts || {},
                locations: locations[userId]?.locations || []
            };
            return acc;
        }, {});
        this.catalog = Object.values(result);
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
