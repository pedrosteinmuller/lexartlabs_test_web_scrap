<template>
  <div>
    <h1>Search Results</h1>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: [], //resultados da pesquisa recebidos do backend
    };
  },
};
</script>

<style scoped>
.product {
  display: flex;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  padding: 10px;
}

.product img {
  max-width: 100px;
  max-height: 100px;
  margin-right: 10px;
}
</style>
