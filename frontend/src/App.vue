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
  <div>
    {{ fortune }}
  </div>
  <button @click="load">Refresh</button>
</template>

<style scoped></style>
