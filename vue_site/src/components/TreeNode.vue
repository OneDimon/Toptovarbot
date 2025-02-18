<template>
  <li>
    <div class="node">
      <div class="node-header" @click="toggle">
        <span class="node-title">{{ node.name }}</span>
        <span class="node-params">
          Объем: {{ node.volume }},
          Групповой: {{ node.groupVolume }},
          Совокупный: {{ node.totalVolume }},
          Статус: {{ node.status }}
        </span>
        <!-- Кнопка для разворачивания/сворачивания, если есть дочерние узлы -->
        <button v-if="hasChildren" @click.stop="toggle">
          {{ expanded ? '-' : '+' }}
        </button>
      </div>

      <!-- Скрытые по умолчанию детали узла -->
      <div v-if="expanded" class="node-details">
        <p v-if="node.details">{{ node.details }}</p>

        <!-- Вывод контактов -->
        <ul v-if="node.contacts && node.contacts.length" class="contacts-list">
          <li v-for="contact in node.contacts" :key="contact.id">
            <strong>{{ contact.contactType }}:</strong> {{ contact.contact }}
          </li>
        </ul>

        <!-- Если есть дочерние узлы, рекурсивно выводим их -->
        <ul v-if="node.children && node.children.length">
          <TreeNode
            v-for="child in node.children"
            :key="child.id"
            :node="child"
          />
        </ul>
      </div>
    </div>
  </li>
</template>

<script>
export default {
  name: 'TreeNode',
  props: {
    node: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      expanded: false,
    };
  },
  computed: {
    hasChildren() {
      return (
        (this.node.children && this.node.children.length > 0) ||
        (this.node.contacts && this.node.contacts.length > 0)
      );
    },
  },
  methods: {
    toggle() {
      this.expanded = !this.expanded;
    },
  },
};
</script>

<style scoped>
.node {
  border: 1px solid #ccc;
  padding: 10px;
  margin-bottom: 5px;
  border-radius: 4px;
  background: #fafafa;
  cursor: pointer;
  transition: background 0.3s;
}

.node:hover {
  background: #f0f0f0;
}

.node-header {
  display: flex;
  flex-direction: column;
}

.node-title {
  font-weight: bold;
  font-size: 16px;
  margin-bottom: 5px;
}

.node-params {
  font-size: 14px;
  color: #555;
}

.node-details {
  margin-top: 10px;
  padding-left: 20px;
  border-left: 2px solid #eee;
}

.contacts-list {
  margin-top: 10px;
  padding-left: 15px;
  font-size: 14px;
  color: #444;
}

.contacts-list li {
  margin-bottom: 5px;
}

button {
  background: none;
  border: none;
  font-size: 16px;
  cursor: pointer;
  align-self: flex-end;
  margin-top: 5px;
}
</style>
