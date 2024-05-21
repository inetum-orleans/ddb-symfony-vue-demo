<script setup lang="ts">
import { ref } from 'vue'

const fortune = ref('')

async function load() {
  const response = await fetch('/api/fortune')
  const data = await response.json()
  fortune.value = data.message
}

load()
</script>

<template>
  <div class="fortune">
    {{ fortune }}
  </div>
  <button @click="load">Refresh</button>
</template>

<style>
body {
  margin: 0;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(to right, #ff9966, #ff5e62);
}
</style>

<style scoped>
.fortune {
  font-family: 'Roboto', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-size: 3em;
  color: white;
  text-align: center;
}

button {
  display: block;
  width: 200px;
  height: 50px;
  margin: 20px auto;
  background-color: #ff5e62;
  color: white;
  border: none;
  border-radius: 25px;
  font-size: 1.2em;
  cursor: pointer;
}

button:hover {
  background-color: #ff9966;
}
</style>
