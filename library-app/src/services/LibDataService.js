import api from "./api/Library";

class LibraryDataService {
  getAll() {
    return api.get("/library");
  }

  create(data = []) {
    return api.post("/library", data);
  }

  delete(libId = 0) {
    return api.delete(`/library/${libId}`);
  }
  update(dataUpdate = [], libId = 0) {
    return api.put(`/library/${libId}`, dataUpdate);
  }

  find(libId = 0) {
    return api.get(`/library/${libId}`);
  }
}

export default new LibraryDataService();
