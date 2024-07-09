<template>
  <main>
    <h2>Home</h2>

    <div class="col-md-12 mt-5">
      <h4>Todos os titulos</h4>
      <div class="row">
        <div class="col-md-4 mb-3" v-for="(libs, index) in libs">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Nome da livro: {{ libs.name }}</h5>
              <div v-if="!libs.status">
                <span class="badge text-bg-primary"> Disponivel </span>
              </div>
              <div v-else>
                <span class="badge text-bg-dark"> Em falta </span>
              </div>
              <button
                class="mt-1 me-1 btn btn-success"
                @click="changeStatus(libs.name, Number(!libs.status), libs.id)"
              >
                {{ libs.status > 0 ? "Tornar disponivel" : "Tornar indisponivel" }}
              </button>
              <button class="mt-1 btn btn-primary" @click="goToedit(libs.id)">
                Editar
              </button>
              <button class="mt-1 btn btn-danger" @click="deleteTitle(libs.id)">
                Excluir
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import LibraryDataService from "../services/LibDataService";

export default {
  name: "library-list",
  data() {
    return {
      libs: [],
    };
  },
  methods: {
    goToedit(libId) {
      window.location.href = "/edit/" + libId;
    },
    retrieveTitles() {
      LibraryDataService.getAll()
        .then((response) => {
          console.log(response.data.data);
          this.titles = response.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    deleteTitle(libId = 0) {
      console.log(libId);
      LibraryDataService.delete(libId)
        .then((response) => {
          console.log(response.data.data);
          this.retrieveTitles();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    changeStatus(name, status, libId) {
      const dataUpdate = {
        name,
        status,
      };
      LibraryDataService.update(dataUpdate, libId)
        .then((response) => {
          console.log(response.data.data);
          this.retrieveTitles();
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    this.retrieveTitles();
  },
};
</script>
