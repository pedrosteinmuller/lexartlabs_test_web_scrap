<template>
  <div>
    <h1>Product Search Engine</h1>
    <form @submit.prevent="searchProducts">
      <label for="category">Category:</label>
      <select v-model="selectedCategory">
        <option value="Mobile">Mobile</option>
        <option value="Refrigerator">Refrigerator</option>
        <option value="TV">TV</option>
      </select>

      <label for="site">Site:</label>
      <select v-model="selectedSite">
        <option value="MercadoLivre">Mercado Livre</option>
        <option value="Buscape">Buscapé</option>
      </select>

      <label for="searchText">Search Text:</label>
      <input type="text" v-model="searchText" />

      <button type="submit">Search</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      selectedCategory: 'Mobile',
      selectedSite: 'MercadoLivre',
      searchText: '',
    };
  },
};
</script>

<style scoped>
h1 {
  font-size: 1.5em;
  text-align: center;
  color: white;
}
</style>
