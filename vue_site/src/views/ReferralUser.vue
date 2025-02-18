<template>
    <div class="app">
      <h1>Реферальное дерево</h1>
      <ReferralTree :treeData="treeData" />
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import ReferralTree from '@/components/ReferralTree.vue';
  
  export default {
    name: 'App',
    components: { ReferralTree },
    data() {
      return {
        treeData: null,
      };
    },
    mounted() {
      // Получаем hash из GET-параметров URL
      const params = new URLSearchParams(window.location.search);
      const user_id = params.get('user_id');
  
      if (user_id) {
        this.fetchTreeData(user_id);
      } else {
        console.error('GET-параметр "user_id" не передан');
      }
    },
    methods: {
      fetchTreeData(user_id) {
        axios
          .get(`/ajax_bot_tovar/referral.php?user_id=${user_id}`)
          .then((response) => {
            this.treeData = response.data;
          })
          .catch((error) => {
            console.error('Ошибка загрузки данных:', error);
          });
      },
    },
  };
  </script>
  
  <style>
  .app {
    font-family: Arial, sans-serif;
    margin: 20px;
  }
  </style>
  