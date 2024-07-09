<template>
  <div>
    <h1>Criar novo Titulo</h1>

    <div class="col-md-6">
      <div class="form-group mt-5">
        <label for="name"> Nome do Titulo </label>
        <input
          type="text"
          name="name"
          class="form-control"
          id="name"
          v-model="libs.name"
          required
        />
      </div>
      <div class="form-group mt-5">
        <label for="name"> Nome do Autor </label>
        <input
          type="text"
          name="autor"
          class="form-control"
          id="autor"
          v-model="libs.autor"
          required
        />
      </div>

      <div>
        <button class="btn btn-success mt-3" @click="saveTitle">Criar</button>
      </div>
    </div>
  </div>
</template>

<script>
import LibraryDataService from "../services/LibDataService";

export default {
  name: "title-create",
  data() {
    return {
      libs: {
        id: null,
        name: "",
        status: 0,
      },
    };
  },
  methods: {
    saveTitle() {
      var data = {
        name: this.libs.name,
        name: this.libs.autor,
        status: this.libs.status,
      };

      LibraryDataService.create(data)
        .then((response) => {
          window.location.href = "/";
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
  },
};
</script>
