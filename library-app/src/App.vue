<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <RouterLink class="navbar-brand" to="/">Library App</RouterLink>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <RouterLink class="nav-link" to="/">Titulos</RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink class="nav-link" to="/new">cadastrar</RouterLink>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="container mt-3">
    <RouterView />
  </div>
</template>

<script>
export default {
  name: "app",
};
</script>
