<template>
  <div>
    <h1>Criar novo titulo</h1>

    <div class="col-md-6">
      <div class="form-group mt-5">
        <label for="name"> Nome do titulo </label>
        <input
          v-model="libs.name"
          type="text"
          name="name"
          class="form-control"
          id="name"
          required
        />
      </div>
      <div class="form-group mt-5">
        <label for="name"> Nome do autor </label>
        <input
          v-model="libs.autor"
          type="text"
          name="autor"
          class="form-control"
          id="autor"
          required
        />
      </div>
      <div>
        <button class="btn btn-success mt-3" @click="updateTitle()">
          Criar
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import LibraryDataService from "../services/LibDataService";

export default {
  name: "libs-create",
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
    findTitle() {
      LibraryDataService.find(this.$route.params.id)
        .then((response) => {
          this.libs.name = response.data.data.name;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    updateTitle() {
      var data = {
        name: this.libs.name,
        autor:this.libs.autor,
        status: this.libs.status,
      };

      LibraryDataService.update(data, this.$route.params.id)
        .then((response) => {
          window.location.href = "/";
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    this.findTitle();
  },
};
</script>
