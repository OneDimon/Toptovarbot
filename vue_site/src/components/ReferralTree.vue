<template>
    <div class="referral-tree">
      <!-- Если данные получены, строим дерево -->
      <ul v-if="treeData && treeData.length">
        <TreeNode v-for="node in treeData" :key="node.id" :node="node" />
      </ul>
      <p v-else>Загрузка дерева...</p>
    </div>
  </template>
  
  <script>
  import TreeNode from './TreeNode.vue';
  
  export default {
    name: 'ReferralTree',
    components: { TreeNode },
    props: {
      treeData: {
        type: Array,
        default: () => [],
      },
    },
  };
  </script>
  
  <style scoped>
  .referral-tree {
    list-style: none;
    padding-left: 20px;
  }
  </style>
  